<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function profileEdit(Request $request)
    {
        $users = User::editUser($request);
        return redirect()->route('admin.profile')->with('success','User updated successfully!');
    }
}
