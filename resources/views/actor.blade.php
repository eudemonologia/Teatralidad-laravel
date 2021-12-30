@extends('layouts.main')

@section('content')
    {{-- Información de la película --}}
    <main class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500{{ $actor['profile_path'] }}" alt="Foto de {{ $actor['name'] }}" class="w-full h-fit self-center sm:w-64 md:w-96 md:self-start">
            <div class="flex flex-col md:ml-12 lg:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-4">
                    @if ($actor['deathday'] == null)
                    <span class="material-icons text-gray-400 mr-2 text-sm select-none"> cake </span>
                    <p>{{ Carbon\Carbon::parse($actor['birthday'])->age }} años</p>
                    @else
                    <span class="material-icons text-gray-400 mr-2 text-sm select-none"> sentiment_very_dissatisfied </span>
                    <p>{{ $actor['deathday'] }}</p>
                    @endif
                    <span class="mx-2">|</span>
                    <span class="material-icons text-gray-400 mr-2 text-sm select-none"> location_on </span>
                    <p>{{ $actor['place_of_birth'] }}</p>
                </div>

                <p class="text-gray-200 mt-8">{{ $actor['biography'] }}</p>
            </div>
        </div>
    </main>

    {{-- Películas de la persona --}}
    @if (count($credits['movies']['cast']) > 0)
    <section class="movies border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Películas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($credits['movies']['cast'] as $movie)
                    @if ($movie['poster_path'])
                        <div class="movie mt-8">
                            <a href="/movie/{{ $movie['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w400{{ $movie['poster_path'] }}" alt="Poster de {{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150 object-cover h-96">
                                <p class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</p>
                                <p class="text-sm text-gray-400">
                                    {{ $movie['character'] }}
                                </p>
                            </a>
                        </div>
                    @endif
                    
                @endforeach
            </div>
            @if (count($credits['movies']['cast']) > 10)
            <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">
                Ver todas las películas
            </button>
            @endif
        </div>
    </section>
    @endif

    {{-- Series de la persona --}}
    @if (count($credits['tv']['cast']) > 0)
    <section class="series border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Series</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($credits['tv']['cast'] as $tv)
                    @if ($tv['poster_path'])
                        <div class="serie mt-8">
                            <a href="/tv/{{ $tv['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w400{{ $tv['poster_path'] }}" alt="Poster de {{ $tv['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150 object-cover h-96">
                                <p class="text-lg mt-2 hover:text-gray-300">{{ $tv['name'] }}</p>
                                <p class="text-sm text-gray-400">
                                    {{ $tv['character'] }}
                                </p>
                            </a>
                        </div>
                    @endif
                    
                @endforeach
            </div>
            @if (count($credits['movies']['cast']) > 10)
            <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">
                Ver todas las series
            </button>
            @endif
        </div>
    </section>
    @endif

    {{-- Imágenes de la persona --}}
    @if (count($actor['images']['profiles']) > 0)
    <section class="images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Imágenes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($actor['images']['profiles'] as $image)
                    @if ($image['file_path'])
                        <div class="image mt-8">
                            <a href="https://image.tmdb.org/t/p/original{{ $image['file_path'] }}" target="_blank">
                                <img src="https://image.tmdb.org/t/p/w300{{ $image['file_path'] }}" alt="Imagen de {{ $actor['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150 object-cover h-96">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($actor['images']['profiles']) > 5)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todas las imágenes</button>
            @endif
        </div>
    </section>
    @endif
@endsection

@section('js')
    <script src="{{ asset('js/actor.js') }}"></script>    
@endsection