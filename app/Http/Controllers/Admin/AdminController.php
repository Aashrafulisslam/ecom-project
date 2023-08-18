<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $data = $request->validate([
                'email' => 'required|max:255',
                'password' => 'required',
            ]);
            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'status'=>1])){
                return redirect('/admin/dashboard');
            }else{
                return back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin.login.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updateAdminPassword(){
        $adminInfo = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray() ;

        return view('admin.settings.update_admin_password', compact('adminInfo'));
    }
}
