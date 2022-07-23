<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(5);
        return view('admin.admin_home', compact('users'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $newUser = User::create($userData);



        return redirect()->route('dashboard')
            ->with('success', 'User created successfully.');
    }
    public function show($id)
    {


        return view('admin.admin_show_user', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.admin_edit_user', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

            $user =User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->update();

        return redirect()->route('dashboard')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
            $user->delete();

        return redirect()->route('dashboard')
            ->with('success', 'User has been deleted');
    }
}
