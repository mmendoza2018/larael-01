{{-- llamamos al template que usaremos en este caso el app principal  --}}
@extends('layouts.app')

{{-- damos valor a una seccion que creamos en el template app, tebnemos que abrir y cerrar este section --}}
@section('titulo')
    Prueba title
@endsection
{{--  no es necesario declarar todas las secciones que esta en el template, sino pones una el yield del template queda vacio --}}
@section('contenido')
    <div class="flex w-3/6 mx-auto p-5 bg-slate-200">
        <div class="w-1/2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRsQp3QfMCj9fdrpDdMhuC_UQgbwA6o6dZ25_J1Lp4lg&s"
                alt="">
        </div>
        <div class="w-1/2">
            aqui las publicaciones del usuario
            <div class="font-bold">
                {{ $user->name . " " . $user->surname }}
            </div>
        </div>
    </div>
@endsection
