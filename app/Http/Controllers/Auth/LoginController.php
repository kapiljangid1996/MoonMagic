<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        // to admin dashboard
        if($user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('toast_success', 'Welcome Back');
        }

        // to user dashboard
        else if($user->isUser()) {
            return redirect()->route('front.user.dashboard')->with('toast_success', 'Welcome Back');
        }

        abort(404);
    }
    
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
