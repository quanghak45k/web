<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if (Auth::guard('admin')->check()) {
            return redirect(RouteServiceProvider::admin);
        }if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        if ($request->getMethod() == 'GET'){
            return view('admin.admin_login');
        }
       $kiem_tra = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($kiem_tra)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withInput();
        }

    }





}
