<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request){

        $users = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("id", "desc")
            ->paginate(3);
        // $projects = Project::latest()->paginate(5);

        return view('admin.admin_home', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


//        $users = User::latest()->paginate(5);
//        return view('admin.admin_home', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    public function profile(){

        $admin = Admin::find(1);

        return view('admin.admin_profile', compact('admin'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function update(AdminUpdateRequest $request){

        $admin=Admin::find(1);
        if ($request->get('password') == '') {
            $admin->update($request->except('password'));
        } else {
            $adminData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $admin->update($adminData);
        }
        return redirect()->route('dashboard')
            ->with('success', 'Admin updated successfully.');
    }
}
