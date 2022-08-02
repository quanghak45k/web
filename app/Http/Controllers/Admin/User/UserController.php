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

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ],
            [
                'name.required' => '* Username is required',
                'email.required' => '* Email is required',
                'email.unique' => '* Email is unique',
                'password.required' => '* Password is required',
                'password.confirmed' => '* please confirm password',
                'password.min' => '* Password is require minimum 6 characters',

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

        $user = User::find($id);
        return view('admin.admin_show_user', compact('user'));
    }

    public function edit($id)
    {

        $user = User::find($id);

        return view('admin.admin_edit_user', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:8',
        ]);
        $user=User::find($id);
        if ($request->get('password') == '') {
            $user->update($request->except('password'));
        } else {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user->update($userData);
        }
        return redirect()->route('dashboard')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
            $user->delete();

        return redirect()->route('dashboard')
            ->with('success', 'User has been deleted');
    }
}
