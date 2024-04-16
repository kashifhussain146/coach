<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request) {
        $validation =   Validator::make($request->all(),[
                            'email'=>'required|string|email|exists:users,email',
                            'password'=>'required',
                        ]);

        if($validation->fails()){
            return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>$validation->errors()]);
        }

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $user = Auth()->guard('web')->user();
            if($user->status != 'Y'){
                Auth::guard('web')->logout();
                return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>['email'=>['You are currently inactive. Please contact to admin.']]]);
            }
            return response()->json(['status'=>true,'message'=>'Login successfully']);
        }else{
            return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>['password'=>['Please enter a valid password']]]);
        }

    }

}
