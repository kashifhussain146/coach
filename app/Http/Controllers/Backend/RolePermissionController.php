<?php


namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;
use Validator;


class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles(Request $request)
    {
        $data = Role::latest()->get();

        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("roles-edit", $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                        <button type="button" data-url="'.route('roles-view', $row->id).'" class="edit btn btn-primary btn-sm viewDetail">View</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'List Roles / Permissions';
        return view('admin.roles.roles',compact('title','data','title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$permission = Permission::get();
        $title = 'Create Roles / Permissions';
        $permission =  $this->getPermissionData();
        return view('admin.roles.roles-create',compact('permission','title','title'));
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
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}

        DB::beginTransaction();
        try{
            $role = Role::create(['name' => $request->input('name'),'description'=>$request->description]);
            $role->syncPermissions($request->input('permission'));
            DB::commit();
            return response()->json([
                'status' => true,
                'msg' => 'Role created successfully'
                ]);
                
        }
        catch(\Exception $e){

            DB::rollBack();

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
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                        ->where("role_has_permissions.role_id",$id)
                                        ->get();
        $title = 'View Roles / Permissions';
        return view('admin.roles.show',compact('role','rolePermissions','title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Roles / Permissions';

        $role = Role::with('permissions')->find($id);

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        $permission =  $this->getPermissionData();

        return view('admin.roles.roles-edit',compact('role','permission','rolePermissions','title'));
    }


    public function getPermissionData()
    {
        $parentPermissions = Permission::where('parent_id', 0)->orderBy('sort_order')->get();
        $customPermissions = [];

        foreach ($parentPermissions as $parentPermission) {
            if ($this->hasChildrenOrSubChildren($parentPermission)) {
                $customPermissions[] = $this->buildPermissionArray($parentPermission);
            }
        }

        return $customPermissions;
    }


    private function hasChildrenOrSubChildren($permission)
    {
        $childrenCount = Permission::where('parent_id', $permission->id)->orderBy('sort_order')->count();

        if ($childrenCount > 0) {
            return true;
        }

        $subChildrenCount = Permission::whereIn('parent_id', function ($query) use ($permission) {
            $query->select('id')
                ->from('permissions')
                ->where('parent_id', $permission->id);
        })->orderBy('sort_order')->count();

        return $subChildrenCount > 0;
    }

    private function buildPermissionArray($permission)
    {
        $result = [
            'id' => $permission->id,
            'name' => $permission->name,
        ];

        $children = Permission::where('parent_id', $permission->id)->orderBy('sort_order')->get();

        if ($children->isNotEmpty()) {
            $result['children'] = [];
            foreach ($children as $childPermission) {
                $result['children'][] = $this->buildPermissionArray($childPermission);
            }
        }

        return $result;
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
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return response()->json([
            'status' => true,
            'msg' => 'Role updated successfully'
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
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
