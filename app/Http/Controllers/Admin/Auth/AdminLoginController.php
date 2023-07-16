<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('admin-profile');
        }
        else{
            return view('admin/auth/admin/login');
        }
        
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/admin-profile');
        } else {
            // Authentication failed
            return redirect()->back()->with('message','Invalid Email or Password');
        }
    }

    public function profile(){
        if(Auth::check()){
            $user=Auth::user();
            return view('admin/auth/admin/profile',['user'=>$user]);
        }

        else{
            return redirect('admin-login');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('admin-login');
    }

    public function passwordReset($id,Request $request){

        $user=User::find($id);
        $user->password=Hash::make($request->input('password'));
        $user->save();

        return redirect()->back();
    }
}
