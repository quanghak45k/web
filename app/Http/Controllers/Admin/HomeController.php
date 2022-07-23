<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->paginate(2);
        // $projects = Project::latest()->paginate(5);

        return view('admin.admin_home', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


//        $users = User::latest()->paginate(5);
//        return view('admin.admin_home', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
