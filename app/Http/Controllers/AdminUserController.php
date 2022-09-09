<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function AdminLogout() {
        Auth::logout();
        return redirect()->route('login');

    } // end method

}
