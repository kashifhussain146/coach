<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskDetail;
use DataTables;
use Validator;
use DB;
use App\Models\Admins;
use App\Models\Proposals;
use App\Models\ModulesData;
use Auth;
use App\Imports\TaskDetailsImport;
use Maatwebsite\Excel\Facades\Excel;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = ModulesData::where('module_id',11)->pluck('title','id')->toArray();
        $colleges = ModulesData::where('module_id',35)->pluck('title','id')->toArray();
        $courses =  ModulesData::where('module_id',37)->pluck('title','id')->toArray();
        $courseCode = ModulesData::where('module_id',21)->pluck('title','id')->toArray();
        $employees = Admins::where('status','active')->get();
        $title = 'Tasks List';
        return view('admin.tasks.index',compact('employees','title','subjects','colleges','courses','courseCode'));
    }

    public function indexAajax(Request $request){
        $tasks = Task::where(function($query){
                            if(!Auth()->guard('admin')->user()->hasRole('Admin')){
                                // $query->where('created_by',Auth()->guard('admin')->user()->id);
                                $query->whereHas('freelancers',function($query){
                                    $query->where('user_id',Auth()->guard('admin')->user()->id);
                                });
                            }
                        })
                        ->latest();
        
        if($request->created_by!=''){
            $tasks = $tasks->where('created_by',$request->created_by);
        }

        if($request->subjects!=''){
            $tasks = $tasks->where('subject_id',$request->subjects);
        }
         
        if($request->colleges!=''){
            $tasks = $tasks->where('college_id',$request->colleges);
        }
        
        if($request->courses!=''){
            $tasks = $tasks->where('course_id',$request->courses);
        }
                
        if($request->courseCode!=''){
            $tasks = $tasks->where('course_code_id',$request->courseCode);
        }

        if($request->dates!=''){            
            [$startDate, $endDate] = explode(' to ', $request->dates);
            $tasks = $tasks->whereDate('start_date_time','>=',$startDate)
                           ->whereDate('start_date_time','<=',$endDate);
        }
        $status = $request->status;
        if($request->status!=''){
           
            $tasks =    $tasks->whereHas('freelancers',function($query) use ($status){
                            $query->where('user_id',Auth()->guard('admin')->user()->id)->whereIn('status',[$status]);
                        });
        }        
        
        $tasks = $tasks->get();
       
        return DataTables::of($tasks)
                        ->addColumn('action', function($row) use ($status){

                            $actions = "";

                            $authUser = Auth()->guard('admin')->user();

                            if(Auth()->user()->can('Edit Tasks') && Auth()->guard('admin')->user()->hasRole('Admin')){
                                $actions .= "<a href=\"" . route('tasks-edit', ['id' => $row->id]) . "\" class=\"btn btn-xs btn-warning btn-flat info-btn\"><i class=\"fa fa-pencil\"></i> Edit</a>&nbsp;&nbsp;";
                            }

                            $actions .= "<a href=\"" . route('tasks-view', ['id' => $row->id]) . "\" class=\"btn btn-xs btn-primary btn-flat info-btn\"><i class=\"fa fa-eye\"></i> View </a>&nbsp;&nbsp;";


                            if($authUser->roles()->first()->name == 'Free Lancer' && $row->freelancers()->where('user_id',$authUser->id)->whereIn('status',[Proposals::STATUS_PREVIEW])->count() > 0 ){
                                $actions .= "<a href=\"" . route('status-update',['id'=>$row->freelancers()->where('user_id',$authUser->id)->first()->id,'status'=>\App\Models\Proposals::STATUS_ACCEPTED]) . "\" class=\"btn-xs btn btn-success \"> I can do it </a>&nbsp;&nbsp;";
                                $actions .= "<a href=\"" . route('status-update',['id'=>$row->freelancers()->where('user_id',$authUser->id)->first()->id,'status'=>\App\Models\Proposals::STATUS_REJECTED]) . "\" class=\"btn-xs btn btn-danger \"> I can't do it </a>&nbsp;&nbsp;";
                            }

                            if(Auth()->guard('admin')->user()->hasRole('Free Lancer') && $status == 'ASSIGNED'){
                                $actions .= "<a href=\"" . route('tasks-start-work',['task'=>$row->id]) . "\" class=\"btn-xs btn btn-warning \"> <i class='fa fa-edit'></i> Start work </a>&nbsp;&nbsp;";                                
                            }


                            if(Auth()->user()->can('Assign Tasks')){
                                
                                $haveRecords = $row->freelancers()->where('role',30)->whereIn('status',[Proposals::STATUS_ACCEPTED,Proposals::STATUS_ASSIGNED])->count();
                                if($haveRecords > 0) {
                                    $actions .= "<a data-created_by='".$row->created_by."' data-id='".$row->id."' data-url='".route('status-assign',$row->id)."' class=\"assignModal btn btn-xs btn-primary btn-flat info-btn\" data-toggle='modal' data-target='#viewDetail'><i class=\"fa fa-eye\" ></i> Assign To </a>";
                                }

                            }

                            return $actions;
                        })
                        ->addColumn('college', function($row) {
                            return ($row->college)?$row->college->title:"N/A";
                        })
                        // ->addColumn('status', function($row) {
                        //     return $row->status;
                        // })
                        ->addColumn('subject', function($row) {
                            return ($row->subject)?$row->subject->title:"N/A";
                        })
                        ->addColumn('course', function($row) {
                            return ($row->course)?$row->course->title:"N/A";
                        })
                        ->addColumn('course_code', function($row) {
                            return ($row->courseCode)?$row->courseCode->title:"N/A";
                        })
                        ->addColumn('task_type', function($row) {
                            return ($row->task_type!='')? ucwords(str_replace('_',' ',$row->task_type)):"N/A";
                        })
                        ->addColumn('assignment_type', function($row) {
                            return ($row->assignment_type!='')? ucwords(str_replace('_',' ',$row->assignment_type)):"N/A";
                        })
                        ->addColumn('createdBy', function($row) {

                            $createdBy = [];

                            $freelancers = $row->freelancers->where('role',30)->pluck('user_id')->toArray();
                            $employes = $row->freelancers->where('role',26)->pluck('user_id')->toArray();

                            if(count($freelancers) > 0){
                                array_push($createdBy, ...$freelancers);
                            }

                            if(count($employes) > 0){
                                array_push($createdBy, ...$employes);
                            }
                            

                            $employees = Admins::whereIn('id',$createdBy)->where('status','active')->pluck('name')->toArray();
                            return $employees = implode(',',$employees);
                            //return (isset($row->createdBy))?$row->createdBy->name.' '.$row->createdBy->last_name:"N/A";
                        })
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tasks Create';
        $subjects = ModulesData::where('module_id',11)->pluck('title')->toArray();
        $colleges = ModulesData::where('module_id',35)->pluck('title')->toArray();
        $courses = ModulesData::where('module_id',37)->pluck('title')->toArray();
        $courseCode = ModulesData::where('module_id',21)->pluck('title')->toArray();

        $employees = Admins::whereHas('roles',function($query){
                            $query->whereIn('name',['Employee','Free Lancer']);
                    })->where('status','active')->get();
        
        
        // dd($subjects,$colleges,$courses,$courseCode);
        return view('admin.tasks.tasks-create',compact('employees','title','subjects','colleges','courses','courseCode'));

    }


    public function rolesTasks(Request $request){

        $role = $request->role_name;

        $employees = Admins::select('id','name')->whereHas('roles',function($query) use ($role){
                                $query->where('name',$role);
                            })->where('status','active')->get();

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validators = Validator::make($request->all(),[
            //'start_date_time' => 'required|date',
            'college_id' => 'required|string',
            'subject_id' => 'required|string',
            'course_id' => 'required|string',
            'course_code_id' => 'required|string',
            //'deadline_date_time'=>'required|date',
            'task_type' => 'required|in:assignment_homework,discussion_initial_post,quiz_exam,peer_responses',
            'questions_file' => 'nullable|mimes:csv,txt,pdf,doc,docx', // Example for essay_upload
        ],[
            'questions_file.mimes'=>'Please enter a valid file extension eg..csv,pdf,doc,docx'
        ]);

        if ($validators->fails()) {
            return response()->json([
             'status' => false,
             'errors' => $validators->errors()
             ]);
         }
         try{
            DB::beginTransaction();
            $data = $request->except('_token');

            $colleges = ModulesData::where('module_id',35)->firstOrCreate(['title' => $request->input('college_id'),'module_id'=>35]);
            $subjects = ModulesData::where('module_id',11)->firstOrCreate(['title' => $request->input('subject_id'),'module_id'=>11]);
            $courses = ModulesData::where('module_id',37)->firstOrCreate(['title' => $request->input('course_id'),'module_id'=>37]);
            $courseCode = ModulesData::where('module_id',21)->firstOrCreate(['title' => $request->input('course_code_id'),'module_id'=>21]);


            $data['unique_group_id'] = $request->unique_group_id_1.$request->unique_group_id_2.$request->unique_group_id_3.$request->unique_group_id_4.$request->unique_group_id_5.date('His');
            $data['college_id'] = $colleges->id;
            $data['subject_id'] =$subjects->id;
            $data['course_id']  =$courses->id;
            $data['course_code_id'] = $courseCode->id;
            
    
            /* If employee role select only */
            if($request->hasFile('questions_file')){
                $questions_file = 'questions_'.time().'.'.$request->questions_file->extension();
                $request->questions_file->move(public_path('/uploads/questions'), $questions_file);
                $questions_file = "/uploads/questions/".$questions_file;
                $data['questions_file'] = $questions_file;
            }

            $task = Task::create($data);

            if($request->input_type=='file' && $request->hasFile('questions_file')){

                
                // $extension = $request->file('questions_file')->extension();
                // if($extension=='csv'){

                //     $file = $request->file('questions_file');
                //     $filePath = $file->getRealPath();
                //     $csvData = array_map('str_getcsv', file($filePath));
                //     $headers = array_shift($csvData);
    
    
                //     foreach ($csvData as $row) {
                //         $rowData = array_combine($headers, $row);
    
    
                //         TaskDetail::create([
                //             'task_id' => $task->id,
                //             'questions' => strip_tags(json_decode(json_encode($rowData['Question']), True)),
                //             //'answers' => $rowData['Answer'],
                //         ]);
                //     }

                // }

            } else {

                foreach ($request->questions as $k=>$row) {
                    TaskDetail::create([
                        'task_id' => $task->id,
                        'questions' => $row,
                        //'answers' => $request->answers[$k],
                    ]);
                }

            }

            if(isset($request->freelancers)){
                if( count($request->freelancers) > 0  ){

                    $freeLancers = Admins::whereIn('id',$request->freelancers)->whereHas('roles',function($query){
                                            $query->where('name','Free Lancer');
                                        })->where('status','active')
                                        ->pluck('id')
                                        ->map(function($item) use ($task) {
                                            return ['user_id' => $item, 'task_id' => $task->id,'role'=> 30,'status'=>'PREVIEW'];
                                        })->toArray();
    
                    Proposals::insert($freeLancers);
               }
            }


            if(isset($request->employees)){
                if( count($request->employees) > 0  ){

                    $employees = Admins::whereIn('id',$request->employees)->whereHas('roles',function($query){
                                            $query->where('name','Employee');
                                        })->where('status','active')
                                        ->pluck('id')
                                        ->map(function($item) use ($task) {
                                            return ['user_id' => $item, 'task_id' => $task->id,'role'=> 26,'status'=>'ASSIGNED'];
                                        })->toArray();

                    Proposals::insert($employees);
            }
        }



            DB::commit();


            return response()->json(['success'=>'Task created successfully','route'=>route('tasks-list')]);
         }
         catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
                ]);
        }
    }   

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        $user = Admins::find($task->created_by);

        // if(in_array("Free Lancer",Auth()->guard('admin')->user()->getRoleNames()->toArray()) && $user->roles()->first()->name != 'Free Lancer' ){
        //     $check = Proposals::where(['task_id'=>$id,'user_id'=>Auth()->guard('admin')->user()->id,'status'=>Proposals::STATUS_ASSIGNED])->count();
        //     if(!$check){
        //         abort(403);
        //     }
        // }


        $title = 'Tasks View';
        return view('admin.tasks.tasks-show',compact('task','title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task = Task::findOrFail($id);

        //$user = Admins::find($task->created_by);

        // if(in_array("Free Lancer",Auth()->guard('admin')->user()->getRoleNames()->toArray()) && $user->roles()->first()->name != 'Free Lancer' ){

        //     Proposals::where(['task_id'=>$id,'user_id'=>Auth()->guard('admin')->user()->id,'status'=>Proposals::STATUS_ASSIGNED])->update(['is_read'=>1]);
        //     $check = Proposals::where(['task_id'=>$id,'user_id'=>Auth()->guard('admin')->user()->id,'status'=>Proposals::STATUS_ASSIGNED])->count();
        //     if(!$check){
        //         abort(403);
        //     }
        // }

       



        $subjects = ModulesData::where('module_id',11)->pluck('title')->toArray();
        $colleges = ModulesData::where('module_id',35)->pluck('title')->toArray();
        $courses = ModulesData::where('module_id',37)->pluck('title')->toArray();
        $courseCode = ModulesData::where('module_id',21)->pluck('title')->toArray();
        $employees = Admins::whereHas('roles',function($query){
                                $query->whereIn('name',['Employee','Free Lancer']);
                            })->where('status','active')->get();
        $title = 'Tasks Edit';
        return view('admin.tasks.tasks-edit',compact('employees','task','subjects','colleges', 'courses','courseCode','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            //'start_date_time' => 'required|date',
            //'end_date_time' => 'required|date',
            'college_id' => 'required|string',
            'subject_id' => 'required|string',
            'course_id' => 'required|string',
            'course_code_id' => 'required|string',
            //'deadline_date_time'=>'required|date',
            'task_type' => 'required|in:assignment_homework,discussion_initial_post,quiz_exam,peer_responses',
          
            'questions_file' => 'nullable|mimes:csv,txt,pdf', // Example for essay_upload
        ],[
            'questions_file.mimes'=>'Please enter a valid file extension eg..csv,pdf,docx'
        ]
    );

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }

        
        try{

        DB::beginTransaction();

        $data = $request->except('_token');
        
        $task = Task::findOrFail($id);
        
        if($request->hasFile('questions_file')){
            $questions_file = 'questions_'.time().'.'.$request->questions_file->extension();
            $request->questions_file->move(public_path('/uploads/questions'), $questions_file);
            $questions_file = "/uploads/questions/".$questions_file;
            $data['questions_file'] = $questions_file;
          
            
        }

        if($request->hasFile('answers_file')){
            $answers_file = 'answers_'.time().'.'.$request->answers_file->extension();
            $request->answers_file->move(public_path('/uploads/answers'), $answers_file);
            $answers_file = "/uploads/answers/".$answers_file;
            $data['answers_file'] = $answers_file;
            
        }
       

        if($request->input_type=='file' && $request->hasFile('questions_file')){
                // $task->details()->delete();
                
                // $file = $request->file('questions_file');
                // $filePath = $file->getRealPath();
    
                // $csvData = array_map('str_getcsv', file($filePath));
                // $headers = array_shift($csvData);
                               
                // foreach ($csvData as $row) {
                //     $rowData = array_combine($headers, $row);
                //     TaskDetail::create([
                //         'task_id' => $task->id,
                //         'questions' => json_decode(json_encode($rowData['Question']), True),
                //         'answers' => json_decode(json_encode($rowData['Answer']), True),
                //     ]);
                // }

        }elseif($request->input_type=='multiple'){
            
            $task->details()->delete();

            foreach ($request->questions as $k=>$row) {
                TaskDetail::create([
                    'task_id' => $task->id,
                    'questions' => mb_convert_encoding($row, 'UTF-8', 'auto') ,
                    'answers' =>mb_convert_encoding($request->answers[$k], 'UTF-8', 'auto'),
                ]);
            }

        }


        $colleges = ModulesData::where('module_id',35)->firstOrCreate(['title' => $request->input('college_id'),'module_id'=>35]);
        $subjects = ModulesData::where('module_id',11)->firstOrCreate(['title' => $request->input('subject_id'),'module_id'=>11]);
        $courses = ModulesData::where('module_id',37)->firstOrCreate(['title' => $request->input('course_id'),'module_id'=>37]);
        $courseCode = ModulesData::where('module_id',21)->firstOrCreate(['title' => $request->input('course_code_id'),'module_id'=>21]);
        
        $data['unique_group_id'] = $request->unique_group_id_1.$request->unique_group_id_2.$request->unique_group_id_3.$request->unique_group_id_4.$request->unique_group_id_5.date('His');
        $data['college_id'] = $colleges->id;
        $data['subject_id'] =$subjects->id;
        $data['course_id']  =$courses->id;
        $data['course_code_id'] = $courseCode->id;
        

        if($request->created_by!=''){
            $data['created_by'] = $request->created_by;
        }else{
            $data['created_by'] = Auth()->guard('admin')->user()->id;
        }


        $task->update($data);

        $taskID = $task->id;

        if(isset($request->freelancers)){
            if( count($request->freelancers) > 0  ){

                $freelancers = Admins::select('id')->whereHas('roles', function($query) {
                                            $query->where('name', 'Free Lancer');
                                        })
                                        ->where('status','active')
                                        ->pluck('id')
                                        ->toArray();


            // Get existing proposals for the task
                $existingProposals = Proposals::where('task_id', $taskID)->whereIn('user_id',$freelancers)->get();
                
                // Create a map of existing proposals indexed by user_id
                $existingProposalsMap = [];
                $existingIDS= [];

                foreach ($existingProposals as $proposal) {
                    $existingProposalsMap[$proposal->user_id] = $proposal;
                    $existingIDS[] = $proposal->user_id;
                }

                // Process selected freelancers
                $proposalsToInsert = [];
                foreach ($request->freelancers as $freelancerID) {
                    // If the proposal for the freelancer exists and has a different status, skip updating
                    if (isset($existingProposalsMap[$freelancerID])) {
                        $proposalsToInsert[] = [
                            'user_id' => $freelancerID,
                            'task_id' => $taskID,
                            'role'=> 30,
                            'status' => $existingProposalsMap[$freelancerID]->status
                        ];
                    }else{
                        $proposalsToInsert[] = [
                            'user_id' => $freelancerID,
                            'task_id' => $taskID,
                            'role'=> 30,
                            'status' => 'PREVIEW'
                        ];
                    }


                }

                // Delete existing proposals for unchecked freelancers           
                Proposals::where('task_id', $taskID)->whereIn('user_id', $existingIDS)->delete();
                // Insert new proposals
                Proposals::insert($proposalsToInsert);

        }
    }

     
    if(isset($request->employees)){
            if( count($request->employees) > 0  ){

                    $employees = Admins::select('id')->whereHas('roles', function($query) {
                                            $query->where('name', 'Employee');
                                        })
                                        ->where('status','active')
                                        ->pluck('id')
                                        ->toArray();


                // Get existing proposals for the task
                    $existingProposals = Proposals::where('task_id', $taskID)->whereIn('user_id',$employees)->get();
                    
                    // Create a map of existing proposals indexed by user_id
                    $existingProposalsMap = [];
                    $existingIDS= [];

                    foreach ($existingProposals as $proposal) {
                        $existingProposalsMap[$proposal->user_id] = $proposal;
                        $existingIDS[] = $proposal->user_id;
                    }

                    // Process selected employees
                    $proposalsToInsert = [];
                    foreach ($request->employees as $freelancerID) {
                        // If the proposal for the freelancer exists and has a different status, skip updating
                        if (isset($existingProposalsMap[$freelancerID])) {
                            $proposalsToInsert[] = [
                                'user_id' => $freelancerID,
                                'task_id' => $taskID,
                                'role'=> 26,
                                'status' => $existingProposalsMap[$freelancerID]->status
                            ];
                        }else{
                            $proposalsToInsert[] = [
                                'user_id' => $freelancerID,
                                'task_id' => $taskID,
                                'role'=> 26,
                                'status' => 'PREVIEW'
                            ];
                        }


                    }

                    // Delete existing proposals for unchecked employees           
                    Proposals::where('task_id', $taskID)->whereIn('user_id', $existingIDS)->delete();
                    // Insert new proposals
                    Proposals::insert($proposalsToInsert);
                }
    }

        DB::commit();
        return response()->json(['success'=>'Task updated successfully','route'=>route('tasks-list')]);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
                ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            TaskDetail::findOrFail($id)->delete();
            DB::commit();
            return response()->json(['status'=>true,'success'=>'Task updated successfully','route'=>route('tasks-list')]);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'success'=>$e->getMessage(),'route'=>route('tasks-list')]);
        }
    }


    public function statusUpdate($id,$status){
        try{
            DB::beginTransaction();
            $proposals = Proposals::find($id);
            $proposals->status = $status;
            $proposals->save();

            $proposals->task->status = $status;
            $proposals->task->save();

            DB::commit();

            return redirect()->back()->with('success','Task status update successfully');
        }
        catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function statusAssigned(Request $request,$id){
        try{
            DB::beginTransaction();

            $task = Task::find($id);
            $task->created_by = $request->user_id;
            $task->status = Task::STATUS_ASSIGNED;
            $task->save();

            Proposals::where(['task_id'=>$id,'status'=>Proposals::STATUS_ASSIGNED])->update(['status'=>Proposals::STATUS_ACCEPTED]);

            Proposals::where(['user_id'=>$request->user_id,'task_id'=>$id])->update(['status'=>Proposals::STATUS_ASSIGNED]);

            DB::commit();
            return redirect()->back()->with('success','Task status update successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    
    public function getFreelancers(Request $request){
        $task_id     =  $request->task_id;

        $task = Task::find($task_id);
        
        // $Proposals = $task->freelancers()->whereIn('status',[Proposals::STATUS_ACCEPTED,Proposals::STATUS_ASSIGNED])->pluck('user_id')->toArray();
        
        // $freeLancers =  Admins::select('id','name','last_name')->whereIn('id',$Proposals)->where('status','active')->get();

        $freelancers = Admins::select('id','name','last_name')->whereHas('roles', function($query) {
                                    $query->where('name', 'Free Lancer');
                                })
                                ->whereHas('proposalsMany', function($query) {
                                    $query->whereIn('status', [Proposals::STATUS_ACCEPTED, Proposals::STATUS_ASSIGNED]);
                                })
                                ->where('status','active')
                                ->get();

  
        return response()->json($freelancers);

    }



    public function startWork(Request $request,Task $task){
        $title = 'Start Work';

        Proposals::where(['task_id'=>$task->id,'user_id'=>Auth()->guard('admin')->user()->id,'status'=>Proposals::STATUS_ASSIGNED])->update(['is_read'=>1]);

        return view('admin.tasks.start-work',compact(
            'task',
            'title'
        ));
    }



    public function updateStartWork(Request $request, $id){

        $task = Task::findOrFail($id);
        $request->validate([
            'start_date_time' => 'required|date',
            // 'end_date_time' => 'required|date',
            //'answers_file' => ($task->input_type=='file')?'required':'nullable', // Example for essay_upload
        ],
        [
            'questions_file.mimes'=>'Please enter a valid file extension eg..csv,pdf,docx'
        ]);
        
        try{

        DB::beginTransaction();

        $data = $request->except('_token');
        $message = 'Task started successfully Now you can add questions';
        $route = route('tasks-start-work',$id);
        if($request->draft_type == 1 ){
            
            $route = route('tasks-list');

            $message = 'Task completed successfully';
            
            if($task->input_type=='file' && $request->hasFile('answers_file') && $request->file('answers_file')->isValid()){               
                    $task->details()->delete();
                    // Import the CSV file
                    Excel::import(new TaskDetailsImport($task->id), $request->file('answers_file'));

            }elseif($task->input_type=='multiple'){
                
                    $task->details()->delete();

                    foreach ($request->questions as $k=>$row) {
                        TaskDetail::create([
                            'task_id' => $task->id,
                            'questions' => mb_convert_encoding($row, 'UTF-8', 'auto') ,
                            'answers' =>mb_convert_encoding($request->answers[$k], 'UTF-8', 'auto'),
                        ]);
                    }

            }

            if($request->hasFile('answers_file')){
                $answers_file = 'answers_'.time().'.'.$request->answers_file->extension();
                $request->answers_file->move(public_path('/uploads/answers'), $answers_file);
                $answers_file = "/uploads/answers/".$answers_file;
                $data['answers_file'] = $answers_file;            
            }

            $task->status = Task::STATUS_COMPLETED;

            Proposals::where(['user_id'=>Auth()->guard('admin')->user()->id,'task_id'=>$task->id])->update(['status'=>Proposals::STATUS_COMPLETED]);

        }

        $task->update($data);


        

        DB::commit();

        return redirect()->to($route)->withSuccess($message);
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withError($e->getMessage());
        }
    }


}
