@extends('layouts.main')

@section('content')
<main class="border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{asset('images/avatars/'.$user->avatar)}}" alt="avatar" class="rounded-full mx-auto md:mx-0 mb-6 md:mb-0 object-cover w-64 h-64">
        <div class="flex flex-col items-center md:ml-12 lg:ml-24 md:items-start">

            <div class="flex items-end gap-6">
                <h2 class="text-4xl font-semibold">{{ $user->name }} {{ $user->lastname }}</h2>
                <a href="mailto:{{ $user->email}}">
                    <span class="material-icons text-gray-400 mr-2 select-none"> mail </span>
                </a>
            </div>
            <div class="flex flex-wrap items-center text-gray-400 text-sm mt-4">
                <span class="material-icons text-gray-400 mr-2 text-sm select-none"> cake </span>
                {{-- Mostrar edad a partir de la fecha de nacimiento --}}
                <p> {{ Carbon\Carbon::parse($user->fnacimiento)->age }} años</p>
                <span class="mx-2">|</span>
                <p>Registrado el {{ Carbon\Carbon::parse($user->fregistro)->format('d-m-Y') }}</p>
            </div>
        

            @if( session()->has('user'))
                @if( session()->get('user')->id == $user->id)
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <a href="/user/{{$user->id}}/edit" class="w-full">
                            <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full w-full">
                                Editar Perfil
                            </button>
                        </a>
                            <form action="/user/{{$user->id}}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full w-full" type="submit" onclick=" if (confirm('¿Estás seguro de que quieres eliminar tu cuenta?')) { return true; } else { return false; }">
                                    Eliminar Perfil
                                </button>
                            </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
</main>
@endsection