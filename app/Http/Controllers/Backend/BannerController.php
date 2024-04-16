<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Banner::where(function($query){
                if(!Auth()->user()->hasRole('Super Admin'))
                {
                    $query->where('created_by',auth()->user()->id);
                }

            })->latest()->get();

            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a href="'.route("banner-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a><a href="'.route("banner-view", $row->id).'" class="edit btn btn-primary btn-sm">View</a>
                        <button type="button" id="deleteButton" data-url="'.route('banner-delete', $row->id).'" class="edit btn btn-primary btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $data = Banner::latest()->paginate();

        return view('admin.banner.banner',compact('data'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Banner::latest()->get();
        return view('admin.banner.banner-create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'web_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            'link' => 'required'
        ],['link.required'=>'Button text field is required']);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new Banner();
        $post->title = $request->title;
        if($request->hasFile('web_banner'))
        {
            $web_banner = 'web_banner_'.time().'.'.$request->web_banner->extension();
            $request->web_banner->move(public_path('uploads/web_banner'), $web_banner);
            $web_banner = "/uploads/web_banner/".$web_banner;
            $post->web_banner = $web_banner;
        }
        
         if($request->hasFile('app_banner'))
        {
            $app_banner = 'app_banner_'.time().'.'.$request->app_banner->extension();
            $request->app_banner->move(public_path('uploads/app_banner'), $app_banner);
            $app_banner = "/uploads/app_banner/".$app_banner;
            $post->app_banner = $app_banner;
        }
        
        $post->created_by = auth()->user()->id;
        $post->link = $request->link;
        $post->status = 1;
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => 'Banner created successfully'
			]);

    }


 public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.banner-show',compact('banner'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Banner::find($id);
        return view('admin.banner.banner-edit',compact('post'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $validator = Validator::make($request->all(), [
            'title' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required'
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = Banner::find($id);
        $post->title = $request->title;
        if($request->hasFile('web_banner'))
        {
            $web_banner = 'web_banner_'.time().'.'.$request->web_banner->extension();
            $request->web_banner->move(public_path('uploads/web_banner'), $web_banner);
            $web_banner = "/uploads/web_banner/".$web_banner;
            $post->web_banner = $web_banner;
        }
        
         if($request->hasFile('app_banner'))
        {
            $app_banner = 'app_banner_'.time().'.'.$request->app_banner->extension();
            $request->app_banner->move(public_path('uploads/app_banner'), $app_banner);
            $app_banner = "/uploads/app_banner/".$app_banner;
            $post->app_banner = $app_banner;
        }
        
        $post->is_offer = $request->is_offer;
        $post->created_by = auth()->user()->id;
        $post->link = $request->link;
        $post->status = $request->status;
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => 'Banner updated successfully'
			]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Banner deleted successfully'
			]);
    }
}
