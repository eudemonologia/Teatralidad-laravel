<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teatralidad</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col items-center px-4 py-6  md:flex-row md:items-end ">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#fff"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M2,16.5C2,19.54,4.46,22,7.5,22s5.5-2.46,5.5-5.5V10H2V16.5z M7.5,18.5C6.12,18.5,5,17.83,5,17h5 C10,17.83,8.88,18.5,7.5,18.5z M10,13c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C9,13.45,9.45,13,10,13z M5,13 c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C4,13.45,4.45,13,5,13z"/><path d="M11,3v6h3v2.5c0-0.83,1.12-1.5,2.5-1.5c1.38,0,2.5,0.67,2.5,1.5h-5V14v0.39c0.75,0.38,1.6,0.61,2.5,0.61 c3.04,0,5.5-2.46,5.5-5.5V3H11z M14,8.08c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C15,7.64,14.55,8.08,14,8.08z M19,8.08 c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C20,7.64,19.55,8.08,19,8.08z"/></g></g></svg>
                <h1 class="font-mono text-2xl font-semibold"><span class="text-4xl">T</span>eatralidad</h1>
            </a>
            {{-- Menú --}}
            <ul class="flex flex-col my-4 gap-4 px-4 md:flex-row md:ml-16 md:my-0">
                <li>
                    <a href="{{ route('home')}}" class="hover:text-gray-300">Películas</a>
                </li>
                <li>
                    <a href="" class="hover:text-gray-300">Series</a>
                </li>
                <li>
                    <a href="" class="hover:text-gray-300">Actores</a>
                </li>
            </ul>
            
            
            <div class="flex items-center gap-4 flex-col md:flex-row md:items-end md:ml-auto">

                {{-- Buscador --}}
                <div class="searchBox relative">
                    <input type="text" id="buscador" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-2 text-sm box-border text-white" placeholder="Buscar...">
                    <span class="material-icons absolute top-2 left-2 text-gray-500 select-none">search</span>

                    <div class="resultados absolute z-10 bg-gray-800 text-sm rounded w-64 mt-4 overflow-hidden">
                        <ul class="resultados">
                        </ul>
                    </div>
                </div>
                    
                {{-- Usuario --}}
                <a href="" class="hidden">
                    <img src="https://randomuser.me/api/portraits/men/24.jpg" alt="avatar" class="rounded-full w-10 h-10">
                </a>

                {{-- Botón de login --}}
                <button class="openModalLoginBtn flex items-center px-4 py-2 text-white bg-orange-500 rounded-full">
                    <span class="material-icons">
                        login
                        </span>
                </button>
            </div>
        </div>
    </nav>
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
@yield('js')
</html>