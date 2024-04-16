<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use App\Models\Admins;
use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeMail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'User Management List';
        return view('admin.users.users',compact('title'));
    }

    public function indexAajax(Request $request){

        $users = Admins::whereHas('roles');
        if ($request->status != '')
        {
            $users = $users->where('status', $request->status);
        }
        $users = $users->get();
       
        return datatables()->of($users)
        ->addColumn('action', function($row) {
            $actions = "";
            if(Auth()->user()->can('Edit Users'))
            {
                $actions .= "<a href=\"" . route('user-edit', ['id' => $row->id]) . "\" class=\"btn btn-xs btn-warning btn-flat info-btn\"><i class=\"fa fa-pencil\"></i> Edit</a>&nbsp;&nbsp;";
            }

            if(Auth()->user()->can('Edit Users')){
                $actions .= "<a href=\"" . route('user-view', ['id' => $row->id]) . "\" class=\"btn btn-xs btn-primary btn-flat info-btn\"><i class=\"fa fa-eye\"></i> View </a>";
            }
            return $actions;
        })

        ->addColumn('status', function($row) {
            $status = "";
            if($row->status=='active'){
                $status .= "<div class='badge badge-success'>Active</div>";
            }elseif($row->status=='inactive'){
                $status .= "<div class='badge badge-danger'>InActive</div>";                
            }

            return $status;
        })

        ->addColumn('roles', function ($row) {
            return implode(", ", $row->roles()->pluck('name')->toArray());
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id','name')->get();
        $title = 'User Create';
        return view('admin.users.users-create',compact('roles','title'));

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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:admins,email',
            'user_name' => 'required|unique:admins,user_name',
           // 'mobile_no' => 'required|numeric|min:10|unique:admins,mobile_no',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required',
            'roles' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }

        DB::beginTransaction();
        try{
            $user = new Admins();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            $user->user_name = $request->user_name;
            
            if($request->hasFile('profile_image'))
            {
                $imageName = time().'.'.$request->profile_image->extension();
                $request->profile_image->move(public_path('uploads/profile'), $imageName);
                $imageName = "uploads/profile/".$imageName;
                $user->profile_image = $imageName;
            }
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            $user->created_by = Auth()->user()->id;
            $user->save();
            $user->assignRole($request->roles);

            SendWelcomeEmail::dispatch($user, $request->password);
            
            DB::commit();
            return response()->json([
                'status' => true,
                'msg' => 'User created successfully',
                'route'=>route('user-list')
                ]);
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
        $user = Admins::find($id);
        $title = 'User Details';
        return view('admin.users.users-show',compact('user','title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admins::find($id);
        $userRole = $user->roles->pluck('id','name')->all();
        $roles = Role::select('id','name')->get();
        $title = 'User Edit';
        return view('admin.users.users-edit',compact('user','userRole','roles', 'title'));
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:admins,email,'.$id,
            'user_name' => 'required|unique:admins,user_name,'.$id,
            //'mobile_no' => 'required|numeric|min:10|unique:admins,mobile_no,'.$id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required',
            'roles.*' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }

        
        try{
        DB::beginTransaction();
        $user = Admins::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->user_name = $request->user_name;
        if($request->hasFile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $imageName);
            $imageName = "uploads/profile/".$imageName;
            $user->profile_image = $imageName;
        }
        $user->status = $request->status;
        if($request->password!=''){
            $user->password = Hash::make($request->password);
        }
        $user->created_by = Auth()->user()->id;
        $user->save();
      
        if($user->id != 1){
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->roles);
        }
        DB::commit();
        return response()->json([
            'status' => true,
            'msg' => 'User updated successfully',
            'route'=>route('user-list')
			]);
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
        Admins::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }



    public function changeFlag(Request $request, $table, $id)
    {       

        try
        {
            if ($request->status == 1)
            {
                $msg = 'Record has been Active Successfully!';
            }
            else
            {
                $msg = 'Record has been InActive Successfully!';
            }

            \DB::table($table)->where('id',$id)->update(['status'=>$request->status]);
            
            $responce = ['status' => true, 'message' => $msg];

        }
        catch (\Exception $e)
        {
            $responce = ['status' => false, 'message' => $e->getMessage()];
        }

        return $responce;
    }


}
