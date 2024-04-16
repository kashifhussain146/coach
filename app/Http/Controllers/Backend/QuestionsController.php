<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectCategory;
use App\Models\Questions;
use App\Models\Colleges;
use App\Models\CourseCode;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use Str;

class QuestionsController extends Controller
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
            $data = Questions::with(['subjects'=>function($query){
                                $query->select('id','subject_name');
                            }])
                            ->latest()
                            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='';
                        $btn .= '<a href="'.route("questions-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $btn .= ' <button type="button" data-url="'.route('questions-destroy', $row->id).'" class="edit btn btn-danger btn-sm deleteButton">Delete</a>';
                        return $btn;
                    })
                    ->addColumn('added_date',function($row){
                            return date('d/m/Y H:i:s',strtotime($row->added_date));
                    })
                    ->addColumn('subject_name',function($row){
                        $subject = "N/A";
                        if($row->subjects!=''){
                            $subject = $row->subjects->subject_name;
                        }
                        return $subject;
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
                    ->rawColumns(['action','status','question','answer'])
                    ->make(true);
        }
        $title = 'Questions';

        return view('admin.questions.index',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = Colleges::Activated()->get();
        $course  = CourseCode::Activated()->get();
        $subjectcategory = SubjectCategory::Activated()->get();

        $title = 'Questions';
        return view('admin.questions.create',compact('colleges','course','subjectcategory','title'));
    }

    public function getSubcategory(Request $request){
        $subject = Subject::select('subject_name','id')->where('subject_category',$request->category_id)->Activated()->get();
        return response()->json($subject);
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
            'question'=>'required',
            'score' => 'required|numeric',
            'type'=>'required',
            'startdatetime'=>'required',
            'enddatetime'=>'required',
            'answer'=>'required',
            'price'=>'required|numeric',
            'subject_category'=>'required',
            'subject'=>'required',
            'file_name'=>'required|mimes:docx',
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }

        $data = $request->except('_token');           
        if(isset($data['file_name']))
        {
            $file_name = 'file_name_'.time().'.'.$request->file_name->extension();
            $request->file_name->move(public_path('uploads/file_name'), $file_name);
            $data['file_name'] = $file_name;
        }
        $data['added_date'] = date('Y-m-d');
        $data['addedby']    = Auth()->guard('admin')->user()->id;
        Questions::create($data);



        return response()->json([
            'status' => true,
            'msg' => 'Questions created successfully'
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
        return view('admin.questions.show',compact('loan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Questions::findorfail($id);
        $colleges = Colleges::Activated()->get();
        $course  = CourseCode::Activated()->get();
        $subjectcategory = SubjectCategory::Activated()->get();
        $subjects = Subject::where('subject_category',$loan->subject_category)->Activated()->get();

        $title = 'Questions';
        return view('admin.questions.create',compact('subjects','title','loan','colleges','course','subjectcategory'));
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
            'question'=>'required',
            'score' => 'required|numeric',
            'type'=>'required',
            'startdatetime'=>'required',
            'enddatetime'=>'required',
            'answer'=>'required',
            'price'=>'required|numeric',
            'subject_category'=>'required',
            'subject'=>'required',
            'file_name'=>'nullable|mimes:docx',
        ]);

        if ($validator->fails()) 
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }


        $questions = Questions::find($id);
        $data = $request->except('_token');
        if(isset($data['file_name']))
        {
            $file_name = 'file_name_'.time().'.'.$request->file_name->extension();
            $request->file_name->move(public_path('uploads/file_name'), $file_name);
            $data['file_name'] = $file_name;
        }
        $data['added_date'] = date('Y-m-d');
        $data['addedby']    = Auth()->guard('admin')->user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $questions->update($data);

        return response()->json([
            'status' => true,
            'msg' => 'Questions updated successfully'
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
            'msg' => 'Questions deleted successfully'
			]);
    }

}
