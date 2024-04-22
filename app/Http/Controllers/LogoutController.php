<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store () 
    {
        # cerrar session
        auth()->logout();

        # redireccionar a login
        return redirect()->route('login');

    }
}
