<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function viewRegister()
   {
      return view("registro");
   }

   public function addRegister(Request $request)
   {
      # obtener todo el objeto request
      # dd($request);

      #obtener un nbame en especifico
      #dd($request->get('name'));
      #$request->name;

      #modificar un campo que lleva del front (en este caso capturamos al username y lo convertimos a slug)
      $request->request->add([
         'username' => Str::slug($request->username),
      ]);

      #validacion de formularios
      $this->validate($request, [
         'name' => ["required", "min:2"],
         'surname' => ["required", "max:20"],
         'username' => ["required", "min:5", "unique:users"],
         'email' => ["required", "min:5", "unique:users"],
         'password' => ["required", "min:5", "confirmed"],
      ]);

      //dd("registrando....");
      #importamos la clase USER y hacemos la inserción 
      $user = User::create([
         'name' => $request->name,
         'surname' => $request->surname,
         //tranformar un string en un slug valido (luis-miguel-mendoza)
         'username' => $request->username,
         'email' => $request->email,
         //hashear las contraseñas
         'password' => Hash::make($request->password),
      ]);

      //autenticación metodo numero 01
      //auth()->attempt(['email' => $request->email, 'password' => $request->password]);

      //autenticación metodo numero 02
      //verifica con la tabla user si estos campos que se espeficica son correctos ( con la tabla users)
      // esto se puede cambiar en el archivo *********auth**********
      auth()->attempt($request->only('email', 'password'));
      
      #redirecciona a cierto lado de la aplicacion (en este caso al muro de la petrsona registrada)
      return redirect()->route('muroUser', auth()->user()->username);
   }
}
