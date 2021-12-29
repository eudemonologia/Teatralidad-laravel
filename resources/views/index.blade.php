@extends('layouts.main')

@section('content')
    <main class="container mx-auto px-4 pt-12">
        {{-- Películas populares --}}
        <section class="popularMovies">
            <header class="flex">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Películas Populares</h2>
                <div class="ml-auto">
                    <span class="backBtn material-icons cursor-pointer select-none transition duration-300 ease-in-out hover:text-gray-600 opacity-0">
                        arrow_back_ios
                    </span>
                    <span class="forwardBtn material-icons cursor-pointer select-none transition duration-300 ease-in-out hover:text-gray-600 opacity-100">
                        arrow_forward_ios
                    </span>
                </div>
            </header>
            <div class="scrollMovies flex gap-12 mt-8 flex-nowrap overflow-x-scroll scroll-none scroll-smooth">
            @foreach($popularMovies as $movie)
                {{-- Tarjeta de película --}}
                <x-movie-card :movie="$movie" />
            @endforeach
            </div>
        </section>

        {{-- Películas actualres --}}
        <section class="nowPlaying mt-12">
            <header class="flex">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Cartelera Actual</h2>
                <div class="ml-auto">
                    <span class="backBtn material-icons cursor-pointer select-none transition duration-300 ease-in-out hover:text-gray-600 opacity-0">
                        arrow_back_ios
                    </span>
                    <span class="forwardBtn material-icons cursor-pointer select-none transition duration-300 ease-in-out hover:text-gray-600 opacity-100">
                        arrow_forward_ios
                    </span>
                </div>
            </header>
            <div class="scrollMovies flex gap-12 mt-8 flex-nowrap overflow-x-scroll scroll-none scroll-smooth">
            @foreach($nowPlayingMovies as $movie)
                {{-- Tarjeta de película --}}
                <x-movie-card :movie="$movie" />
            @endforeach
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection