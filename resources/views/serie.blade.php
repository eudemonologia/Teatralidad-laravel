@extends('layouts.main')

@section('content')
    {{-- Información de la serie --}}
    <main class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}" alt="poster" class="w-full h-fit self-center sm:w-64 md:w-96 md:self-start">
            <div class="flex flex-col md:ml-12 lg:ml-24 w-full">
                <h3 class="text-xl font-semibold text-gray-400 mb-4">{{ $serie['tagline'] }}</h3>
                <div class="flex flex-wrap items-end">
                    <h2 class="text-4xl font-semibold">{{ $serie['name'] }}</h2>
                    <h4 class="text-gray-400 font-semibold text-sm mt-2 ml-auto">
                        <span class="text-orange-500">Míralo por:</span>
                        @foreach ($serie['networks'] as $network)
                        {{ $network['name'] }}
                        @if (!$loop->last)
                            /
                        @endif
                        @endforeach</h4>
                    </h4>
                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-4">
                    <span class="material-icons text-orange-500 text-xs">star</span>
                    <span class="ml-1">{{ $serie['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $serie['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($serie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),@else.@endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-200 mt-8">
                    {{ $serie['overview'] }}
                </p>

                <div class="mt-12">
                    <div class="flex flex-wrap gap-8">
                        @foreach ($serie['created_by'] as $creator)
                            <div class="flex flex-col">
                                <strong class="text-white font-semibold">{{ $creator['name'] }}</strong>
                                <p class="text-sm text-gray-400">
                                    @if ($creator['gender'] = 2)
                                    Creador
                                    @else
                                    Creadora
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($serie['videos']['results'])
                <a href="https://www.youtube.com/watch?v={{ $serie['videos']['results'][0]['key'] }}" target="_blank" class="flex items-center mt-12">
                    <button class="openModalVideoBtn flex items-center bg-orange-500 text-gray-900 rounded font-semibold w-fit px-6 py-4 mt-12 hover:bg-orange-600 transition ease-in-out duration-150">
                        <span class="material-icons mr-2 select-none">
                            play_circle_outline
                        </span>
                        <p>Ver trailer</p>
                    </button>
                </a>
                @endif
            </div>
        </div>
    </main>

    {{-- Seccion de actores --}}
    <section class="cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Actores</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($serie['credits']['cast'] as $cast)
                    @if ($cast['profile_path'])
                        <div class="actor mt-8">
                            <a href="/actor/{{ $cast['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="actor-profile" class="hover:opacity-75 transition ease-in-out duration-150">
                                <p class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</p>
                                <div class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($serie['credits']['cast']) > 10)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todos los actores</button>
            @endif
        </div>
    </section>

    {{-- Seccion de temporadas --}}
    <section class="seasons border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Temporadas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($serie['seasons'] as $season)
                    @if ($season['poster_path'])
                        <div class="season mt-8">
                            <a href="">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $season['poster_path'] }}" alt="actor-profile" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="" class="text-lg mt-2 hover:text-gray-300">{{ $season['name'] }}</a>
                                <div class="text-sm text-gray-400">
                                    {{ $season['air_date'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($serie['seasons']) > 5)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todas las temporadas</button>
            @endif
        </div>
    </section>

    {{-- Seccion de imágenes --}}
    <section class="images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Imágenes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($serie['images']['backdrops'] as $image)
                    @if ($image['file_path'])
                        <div class="image mt-8">
                            <a href="https://image.tmdb.org/t/p/original/{{ $image['file_path'] }}" target="_blank">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="imagen de la serie" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($serie['images']['backdrops']) > 9)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todas las imágenes</button>
            @endif
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/serie.js') }}"></script>    
@endsection