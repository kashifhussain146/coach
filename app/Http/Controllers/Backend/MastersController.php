<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters;
use App\Models\Subject;
use App\Models\Colleges;
use App\Models\SubjectCategory;
use App\Models\CourseCode;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use App\Models\Admins;
class MastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Master List';

        return view('admin.masters.index',compact('title'));
    }


    public function indexAajax(Request $request)
    {

        $data = Masters::with('college:id,name','subject:id,subject_name','course:id,category_name','courseCode:id,code');

        if(Auth()->guard('admin')->user()->hasRole('Free Lancer') || Auth()->guard('admin')->user()->hasRole('Employee')){
            $data =   $data->whereHas('masters',function($query){
                                $query->where('user_id',Auth()->guard('admin')->user()->id);
                            });
        }

        $data = $data->orderBy('id','DESC');
            
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('college_name', function ($row) {
                        return $row->college ? $row->college->name : 'N/A';
                    })
                    ->addColumn('course_name', function ($row) {
                        return $row->course ? $row->course->category_name : 'N/A';
                    })
                    ->addColumn('subject_name', function ($row) {
                        return $row->subject ? $row->subject->subject_name : 'N/A';
                    })
                    ->addColumn('course_code', function ($row) {
                        return $row->courseCode ? $row->courseCode->code : 'N/A';
                    })
                    ->addColumn('action', function($row){

                        $btn = '';
                        if(auth()->user()->can('Module_Edit_master')){
                            $btn.= '<a href="'.route("masters-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        
                        // <a href="'.route("masters-view", $row->id).'" class="edit btn btn-primary btn-sm">View</a>
                        // <button type="button" id="deleteButton" data-url="'.route('masters-delete', $row->id).'" class="edit btn btn-primary btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>


                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Masters::latest()->get();
        $subjects =   Subject::select('id','subject_name as title')->where('status','Y')->get();
        $colleges =   Colleges::select('id','name as title')->where('status','Y')->get();
        $courses =    SubjectCategory::select('id','category_name as title')->where('status','Y')->get();
        $courseCode = CourseCode::select('id','code as title')->where('status','Y')->get();

        $employees = Admins::whereHas('roles', function ($query) {
                        $query->whereIn('name', ['Employee', 'Free Lancer']);
                    })
                        ->where('status', 'active')
                        ->get();
        return view('admin.masters.create',compact('data','subjects','colleges','courses','courseCode','employees'));
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
            'emailsubject' => 'required|max:255',
            // 'url' => 'required|url|max:255',
            // 'username' => 'required|string|max:255',
            // 'password' => 'required|string|max:255',
            // 'collegename' => 'required|string|max:255',
            // 'coursecode' => 'required|string|max:255',
            // 'coursename' => 'required|string|max:255',
            // 'subjectname' => 'required|string|max:255',
            // 'startdate' => 'required|date',
            // 'enddate' => 'required|date|after_or_equal:startdate',
            // 'grade' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();


        if($request->input('coursename')!=""){
        $courses =    SubjectCategory::firstOrCreate(['category_name' => $request->input('coursename')],
                                    [
                                        'category_name' => $request->input('coursename'),
                                        'category_dec'=>$request->input('coursename'),
                                        'category_code'=>$request->input('coursename').'-'.date('Y-m-d'),
                                        'status'=>'Y',
                                        'created_at'=>date('Y-m-d H:i:s'),
                                        'updated_at'=>date('Y-m-d H:i:s')
                                    ]);

        $data['coursename'] =  $courses->id;

        }

        if($request->input('subjectname')!=""){

        $subjects =   Subject::firstOrCreate(['subject_name' => $request->input('subjectname'),'subject_category'=>$courses->id],
                                [
                                    'subject_name' => $request->input('subjectname'),
                                    'subject_category'=>$courses->id,
                                    'subject_desc'=>$request->input('subjectname'),
                                    'status'=>'Y',
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                    ]);

           $data['subjectname'] =  $subjects->id;                          
        }                        
        
        if($request->input('collegename')!=""){
        
            $colleges =   Colleges::firstOrCreate(['name' => $request->input('collegename')],
                                [
                                    'name' => $request->input('collegename'),
                                    'status' => 'Y'
                                ]);

            $data['collegename'] =  $colleges->id;

        }


        if($request->input('coursecode')!=""){
        
            $courseCode = CourseCode::firstOrCreate(['code' => $request->input('coursecode')],
                                [
                                    'code' => $request->input('coursecode'),
                                    'status' => 'Y'
                                ]);

            $data['coursecode'] =  $courseCode->id;
        }
                          
        $master = Masters::create($data);

         if (isset($request->freelancers)) {
            if (count($request->freelancers) > 0) {

                $freelancer = [];

                foreach($request->freelancers as $k=>$v){
                    $freelancer[] = [
                        'master_id'=>$master->id,
                        'user_id'=>$v
                    ];
                }   
                
                \App\Models\MastersUsers::insert($freelancer);
              
            }
        }


        if (isset($request->employees)) {
            if (count($request->employees) > 0) {

                
                $employees = [];

                foreach($request->employees as $k=>$v){
                    $employees[] = [
                        'master_id'=>$master->id,
                        'user_id'=>$v
                    ];
                }  
               \App\Models\MastersUsers::insert($employees);

            }
        }

        return response()->json([
            'status' => true,
            'msg' => 'Master created successfully'
			]);

    }


 public function show($id)
    {
        $email = Masters::find($id);
        return view('admin.masters.show',compact('email'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Masters::find($id);
        $subjects =   Subject::select('id','subject_name as title')->where('status','Y')->get();
        $colleges =   Colleges::select('id','name as title')->where('status','Y')->get();
        $courses =    SubjectCategory::select('id','category_name as title')->where('status','Y')->get();
        $courseCode = CourseCode::select('id','code as title')->where('status','Y')->get();

        $employees = Admins::whereHas('roles', function ($query) {
                $query->whereIn('name', ['Employee', 'Free Lancer']);
            })
                ->where('status', 'active')
                ->get();
        
        return view('admin.masters.create',compact('email','subjects','colleges','courses','employees','courseCode'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Masters $master)
    {

      $validator = Validator::make($request->all(), [
            'emailsubject' => 'required|max:255',
            // 'url' => 'sometimes|required|url|max:255',
            // 'username' => 'sometimes|required|string|max:255',
            // 'password' => 'sometimes|required|string|max:255',
            // 'collegename' => 'sometimes|required|string|max:255',
            // 'coursecode' => 'sometimes|required|string|max:255',
            // 'coursename' => 'sometimes|required|string|max:255',
            // 'subjectname' => 'sometimes|required|string|max:255',
            // 'startdate' => 'sometimes|required|date',
            // 'enddate' => 'sometimes|required|date|after_or_equal:startdate',
            // 'grade' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();

        if($request->input('coursename')!=""){
        $courses =    SubjectCategory::firstOrCreate(['category_name' => $request->input('coursename')],
                                    [
                                        'category_name' => $request->input('coursename'),
                                        'category_dec'=>$request->input('coursename'),
                                        'category_code'=>$request->input('coursename').'-'.date('Y-m-d'),
                                        'status'=>'Y',
                                        'created_at'=>date('Y-m-d H:i:s'),
                                        'updated_at'=>date('Y-m-d H:i:s')
                                    ]);

        $data['coursename'] =  $courses->id;

        }

        if($request->input('subjectname')!=""){

        $subjects =   Subject::firstOrCreate(['subject_name' => $request->input('subjectname'),'subject_category'=>$courses->id],
                                [
                                    'subject_name' => $request->input('subjectname'),
                                    'subject_category'=>$courses->id,
                                    'subject_desc'=>$request->input('subjectname'),
                                    'status'=>'Y',
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                    ]);

           $data['subjectname'] =  $subjects->id;                          
        }                        
        
        if($request->input('collegename')!=""){
        
            $colleges =   Colleges::firstOrCreate(['name' => $request->input('collegename')],
                                [
                                    'name' => $request->input('collegename'),
                                    'status' => 'Y'
                                ]);

            $data['collegename'] =  $colleges->id;

        }


        if($request->input('coursecode')!=""){
        
            $courseCode = CourseCode::firstOrCreate(['code' => $request->input('coursecode')],
                                [
                                    'code' => $request->input('coursecode'),
                                    'status' => 'Y'
                                ]);

            $data['coursecode'] =  $courseCode->id;
        }

        
       
        
        

        \App\Models\MastersUsers::where('master_id',$master->id)->delete();

        if (isset($request->freelancers)) {
            if (count($request->freelancers) > 0) {

                $freelancer = [];

                foreach($request->freelancers as $k=>$v){
                    $freelancer[] = [
                        'master_id'=>$master->id,
                        'user_id'=>$v
                    ];
                }   

                \App\Models\MastersUsers::insert($freelancer);
            }
        }


        if (isset($request->employees)) {
            if (count($request->employees) > 0) {
                
                $employees = [];

                foreach($request->employees as $k=>$v){
                    $employees[] = [
                        'master_id'=>$master->id,
                        'user_id'=>$v
                    ];
                }  

               \App\Models\MastersUsers::insert($employees);

            }
        }


        $master->update($data);

        return response()->json([
            'status' => true,
            'msg' => 'Master updated successfully'
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
        Masters::find($id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Master deleted successfully'
			]);
    }
}
