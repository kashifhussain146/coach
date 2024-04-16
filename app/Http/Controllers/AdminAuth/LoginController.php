<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm(){
        return view('admin.auth.login', ['url' => '', 'title'=>'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){

            if (Auth::guard('admin')->user()->status!='active') {
                Auth::guard('admin')->logout();
                return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'You are currently inactive. Please contact to admin.']);
            }

            return redirect()->intended('/admin/dashboard');            
        }else{
            return back()->withInput($request->only('email', 'remember'))->withErrors(['error' => 'Please enter a valid credentials']);
        }


    }


    public function freelancerLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            
            if (Auth::guard('admin')->user()->status!='active') {
                Auth::guard('admin')->logout();
                return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>['email'=>['You are currently inactive. Please contact to admin.']]]);
            }


            if(!in_array('Free Lancer',Auth::guard('admin')->user()->getRoleNames()->toArray())){
                Auth::guard('admin')->logout();
                return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>['email'=>['Please enter a valid credentials for this roles']]]);
            }

            return response()->json(['status'=>true,'message'=>'Login successfully','route'=>route('free.lancer.dashboard')]);      
        }else{
            
            return response()->json(['status'=>false,'message'=>'Validation errors','errors'=>['password'=>['Please enter a valid password']]]);
        }


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
    
        // Redirect to the desired location after logout
        return redirect('/admin/login');
    }
    
    
    

}
