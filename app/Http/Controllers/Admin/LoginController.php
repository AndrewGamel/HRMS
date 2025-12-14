<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginView()
    {
        /*
        $admin['name']     = "admin";
        $admin['username'] = "admin";
        $admin['email']    = "test@gmail.com";
        $admin['password'] = bcrypt("admin");
        $admin['add_by']   = 1;
        $admin['active']   = 1;
        $admin['com_code'] = 1;
        $admin['date'] = date("y-m-d");
        $admin['updated_by'] = 1;
Admin::create($admin);
*/


        return view('admins.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
           
            return view('layouts.admin') ;
        } else {
            return redirect()->route('admin.showLogin')->with(['error' => 'عفوا بيانات التسجيل غبر صحيحة']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showLogin');
    }
}