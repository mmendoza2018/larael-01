{{-- llamamos al template que usaremos en este caso el app principal  --}}
@extends('layouts.app')

{{-- damos valor a una seccion que creamos en el template app, tebnemos que abrir y cerrar este section --}}
@section('titulo')
    Prueba title
@endsection
{{--  no es necesario declarar todas las secciones que esta en el template, sino pones una el yield del template queda vacio --}}
@section('contenido')
    <div class="flex w-4/6 mx-auto p-5 bg-slate-200">
        <div class="w-3/6 bg-red-500">
         <div>
            {{-- llega dropzone --}}
            <form action="./target" class="dropzone h-10" id="dropzone">
            </form>
         </div>
        </div>
        <div class="w-3/6">
            aqui el formulario del post
        </div>
    </div>
@endsection
