@extends('layouts.main')

@section('content')
    {{-- Información de la película --}}
    <main class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="poster" class="w-full h-fit self-center sm:w-64 md:w-96 md:self-start">
            <div class="flex flex-col md:ml-12 lg:ml-24">
                <h3 class="text-xl font-semibold text-gray-400 mb-4">{{ $movie['tagline'] }}</h3>
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>

                @if (session('user'))
                    <div class="flex mt-4">
                        <button class="likeBtn bg-orange-500  text-gray-900 flex gap-1 px-1 rounded-sm text-sm" data-id="{{ $movie['id'] }}" data-user="{{ session('user')->id }}">
                            <span class="material-icons text-sm">
                                thumb_up_off_alt
                            </span>
                            <p name="counter" class="counter font-bold">{{$movie['likes'] }}</p>
                        </button>
                    </div>
                @else
                    <div class="flex items-center gap-4 mt-4">
                            <span class="material-icons text-sm select-none">
                                thumb_up
                            </span>
                            <p name="counter" class="counter font-bold">{{$movie['likes'] }}</p>
                    </div>
                @endif

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

                
                <div class="flex gap-12 mt-12">
                    @if ($movie['videos']['results'])
                        {{-- <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" class="flex items-center w-fit "> --}}
                            <button class="openModalVideoBtn flex items-center bg-orange-500 text-gray-900 rounded font-semibold w-fit px-6 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <span class="material-icons mr-2 select-none">
                                    play_circle_outline
                                </span>
                                <p>Ver trailer</p>
                            </button>
                        {{-- </a> --}}
                    @endif
                </div>
                
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
                            <a href="/actor/{{ $cast['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="actor-profile" class="hover:opacity-75 transition ease-in-out duration-150">
                                <p class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</p>
                                <p class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($movie['credits']['cast']) > 10)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todos los actores</button>
            @endif
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
                            <a href="https://image.tmdb.org/t/p/original/{{ $image['file_path'] }}" target="_blank">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="imagen de la película" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @if (count($images['backdrops']) > 9)
                <button class="seeAllBtn block uppercase mt-8 text-orange-500 hover:text-orange-600 m-auto">Ver todas las imágenes</button>
            @endif
        </div>
    </section>

    {{-- Model para ver el trailer --}}
    <x-trailer-modal :movie="$movie" />

    @endif

@endsection

@section('js')
    <script src="{{ asset('js/movie.js') }}"></script>
    @if (session('user'))
        <script src="{{ asset('js/like.js') }}"></script>
    @endif
@endsection