@extends('layouts.main')

@section('content')
    <main class="container mx-auto px-4 pt-12">
        <section class="popularActors">
            <header class="flex">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Actores Populares</h2>
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
                @foreach ($popularActors as $actor)
                    <x-actor-card :actor="$actor" />
                @endforeach
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{ asset('js/actors.js') }}"></script>
@endsection