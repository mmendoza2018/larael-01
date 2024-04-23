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

    public function index(User $user)
    {
        return view('muro', [
            //pasamos el usuario que obtiene del slug, laravel en automatico me trae dala data del user del slug
            "user" => $user
        ]);
    }

    public function registro(Request $request)
    {
        return view('posts/registro');
    }

    public function store(Request $request)
    {
        /*    echo "<pre>";
        var_dump($request->all());
        echo "<pre>"; */

        // Verifica si hay archivos enviados con el nombre 'archivo'
        if ($request->hasFile('archivos')) {
            // Obtiene los archivos del Request
            $archivos = $request->file('archivos');

            // Itera sobre cada archivo
            foreach ($archivos as $archivo) {
                // Guarda el archivo en el directorio de almacenamiento de Laravel
                $path = $archivo->store('uploads');

                // Puedes realizar más acciones aquí, como guardar la ruta en la base de datos, etc.
            }

            return response()->json(['message' => 'Archivos cargados correctamente.'], 200);
        }

        return response()->json(['message' => 'No se recibieron archivos.'], 400);
    }
}
