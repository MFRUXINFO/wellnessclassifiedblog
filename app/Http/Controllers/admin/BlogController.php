<?php

namespace App\Http\Controllers\admin;

use App\Helper\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function list(Request $request)
    {
        if($request->ajax())
        {
                $data = Blog::orderBy('id','DESC')->select('*');
	                return DataTables::of($data)
	                ->addIndexColumn()

	                ->addColumn('image', function($row){
                        $image = '';

                        if(File::exists(public_path($row->image)) && !empty($row->image))
                        {
                            $image = asset('public/'.$row->image);
                        }
                        if ($image) {
                            $image = '<img src="'.$image.'"  style="width:150px;"/>';
                        }
                        return $image;
	                })

                    ->addColumn('action', function($row){
                        $btn = '';
                        if ($row->status == '1') {
                            $btn .= '<button class="btn btn-sm btn-primary" onclick="StatusChange('.$row->id.')"><i class="fa fa-eye"></i></button>';
                        }else{
                            $btn .= '<button class="btn btn-sm btn-primary" onclick="StatusChange('.$row->id.')"><i class="fa fa-eye-slash"></i></button>';
                        }
                        $btn .= '<a href="'.route('admin.blog.edit',['id' => $row->id]).'" class="ms-2"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a>';
                        return $btn;
	                })

	                ->rawColumns(['action','image'])
	                ->make(true);
        }
        return view('admin.blog.list');
    }

    public function add(Request $request)
    {
        if($request->ajax())
        {
            // START VALIDATION
            $rules = array(
                "city" => 'required',
                "category" => 'required',
                "title" => 'required',
                "content" => 'required',
                "image" => 'required',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $error = json_decode($validator->errors());
                return response()->json(['status' => 401, 'error1' => $error]);
            }
            // END VALIDATION

            $character = [' ','!','@','#','$','%','^','&','*','(',')','_','?','}','[',']',':',';'];
            $slug = $request->title;
            $slug = strtolower(str_replace('--','-',str_replace($character,'-',$slug)));

            $formData                  = new Blog();
            $formData->city_id         = $request->city;
            $formData->category_id     = $request->category;
            $formData->slug            = $slug;
            $formData->metaTitle       = $request->metaTitle;
            $formData->metaDescription = $request->metaDescription;
            $formData->metaKeyword     = $request->metaKeyword;
            $formData->title           = $request->title;
            $formData->shortTitle      = $request->shortTitle;
            $formData->content         = $request->content;
            $formData->date            = $request->date;
            $formData->image           = ImageManager::uploadImage($request->image,'upload/blog/');
            $formData->save();

            return response()->json(['status' => 1, 'redirect' => route('admin.blog.list')]);
        }
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.blog.add')->with(['category' => $category]);
    }

    public function edit(Request $request)
    {
        if($request->ajax())
        {
            // START VALIDATION
            $rules = array(
                "category" => 'required',
                "title" => 'required',
                "content" => 'required',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $error = json_decode($validator->errors());
                return response()->json(['status' => 401, 'error1' => $error]);
            }
            // END VALIDATION

            $character = [' ','!','@','#','$','%','^','&','*','(',')','_','?','}','[',']',':',';'];
            $slug = $request->title;
            $slug = strtolower(str_replace('--','-',str_replace($character,'-',$slug)));

            $formData                  = Blog::where('id',$request->id)->first();
            $formData->city_id         = $request->city ?? $formData->city_id;
            $formData->category_id     = $request->category;
            $formData->slug            = $slug;
            $formData->metaTitle       = $request->metaTitle;
            $formData->metaDescription = $request->metaDescription;
            $formData->metaKeyword     = $request->metaKeyword;
            $formData->title           = $request->title;
            $formData->shortTitle      = $request->shortTitle;
            $formData->content         = $request->content;
            $formData->date            = $request->date;
            if ($request->image) {
                $formData->image       = ImageManager::updateImage($formData->image,$request->image,'upload/blog/');
            }
            $formData->save();

            return response()->json(['status' => 1, 'redirect' => route('admin.blog.list')]);
        }

        $data = Blog::where('id',$request->id)->first();
        if (empty($data))
        {
            return redirect()->back();
        }
        $image = '';
        if(File::exists(public_path($data->image)) && !empty($data->image))
        {
            $image = asset('public/'.$data->image);
        }
        $data->image = $image;
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.blog.edit')->with(['category' => $category,'data' => $data]);
    }

    public function statusChange(Request $request)
    {
        if ($request->ajax()) {
            $formData = Blog::where('id',$request->id)->first();
            if ($formData->status == '0') {
                $formData->status = '1';
            }
            else
            {
                $formData->status = '0';
            }
            $formData->save();

            return response()->json(['status' => 1]);
        }
    }
}
