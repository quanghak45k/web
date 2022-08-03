<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.login', ['title' => 'UserLogin']);
    }

    public function register(){
        return view('user.register', ['title' => 'User register']);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'terms' => 'required',
        ]);




        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = '1';

        $user->save();
        return back()->with('success', 'Bạn dã dang ky thanh cong');

    }
}
