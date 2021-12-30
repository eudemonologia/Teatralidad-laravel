@extends('layouts.modal')

@section('card')
    <div class="login relative bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-20 overflow-hidden bg-center bg-cover bg-gray-900">
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="80px" viewBox="0 0 24 24" width="80px" fill="#fff"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M2,16.5C2,19.54,4.46,22,7.5,22s5.5-2.46,5.5-5.5V10H2V16.5z M7.5,18.5C6.12,18.5,5,17.83,5,17h5 C10,17.83,8.88,18.5,7.5,18.5z M10,13c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C9,13.45,9.45,13,10,13z M5,13 c0.55,0,1,0.45,1,1c0,0.55-0.45,1-1,1s-1-0.45-1-1C4,13.45,4.45,13,5,13z"/><path d="M11,3v6h3v2.5c0-0.83,1.12-1.5,2.5-1.5c1.38,0,2.5,0.67,2.5,1.5h-5V14v0.39c0.75,0.38,1.6,0.61,2.5,0.61 c3.04,0,5.5-2.46,5.5-5.5V3H11z M14,8.08c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C15,7.64,14.55,8.08,14,8.08z M19,8.08 c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C20,7.64,19.55,8.08,19,8.08z"/></g></g></svg>
            <h1 class="font-mono text-2xl font-semibold"><span class="text-4xl">T</span>eatralidad</h1>
            <p class="text-gray-500 mt-2">
                Comunidad argentina de cinéfilos y adictos a las series.
            </p>
        </div>
        <div class="w-full md:w-1/2 flex flex-col items-center bg-white py-5 md:py-8 px-4">
            <button class="closeModalLoginBtn absolute top-2 right-2">
                <span class="material-icons text-gray-600">
                close
                </span>
            </button>
            <h3 class="mb-12 font-bold text-3xl flex items-center text-gray-900">
            Iniciar Sesión
            </h3>
            <form action="/login" class="px-3 flex flex-col justify-center items-center w-full gap-3" method="POST">
                @csrf
                <input 
                type="email" name="email" id="loginEmail" placeholder="email..."
                class="mb-2 px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-black placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-orange-500"
                >
                <input 
                type="password" name="password" id="loginPassword" placeholder="contraseña..."
                class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-black placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-orange-500"
                >
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline mt-4 mb-2" type="submit">
                    Iniciar Sesión
                </button>
            </form>
            <p class="text-gray-700 text-sm mt-2">
            ¿No tienes una cuenta?
                <a href="/register" class="text-orange-500 hover:text-orange-600 mt-3 focus:outline-none font-bold underline">
                Regístrate
                </a>
            </p>
        </div>
    </div>
@endsection