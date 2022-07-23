<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        if (Auth::guard('admin')->check()) {
            return redirect(RouteServiceProvider::admin);
        }
        if ($request->getMethod() == 'GET'){
            return view('admin.auth.admin_login');
        }
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ],
            [
                'email.required' => '* Email is required',
                'password.required' => '* Password is required',

            ]);

       $kiem_tra = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($kiem_tra)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }

    }





}
