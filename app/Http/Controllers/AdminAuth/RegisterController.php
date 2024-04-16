<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admins;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function freelancerSignup(Request $request){

        $validation =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>['required','same:password']
        ]);

        if($validation->fails()){

            return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>$validation->errors()]);

            //return redirect()->back()->withInput()->withErrors($validation->errors());
        }


        try{
            DB::beginTransaction();

            $freeLancer = Admins::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            \Auth::guard('admin')->login($freeLancer);
            
            $role = Role::where('name','Free Lancer')->first();

            $freeLancer->assignRole($role->id);

            DB::commit();

            return response()->json(['status'=>true,'message'=>'Login successfully','route'=>route('free.lancer.dashboard')]);    

            // return redirect()->intended('/free-lancer/dashboard'); 
        }
         catch(\Exception $e){
            DB::rollback();
            // return response()->json(['status'=>true,'message'=>'Login successfully','route'=>'/free-lancer/dashboard']);    
            return redirect()->back()->withInput()->withErrors(['errors'=>$validation->errors()]); 
         }
    }

}
