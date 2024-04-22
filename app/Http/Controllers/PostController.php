<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //validacion para toda esta clase, necesita autenticacion si o si 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (User $user) 
    {
        return view('muro', [
            //pasamos el usuario que obtiene del slug, laravel en automatico me trae dala data del user del slug
            "user" => $user
        ]);
    }

    public function registro (Request $request) 
    {
        return view('posts/registro');
    }
}
