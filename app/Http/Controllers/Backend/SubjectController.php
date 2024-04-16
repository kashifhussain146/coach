<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectCategory;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use Str;

class SubjectController extends Controller
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
            $data = Subject::select('id','subject_name','subject_category','status','created_at')
                            ->with(['category'=>function($query){
                                $query->select('id','category_name');
                            }])->latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {
                        $btn =' ';
                        if(Auth()->user()->can('Edit Subjects'))
                        {
                            $btn .= '<a href="'.route("subject-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        if(Auth()->user()->can('Delete Subjects')){
                            $btn .= ' <button type="button" data-url="'.route('subject-destroy', $row->id).'" class="edit btn btn-danger btn-sm deleteButton">Delete</a>';
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
        $title = 'Subject';

        return view('admin.subject.index',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = SubjectCategory::Activated()->get();
        return view('admin.subject.create',compact('category'));
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
            'subject_category'=>'required',
            'subject_name' => 'required|unique:subject,subject_name',
            'subject_desc'=>'required'
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }



        $category = new Subject();
        $category->subject_category = $request->subject_category;
        $category->subject_name = $request->subject_name;
        $category->subject_desc = $request->subject_desc;
        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at =  date('Y-m-d H:i:s');
        $category->save();


        return response()->json([
            'status' => true,
            'msg' => 'Subject created successfully'
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
       $loan = Subject::findorfail($id);
    //    prd($loan);
        return view('admin.subject.show',compact('loan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Subject::findorfail($id);
        $category = SubjectCategory::Activated()->get();
        return view('admin.subject.create',compact('loan','category'));
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
            'subject_category'=>'required',
            'subject_name' => 'required|unique:subject,subject_name,'.$id,
            'subject_desc'=>'required'
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }


        $category = Subject::find($id);
        $category->subject_category = $request->subject_category;
        $category->subject_name = $request->subject_name;
        $category->subject_desc = $request->subject_desc;
        $category->status = $request->status;
        $category->updated_at =  date('Y-m-d H:i:s');
        $category->save();



        return response()->json([
            'status' => true,
            'msg' => 'Subject updated successfully'
			]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Subject::find($id)->delete();
        
        return response()->json([
            'status' => true,
            'msg' => 'Subject deleted successfully'
			]);
    }

}
