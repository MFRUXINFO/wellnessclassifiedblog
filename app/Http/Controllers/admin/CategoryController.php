<?php

namespace App\Http\Controllers\admin;

use App\Helper\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax())
        {
            $data = Category::orderby('id','DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('image', function($row){
                        $image = asset('public/admin/img/user.png');
                        if(File::exists(public_path($row->image)) && !empty($row->image))
                        {
                            $image = asset('public/'.$row->image);
                        }
                        return '<img src="'.$image.'" style="width:40px;"/>';
                    })

                    ->addColumn('action', function($row){
                        $btn = "";
                        $btn = '<button class="btn btn-sm btn-primary" onClick="EditData('.$row->id.')"><i class="fa fa-edit"></i></button>';
                        return $btn;
                    })

                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.category.list');
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {
            // START VALIDATION
            $rules = array(
                "name" => 'required',
                "urlName" => 'required',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $error = json_decode($validator->errors());
                return response()->json(['status' => 401, 'error1' => $error]);
            }
            // END VALIDATION


            if ($request->id)
            {
                $formData = Category::where('id',$request->id)->first();
                if ($request->image) {
                    $formData->image =   ImageManager::updateImage($formData->image,$request->image,'upload/category/');
                }
            }
            else{
                $formData = new Category();
                if ($request->image) {
                    $formData->image =   ImageManager::uploadImage($request->image,'upload/category/');
                }
            }
            $formData->name     =   $request->name;
            $formData->url_name =   $request->urlName;
            $formData->save();

            return response()->json(['status' => 1]);

        }
    }

    public function edit(Request $request)
    {
        $data = Category::where('id',$request->id)->first();
        return response()->json(['status' => 1, 'data' => $data]);
    }
}
