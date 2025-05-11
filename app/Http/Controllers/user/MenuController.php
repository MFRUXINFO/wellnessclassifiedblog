<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\WebConfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class MenuController extends Controller
{
    protected $date = '';
    protected $category = [];
    protected $mainColor = '#00A79D';

    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
        $this->date = Carbon::now();
        $this->category = Category::orderBy('id','DESC')->get();
        foreach ($this->category as $key => $value) {
            $image = '-';
            if(File::exists(public_path($value->image)) && !empty($value->image))
            {
                $image = asset('public/'.$value->image);
            }
            $this->category[$key]['image'] = $image;
        }
        session_start();

        $this->mainColor = WebConfig::where('name','themeColor')->first()->description ?? '';

    }

    // BASIC PAGES START
    public function index()
    {
        $data = City::take(10)->get(['id', 'name']);
        return view('user.menu.index')->with(['data' => $data,'category' => $this->category,'mainColor' => $this->mainColor]);
    }

    public function about()
    {
        return view('user.menu.about')->with(['mainColor' => $this->mainColor]);
    }

    public function ourLatestBlog(Request $request)
    {
        if ($request->ajax()) {
           if($request->type == 'ourLatestBlog')
            {
                $data = Blog::take(6)->where('status', '1')->orderBy('id','DESC');

                if($request->category_id)
                {
                    $data = $data->where('category_id', $request->category_id);
                }

                if($request->city_id)
                {
                    $data = $data->where('city_id', $request->city_id);
                }

                $data = $data->get();


                foreach ($data as $key => $value)
                {
                    $image = asset('public/user/img/post.png');
                    if(File::exists(public_path($value->image)) && !empty($value->image))
                    {
                        $image = asset('public/'.$value->image);
                    }
                    $data[$key]['image']=$image;
                    $data[$key]['date'] = date_format(date_create($value->date), "d-m-Y");
                    $data[$key]['cityName'] = $value->city->name ?? '-';
                }

                return response()->json(['status' => true, 'data' => $data]);
            }
        }
    }

    public function blog(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'AllPost')
            {
                        $data = Blog::where('status', '1')
                                ->orderBy('id','DESC')
                                ->offset($request->offset)
                                ->limit(10);

                        if($request->category_id)
                        {
                            $data = $data->where('category_id', $request->category_id);
                        }

                        if($request->city_id)
                        {
                            $data = $data->where('city_id', $request->city_id);
                        }

                        $data = $data->get();


                        foreach ($data as $key => $value)
                        {
                            $image = asset('public/user/img/post.png');
                            if(File::exists(public_path($value->image)) && !empty($value->image))
                            {
                                $image = asset('public/'.$value->image);
                            }
                            $data[$key]['image']=$image;
                            $data[$key]['date'] = date_format(date_create($value->date), "d-m-Y");
                            $data[$key]['cityName'] = $value->city->name ?? '';
                        }

                return response()->json(['status' => true, 'data' => $data]);
            }
        }
        return view('user.menu.blog')->with(['category' => $this->category,'mainColor' => $this->mainColor]);
    }

    public function category(Request $request, $category_url)
    {
        $single_category = Category::where('url_name', $category_url)->first();
        if ($single_category) {
            $data = City::take(10)->get(['id', 'name']);
            return view('user.menu.category')->with(['data' => $data, 'category' => $this->category, 'single_category' => $single_category,'mainColor' => $this->mainColor]);
        }
        return redirect()->back();
    }

    public function blogDetails(Request $request, $slug)
    {
        $data = Blog::where('slug',$slug)->where('status','1')->first();

        if (empty($data)) {
            return redirect()->back();
        }

        $image = '';
        if(File::exists(public_path($data->image)) && !empty($data->image))
        {
            $image = asset('public/'.$data->image);
        }
        $data->image = $image;
        return view('user.menu.blogDetails')->with(['data' => $data,'mainColor' => $this->mainColor]);
    }

    public function location(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type ==  'allLocation') {

                $data = City::with('state:id,slug,name', 'country:id,slug,name','blog:id,city_id')
                        ->offset($request->offset)
                        ->limit(10)
                        ->get(['id', 'slug', 'name', 'state_id', 'country_id']);
                return response()->json(['status' => true, 'data' => $data]);
            }

            if ($request->type == 'singleSearchLocation') {

                $data = City::where('id', $request->city_id)
                    ->with('state:id,slug,name', 'country:id,slug,name','blog:id,city_id')
                    ->whereHas('postcity', function ($query) use ($request) {
                        $query->where('category_id', $request->category_id);
                    })
                    ->first(['id', 'slug', 'name', 'state_id', 'country_id']);
                return response()->json(['status' => true, 'data' => $data]);
            }
        }
        return view('user.menu.location')->with(['category' => $this->category,'mainColor' => $this->mainColor]);
    }

    public function contact_us(Request $request)
    {
        if ($request->ajax())
        {
            date_default_timezone_set('Asia/Kolkata');
            // START VALIDATION
            $rules = array(
                "name" => 'required',
                "email" => 'required|email',
                "mobile" => 'required|min:10|max:10',
                "subject" => 'required',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                $error=json_decode($validator->errors());
                return response()->json(['status' => 401,'error1' => $error]);
            }
            // END VALIDATION

            $formdata = new ContactUs();
            $formdata->name = $request->name;
            $formdata->email = $request->email;
            $formdata->mobile = $request->mobile;
            $formdata->subject = $request->subject;
            $formdata->message = $request->message;
            $formdata->save();

            $formdata->mail_type = 'user_contact_us';
            $details = $formdata->getAttributes();
            dispatch(new SendMailJob($details));

            return response()->json(['status' => 1,'message' => 'Send Inquiry Successfully']);

        }
        return view('user.menu.contact_us')->with(['mainColor' => $this->mainColor]);
    }

    // POLICY PAGES START
    public function terms_and_conditions()
    {
        return view('user.terms_and_conditions')->with(['mainColor' => $this->mainColor]);
    }

    public function refund_policy()
    {
        return view('user.refund_policy')->with(['mainColor' => $this->mainColor]);
    }

    public function privacy_policy()
    {
        return view('user.privacy_policy')->with(['mainColor' => $this->mainColor]);
    }
    // POLICY PAGES END

    public function location_search(Request $request)
    {
        if ($request->ajax()) {
            $data = City::where('name', 'like', '%' . $request->data . '%')
                ->take(10)
                ->get(['id', 'name']);

            return response()->json(['status' => true, 'data' => $data]);
        }
    }

    public function location_detail(Request $request, $country, $state, $city)
    {
        $country_type = Country::where('slug', $country)->first(['type']);
        $cityData = City::where('slug', $city)->first('name') ?? '';
        $city_id = City::where('slug', $city)->first('id')->id;

        if(isset($city_id) && $city_id!='' && $city_id!=null){
            $data = Blog::where('city_id',$city_id)
                    ->where('status', '1')
                    ->orderby('id', 'DESC')
                    ->get();

            foreach ($data as $key => $value) {
                $image = asset('public/user/img/post.png');
                if(File::exists(public_path($value->image)) && !empty($value->image))
                {
                    $image = asset('public/'.$value->image);
                }
                $data[$key]['image'] = $image;
                $data[$key]['date'] = date_format(date_create($value->date), "d-m-Y");
            }
        }
        return view('user.menu.location_detail')->with(['country_type' => $country_type, 'variable' => $cityData,"postData"=>$data,"blogData"=>$data,'mainColor' => $this->mainColor]);
    }

    public function location_detail_2(Request $request, $country, $state)
    {
        $country_type = Country::where('slug', $country)->first(['type']);
        $stateData = State::where('slug', $state)->first('name') ?? '';
        return view('user.menu.location_detail')->with(['country_type' => $country_type, 'variable' => $stateData,'mainColor' => $this->mainColor]);
    }

    public function location_detail_3(Request $request, $country)
    {
        $country = Country::where('slug', $country)->first(['type', 'name']);
        if (empty($country)) {
            return redirect()->back();
        }
        return view('user.menu.location_detail')->with(['country_type' => $country, 'variable' => $country,'mainColor' => $this->mainColor]);
    }
}
