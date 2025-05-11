<?php

namespace App\Http\Controllers\admin;

use App\Helper\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\WebConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'blog' => Blog::get()->count(),
            'category' => Category::get()->count(),
        ];
        return view('admin.dashboard',compact('data'));
    }

    public function test()
    {
        return view('admin.test');
    }

    public function webConfig(Request $request)
    {
        if ($request->ajax()) {

            $color = ['bodyColor' ,'themeColor' ,'backgroundColor' ,'fontColor'];
            $file = ['logo','faviconLogo'];

            if(in_array($request->type, $color))
            {
                WebConfig::where('name',$request->type)->update(['description' => $request->data]);
            }

            if(in_array($request->type, $file))
            {
                $formData = WebConfig::where('name',$request->type)->first();
                $formData->description = ImageManager::updateImage($formData->description, $request->data,'upload/webconfig/');
                $formData->save();
            }
            return response()->json(['status' =>1]);
        }
        $bodyColor        = WebConfig::where('name','bodyColor')->first()->description ?? '';
        $themeColor       = WebConfig::where('name','themeColor')->first()->description ?? '';
        $backgroundColor  = WebConfig::where('name','backgroundColor')->first()->description ?? '';
        $fontColor        = WebConfig::where('name','fontColor')->first()->description ?? '';
        $logo             = WebConfig::where('name','logo')->first()->description ?? '';
        $faviconLogo      = WebConfig::where('name','faviconLogo')->first()->description ?? '';


        $logoImage = '';
        $faviconLogoImage = '';
        if(File::exists(public_path($logo)) && !empty($logo))
        {
            $logoImage = asset('public/'.$logo);
        }
        if(File::exists(public_path($faviconLogo)) && !empty($faviconLogo))
        {
            $faviconLogoImage = asset('public/'.$faviconLogo);
        }
        if ($logoImage) {
            $logo = $logoImage;
        }

        if ($faviconLogoImage) {
            $faviconLogo = $faviconLogoImage;
        }


        $data = [
            'bodyColor'        => $bodyColor,
            'themeColor'       => $themeColor,
            'backgroundColor'  => $backgroundColor,
            'fontColor'        => $fontColor,
            'logo'             => $logo,
            'faviconLogo'      => $faviconLogo,
        ];


        return view('admin.webConfig', compact('data'));
    }
}
