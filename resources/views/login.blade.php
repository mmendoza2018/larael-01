{{-- llamamos al template que usaremos en este caso el app principal  --}}
@extends('layouts.app')

{{-- damos valor a una seccion que creamos en el template app, tebnemos que abrir y cerrar este section --}}
@section('titulo')
    Prueba title
@endsection
{{--  no es necesario declarar todas las secciones que esta en el template, sino pones una el yield del template queda vacio --}}
@section('contenido')
    <div class="w-1/3 mx-auto bg-white p-5">
        <form action="{{ route('login') }}" method="POST">
            {{-- (crea un token) usado para que en backend haga la validadcion con un midelware --}}
            @csrf
            <label>Correo electrónico</label>
            <input type="text" name="email" value="{{ old('email') }}"
                class="input input-bordered w-full  @error('email') input-error @else input-success @enderror">
            @error('email')
                <div class="text-xs text-red-600">{{ Str::replaceFirst('email', 'Correo electronico', $message) }}</div>
            @enderror
            <label>Contraseña</label>
            <input type="text" name="password"
                class="input input-bordered w-full @error('password') input-error @else input-success @enderror">
            @error('password')
                <div class="text-xs text-red-600">{{ Str::replaceFirst('password', 'Contraseña', $message) }}</div>
            @enderror
            <button type="submit" class="btn btn-accent mt-3">Ingresar</button>
            @if (session('message'))
            <div class="text-xs text-red-600">{{ session('message') }}</div>
            @endif
        </form>
    </div>
@endsection
