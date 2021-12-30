@extends('layouts.main')

@section('content')
    <main class="container mx-auto px-4 pt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="m-auto md:col-span-1">
            <h2 class="text-3xl font-semibold">¡Bienvenido!</h2>
            <form action="/user" method="POST" class="w-full max-w-lg mt-4" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-2 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerName">
                            Nombre *
                        </label>
                        <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerName" type="text" placeholder="Nombre" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerLastname">
                            Apellido *
                        </label>
                        <input name="lastname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerLastname" type="text" placeholder="Apellido" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerPassword">
                            Contraseña *
                        </label>
                        <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerPassword" type="password" placeholder="******************" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerRepassword">
                            Confirmar contraseña *
                        </label>
                        <input name="repassword" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerRepassword" type="password" placeholder="******************" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerEmail">
                            Correo electrónico *
                        </label>
                        <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerEmail" type="email" placeholder="Correo Electrónico" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerNacimiento">
                            Fecha de nacimiento
                        </label>
                        <input name="fnacimiento" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerNacimiento" type="date" placeholder="">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registerAvatar">
                            Avatar
                        </label>
                        <input name="avatar" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registerAvatar" type="file">
                    </div>
                </div>
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline mt-4" type="submit">
                    Registrarte
                </button>
            </form>
                <p class="text-gray-500 text-xs mt-3">
                    Los campos marcados con * son obligatorios.
                </p>
        </div>
        <div class="relative h-full flex justify-center  m-auto md:col-span-1">
            <img src="https://th.bing.com/th/id/R.188d0e36b55141c650c8c5f6da854c27?rik=qY9F0k62wrJ46g&riu=http%3a%2f%2fwww.discoveryunderground.es%2fwp-content%2fuploads%2f2017%2f06%2fcines.jpg&ehk=09ZDauz4c9s5B2aqRFd51lfjMtjh5VLOGdxuFEvwxvA%3d&risl=&pid=ImgRaw&r=0" alt="imagen del cine" class="h-full object-cover opacity-10 rounded-lg hidden md:block">
            <h2 class="text-4xl bottom-8 font-semibold max-w-xl absolute">
                Unete a la mejor comunidad de cinefilos de la Argentina y comparte tus películas favoritas.
            </h2>
        </div>
    </main>
@endsection