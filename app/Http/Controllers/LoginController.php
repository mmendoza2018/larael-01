<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function validateLogin(Request $request)
    {
        #validacion de formularios
        $this->validate($request, [
            'email' => ["required", "email"],
            'password' => ["required"],
        ]);

        //valida con  la tabla users
        //el segundo parametro es para manteneer la session siempre abierta, esta genera un cokie y va comparanbdo con la DB 
        if (!auth()->attempt($request->only('email', 'password'), true)) {
            //back para retornar a la pagina de donde vino y with para devolver un mensaje, este mensaje se captura en el front con @if (session('success'))
            return back()->with('message', "Las credenciales son incorrectas");
        }

        return redirect()->route('muroUser', auth()->user()->username);
    }
}   
