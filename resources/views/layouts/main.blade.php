<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Teatralidad</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800 sticky top-0 z-30 bg-gray-900 transition-all ease-in-out duration-300">
        <div class="container mx-auto flex flex-col items-center px-4 py-6  lg:flex-row lg:items-end ">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#fff"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M2,16.5C2,19.54,4.46,22,7.5,22s5.5-2.46,5.5-5.5V10H2V16.5z M7.5,18.5C6.12,18.5,5,17.83,5,17h5 C10,17.83,8.88,18.5,7.5,18.5z M10,13c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C9,13.45,9.45,13,10,13z M5,13 c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C4,13.45,4.45,13,5,13z"/><path d="M11,3v6h3v2.5c0-0.83,1.12-1.5,2.5-1.5c1.38,0,2.5,0.67,2.5,1.5h-5V14v0.39c0.75,0.38,1.6,0.61,2.5,0.61 c3.04,0,5.5-2.46,5.5-5.5V3H11z M14,8.08c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C15,7.64,14.55,8.08,14,8.08z M19,8.08 c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C20,7.64,19.55,8.08,19,8.08z"/></g></g></svg>
                <h1 class="font-mono text-2xl font-semibold"><span class="text-4xl">T</span>eatralidad</h1>
            </a>
            {{-- Menú --}}
            <ul class="flex flex-col my-4 gap-4 px-4 md:flex-row md:my-4 lg:ml-16 lg:my-0">
                <li>
                    <a href="{{ route('home')}}" class="hover:text-gray-300">Películas</a>
                </li>
                <li>
                    <a href="{{ route('series')}}" class="hover:text-gray-300">Series</a>
                </li>
                <li>
                    <a href="{{ route('actors') }}" class="hover:text-gray-300">Actores</a>
                </li>
            </ul>
            
            
            <div class="flex items-center gap-4 mt-4 flex-col md:flex-row lg:ml-auto lg:mt-0">

                {{-- Buscador --}}
                <div class="searchBox relative self-center">
                    <input type="text" id="buscador" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-2 text-sm box-border text-white" placeholder="Buscar...">
                    <span class="material-icons absolute top-2 left-2 text-gray-500 select-none">search</span>

                    <div class="resultados absolute z-10 bg-gray-800 text-sm rounded w-64 mt-4 overflow-hidden">
                        <ul class="resultados">
                        </ul>
                    </div>
                </div>
                    
                {{-- Verificar si hay un usuario en sesion --}}
                @if (session()->has('user'))
                    {{-- Usuario --}}
                    <div class="userBox relative flex flex-col items-center">
                        <div class="userMenuBtn flex items-center gap-4 cursor-pointer">
                            @if (session('user')->avatar)
                                <div class="hover:text-gray-300 border-orange-500 border-2 rounded-full">
                                    <img src="/images/avatars/{{ session('user')->avatar }}" alt="avatar" class="rounded-full w-10 h-10">
                                </div>
                            @else
                            <div class="hover:text-gray-300 border-orange-500 border-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="#fff"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                            </div>
                            @endif
                        </div>
                        <ul class="userMenu absolute top-10 md:right-0 bg-gray-800 text-sm rounded w-32 mt-4 overflow-hidden hidden">
                            <li class="list-none border-b border-gray-700">
                                <a href="/user/{{ session('user')->id }}" class="block hover:bg-gray-700 px-3 py-3">Perfil</a>
                            </li>
                            <li class="list-none border-b border-gray-700">
                                <a href="/logout" class="block hover:bg-gray-700 px-3 py-3">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                @else
                
                    {{-- Botón de login --}}
                    <button class="openModalLoginBtn flex items-center px-4 py-2 text-white bg-orange-500 rounded-full">
                        <span class="material-icons">
                            login
                            </span>
                    </button>
                @endif
            </div>
        </div>
    </nav>
    {{-- Errores --}}
    @if ($errors->any())
            <ul class="container m-auto bg-red-500 text-white p-3 rounded-lg mt-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach 
            </ul>
    @endif
    {{-- Mensajes --}}
    @if (session('message'))
        <div class="container m-auto bg-green-500 text-white p-3 rounded-lg mt-4">
            {{ session('message') }}
        </div>
    @endif
    @yield('content')
    {{-- Modal para iniciar sesión --}}
    <x-login-modal />

    {{-- Footer --}}
    <footer class="mt-8">
        <div class="container mx-auto flex flex-col items-center px-4 py-6">
            <p class="text-gray-500 text-sm">
                &copy; Teatralidad {{ date('Y') }} - Todos los derechos reservados
            </p>
            <p>
                <a href="https://www.linkedin.com/in/cristiangongora/" target="_blank" class="text-gray-500 text-sm hover:text-orange-500">
                    Cristian Diego Góngora Pabón
                </a>
            </p>
        </div>
    </footer>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@if (session()->has('user'))
    <script src="{{ asset('js/userNav.js') }}"></script>
@else
    <script src="{{ asset('js/login.js') }}"></script>
@endif

@yield('js')
</html>