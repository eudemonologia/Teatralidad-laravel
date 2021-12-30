@extends('layouts.main')

@section('content')
    <main class="container mx-auto px-4 pt-12">
        {{-- Series populares --}}
        <section class="popularSeries">
            <header class="flex">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Series Populares</h2>
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
            @foreach($popularSeries as $serie)
                {{-- Tarjeta de película --}}
                <x-serie-card :serie="$serie" />
            @endforeach
            </div>
        </section>

        {{-- Series actuales --}}
        <section class="nowPlaying mt-12">
            <header class="flex">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Emitiéndose Actualmente</h2>
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
            @foreach($nowPlayingSeries as $serie)
                {{-- Tarjeta de película --}}
                <x-serie-card :serie="$serie" />
            @endforeach
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{ asset('js/series.js') }}"></script>
@endsection