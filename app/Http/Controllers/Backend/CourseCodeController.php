<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseCode;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use Str;

class CourseCodeController extends Controller
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
            $data = CourseCode::get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {
                        $btn =' ';
                        if(Auth()->user()->can('Module_Edit_course-code'))
                        {
                            $btn .= '<a href="'.route("course-code-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        if(Auth()->user()->can('Module_Delete_course-code')){
                            $btn .= ' <button type="button" data-url="'.route('course-code-destroy', $row->id).'" class="edit btn btn-danger btn-sm deleteButton">Delete</a>';
                        }
                        return $btn;
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
                    
                    ->rawColumns(['action','image','status'])
                    ->make(true);
        }
        $title = 'CourseCode List';

        return view('admin.course-code.index',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course-code.create');
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
            'code' => 'required|unique:cousecode,code'
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }



        $category = new CourseCode();
        $category->code = $request->code;
        $category->status = $request->status;
        $category->save();


        return response()->json([
            'status' => true,
            'msg' => 'CourseCode created successfully'
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
       $loan = CourseCode::findorfail($id);
        return view('admin.course-code.show',compact('loan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = CourseCode::findorfail($id);
       
        return view('admin.course-code.create',compact('loan'));
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
            'code' => 'required|unique:cousecode,code,'.$id
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }


        $category = CourseCode::find($id);
        $category->code = $request->code;
        $category->status = $request->status;
        $category->save();



        return response()->json([
            'status' => true,
            'msg' => 'CourseCode updated successfully'
			]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        CourseCode::find($id)->delete();
        
        return response()->json([
            'status' => true,
            'msg' => 'CourseCode deleted successfully'
			]);
    }

}
