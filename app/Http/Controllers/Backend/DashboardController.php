<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Auth;
use Hash;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         return view('admin.dashboard.dashboard');
    }

    public function profile(Request $request)
    {
        $user = Auth::guard('admin')->user();
       
        return view('admin.profile.profileadmin', compact('user'));
    }

        public function updateprofile(Request $request)
    {
        $user = Auth::guard('admin')->user();

        if (isset($request->tab) && $request->tab == 2) {
            $request->validate([
                'currentpassword' => 'required',
                'newpassword' => 'required',
                'newpassword_confirmation' => 'required',
            ], [
                'currentpassword.required' => 'The Old Password field is required.',
                'newpassword.required' => 'The New Password field is required.',
                'newpassword_confirmation.required' => 'The Confirm Password field is required.'
            ]);

            if (!(Hash::check($request->get('currentpassword'), $user->password))) {
                // The passwords matches
                return redirect()->route('admin.profile', ['tab' => 2])->with("error", "Your current password does not matches with the password you provided. Please try again.");
            }

            if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0) {
                //Current password and new password are same
                return redirect()->route('admin.profile', ['tab' => 2])->with("error", "New Password cannot be same as your current password. Please choose a different password.");
            }
            if (strcmp($request->get('newpassword_confirmation'), $request->get('newpassword')) == 0) {
                //Current password and new password are same
                $user->password = bcrypt($request->get('newpassword'));
                $user->save();

                return redirect()->route('admin.profile', ['tab' => 2])->with("success", "Password changed successfully !");
            } else {
                return redirect()->route('admin.profile', ['tab' => 2])->with("error", "New Password must be same as confirm new password.");
            }
        } else {
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'nullable|email',
                'mobile' => 'nullable|numeric|min:2',
                'image' => 'mimes:jpeg,jpg,png',
            ]);
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            if($request->email!=''){
                $user->email = $request->email;
            }
            if($request->mobile_no!=''){
                $user->mobile_no   = $request->mobile_no;
            }            
            if ($request->has('image')) {
                #### profile image  upload script ####
                $imageName = 'author-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images'), $imageName);
                #### profile image upload script ####
                $user->profile_image = $imageName;
            }
            $user->save();
            return redirect()->route('admin.profile')->with('success', 'Your profile updated successfully!');
        }
    }

}
