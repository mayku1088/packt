<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login_form()
    {
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/login');
    }
}
