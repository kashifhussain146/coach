<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubjectCategory;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use Str;

class SubjectCategoryController extends Controller
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
            $data = SubjectCategory::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {
                        $btn =' ';
                        if(Auth()->user()->can('Edit Category'))
                        {
                            $btn .= '<a href="'.route("subject-category-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        if(Auth()->user()->can('Delete Category')){
                            $btn .= ' <button type="button" data-url="'.route('subject-category-destroy', $row->id).'" class="edit btn btn-danger btn-sm deleteButton">Delete</a>';
                        }
                        return $btn;
                    })
                    ->addColumn('created_at',function($row){
                            return date('d/m/Y H:i:s',strtotime($row->created_at));
                    })
                    ->addColumn('status',function($row){
                        $status = "";
                        if($row->status=='Y'){
                            $status.='<div class="badge badge-success">Active</div>';
                        }else{
                            $status.='<div class="badge badge-danger">InActive</div>';                            
                        }
                        return $status;
                    })
                    ->addColumn('image',function($row){
                        $image = '';
                        $image.='<img style="height: 70px;" src="'.asset(''.$row->image).'" />';
                        return $image;
                     })
                    ->rawColumns(['action','image','status'])
                    ->make(true);
        }
        $title = 'Subject Category';

        return view('admin.subject-category.index',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject-category.create');
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
            'category_name' => 'required|unique:subject_category,category_name',
            'category_code'=>'required|unique:subject_category,category_code',
            'category_dec'=>'required'
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }



        $category = new SubjectCategory();
        $category->category_name = $request->category_name;
        $category->category_code = $request->category_code;
        $category->status = $request->status;
        $category->category_dec = $request->category_dec;
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
       $loan = SubjectCategory::findorfail($id);
    //    prd($loan);
        return view('admin.subject-category.show',compact('loan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = SubjectCategory::findorfail($id);
       
        return view('admin.subject-category.create',compact('loan'));
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
            'category_name' => 'required|unique:subject_category,category_name,'.$id,
            'category_code'=>'required|unique:subject_category,category_code,'.$id,
            'category_dec'=>'required'
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }


        $category = SubjectCategory::find($id);
        $category->category_name = $request->category_name;
        $category->category_code = $request->category_code;
        $category->status = $request->status;
        $category->category_dec = $request->category_dec;
        $category->updated_at =  date('Y-m-d H:i:s');
        $category->save();



        return response()->json([
            'status' => true,
            'msg' => 'Category updated successfully'
			]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        SubjectCategory::find($id)->delete();
        
        return response()->json([
            'status' => true,
            'msg' => 'Category deleted successfully'
			]);
    }

}
