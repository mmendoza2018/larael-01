{{-- llamamos al template que usaremos en este caso el app principal  --}}
@extends('layouts.app')

{{-- damos valor a una seccion que creamos en el template app, tebnemos que abrir y cerrar este section --}}
@section('titulo')
    Prueba title
@endsection
{{--  no es necesario declarar todas las secciones que esta en el template, sino pones una el yield del template queda vacio --}}
@section('contenido')
    <form id="registroPost">
        @csrf
        <div class="flex w-4/6 mx-auto p-5 bg-slate-200 gap-3">
            <div class="w-3/6">
                <div class="dropzone h-auto" id="dropzone">
                    {{-- llega dropzone --}}
                </div>
            </div>
            <div class="w-3/6">
                <label>Titulo</label>
                <input type="text" name="titulo" class="input input-bordered w-full">
                <label>Descripcion</label>
                <input type="text" name="descripcion" class="input input-bordered w-full">
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>
        </div>
    </form>
@endsection
