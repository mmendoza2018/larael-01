<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        #validacion de formularios
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|min:5',
            "archivos" => 'required', 'array'
        ]);

        if ($validator->fails()) {
            // Si la validación falla, devuelve una respuesta JSON con los mensajes de error
            return response()->json(['errors' => $validator->errors()], 422);
        }


        /* //puedes tambien tener campos personalizados, sin que vengan del request
        // Definir reglas de validación personalizadas
        $reglasPersonalizadas = [
            'campo_personalizado' => 'required|otras_reglas_personalizadas',
        ];
        $datosPersonalizados = "este seria un dato personalizado";

        // Crear un nuevo objeto Validator para validar los datos personalizados
        $validatorPersonalizado = Validator::make($datosPersonalizados, $reglasPersonalizadas);

        // Verificar si la validación personalizada falla
        if ($validatorPersonalizado->fails()) {
            // Devolver los errores de validación personalizados si la validación falla
            return response()->json(['errors_personalizados' => $validatorPersonalizado->errors()], 422);
        } */

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

        return response()->json(['errors' => $validator->errors()], 422);
    }
}
