{{-- llamamos al template que usaremos en este caso el app principal  --}}
@extends('layouts.app')

{{-- damos valor a una seccion que creamos en el template app, tebnemos que abrir y cerrar este section --}}
@section('titulo')
    Prueba title
@endsection
{{--  no es necesario declarar todas las secciones que esta en el template, sino pones una el yield del template queda vacio --}}
@section('contenido')
    <div class="w-1/3 mx-auto bg-white p-5">
        <form action="{{ route('registro') }}" method="POST">
            {{-- (crea un token) usado para que en backend haga la validadcion con un midelware --}}
            @csrf
            <label>Nombres</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="input input-bordered w-full @error('name') input-error @else input-success @enderror">
            @error('name')
                <div class="text-xs text-red-600">
                    {{-- forma para reemplazar el campo que llega en automatico --}}
                    {{ Str::replaceFirst('name', 'nombre', $message) }}
                </div>
            @enderror

            <label>Apellidos</label>
            <input type="text" name="surname" value="{{ old('surname') }}"
                class="input input-bordered w-full @error('surname') input-error @else input-success @enderror">
            @error('surname')
                <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror

            <label>Usuario</label>
            <input type="text" name="username" value="{{ old('username') }}"
                class="input input-bordered w-full @error('username') input-error @else input-success @enderror">
            @error('username')
                <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <label>Correo electrónico</label>
            <input type="text" name="email" value="{{ old('email') }}"
                class="input input-bordered w-full  @error('email') input-error @else input-success @enderror">
            @error('email')
                <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <label>Contraseña</label>
            <input type="text" name="password"
                class="input input-bordered w-full @error('password') input-error @else input-success @enderror">
            @error('password')
                <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <label>Repetir Contraseña</label>
            <input type="text" name="password_confirmation" class="input input-bordered w-full">
            <button type="submit" class="btn btn-accent mt-3">Accent</button>
        </form>
    </div>
@endsection
