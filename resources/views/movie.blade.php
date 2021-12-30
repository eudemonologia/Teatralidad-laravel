@extends('layouts.main')

@section('content')
    {{-- Información de la película --}}
    <main class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="poster" class="w-full h-fit self-center sm:w-64 md:w-96 md:self-start">
            <div class="flex flex-col md:ml-12 lg:ml-24">
                <h3 class="text-xl font-semibold text-gray-400 mb-4">{{ $movie['tagline'] }}</h3>
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-4">
                    <span class="material-icons text-orange-500 text-xs select-none">star</span>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),@else.@endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-200 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <div class="flex flex-wrap gap-8">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($crew['job'] == 'Director')
                        <div class="flex flex-col">
                            <strong class="text-white font-semibold">{{ $crew['name'] }}</strong>
                            <p class="text-sm text-gray-400">Director</p>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>

                @if ($movie['videos']['results'])
                    <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" class="flex items-center mt-12">
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
    
    {{-- Actores de la película --}}
    <section class="cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Actores</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($cast['profile_path'])
                        <div class="actor mt-8">
                            <a href="">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="actor-profile" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todos los actores</button>
        </div>
    </section>
    
    @if (count($images['backdrops']) > 0)

    {{-- Imágenes de la película --}}
    <section class="images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Imágenes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($images['backdrops'] as $image)
                    @if ($image['file_path'])
                        <div class="image mt-8">
                            <a href="https://image.tmdb.org/t/p/original/{{ $image['file_path'] }}" data-fancybox="images" data-caption="{{ $image['file_path'] }}">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="actor-profile" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todas las imágenes</button>
        </div>
    </section>

    {{-- Model para ver el trailer --}}
    <x-trailer-modal :movie="$movie" />

    @endif

@endsection

@section('js')
    <script src="{{ asset('js/movie.js') }}"></script>    
@endsection