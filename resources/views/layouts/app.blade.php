<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    {{-- llamamos al contenido que se le debe pasar al invocar este template  --}}
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <header class="w-full flex justify-between items-center bg-white shadow-xl px-10">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsTSUyiVzgcEoi8IaiX4NOY51f-uy7I3rWhw&s"
            class="w-20" alt="">

        {{-- validar si un usuario esta autenticado o no --}}
        @if (auth()->user())
            <form method="POST" action="{{ route('logout') }}">
                {{-- directiva para evitar ataques --}}
                @csrf
                <button type="submit" class="btn btn-error">Cerrar sesion</button>
            </form>
        @else
            <a class="btn btn-primary" href="{{ route('registro') }}">Registrarse</a>
        @endif

        {{-- cerrar sesion --}}

    </header>

    <div class="container mx-auto mt-3">
        {{-- llamamos al contenido que se le debe pasar al invocar este template  --}}
        @yield('contenido')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
