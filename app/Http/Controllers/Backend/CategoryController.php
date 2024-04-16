<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use Str;
use App\Industry;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) 
        {
            $data = Category::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {
                        $btn =' ';
                        if(Auth()->user()->can('Edit Service'))
                        {
                            $btn .= '<a href="'.route("category-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        // if(Auth()->user()->can('Category View')){
                        //     $btn .= ' <button type="button" data-url="'.route('category-view', $row->id).'" class="edit btn btn-primary btn-sm viewDetail">View</a>';
                        // }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Services';
        return view('admin.category.category',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id=null)
    {
        $title = 'Create services';
        $loan = null;
        if($id!=null){
            $title = 'Edit services';
            $loan = Category::findorfail($id);
        }
        return view('admin.category.category-create',compact('loan','title'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";print_r($request->post());
        // exit;
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:category,title',
            'image'=>'required|mimes:jpg,jpeg,png,svg',

        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }



        $category = new Category();
        

        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        if($request->hasFile('image'))
        {
            $image = 'category_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('/uploads/category'), $image);
            $image = "/uploads/category/".$image;
            $category->image = $image ;
        }
        $category->status = $request->status;
        $category->description = $request->description;
        // $category->sort_order = $request->sort_order;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at =  date('Y-m-d H:i:s');
        $category->save();


        return response()->json([
            'status' => true,
            'msg' => 'Category created successfully'
			]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $loan = Category::with('industry')->find($id);
    //    prd($loan);
        return view('admin.category.category-show',compact('loan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Category::find($id);
        return view('admin.category.category-edit',compact('loan'));
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
        $validator = Validator::make($request->all(),[
            'title' => 'required|unique:category,title,'.$id,
            'image'=>'nullable|mimes:jpg,jpeg,png,svg',
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }


        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        if($request->hasFile('image'))
        {
            $image = 'category_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('/uploads/category'), $image);
            $image = "/uploads/category/".$image;
            $category->image = $image ;
        }
        $category->status = $request->status;
        $category->description = $request->description;
        // $category->sort_order = $request->sort_order;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at =  date('Y-m-d H:i:s');
        $category->save();



        return response()->json([
            'status' => true,
            'msg' => 'Service updated successfully'
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
        Category::find($id)->delete();
    }



}
