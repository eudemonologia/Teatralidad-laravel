<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    public function index()
    {
        $popularSeries = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular?language=es-ES')
            ->json()['results'];

        $nowPlayingSeries = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/on_the_air?language=es-ES')
            ->json()['results'];

        return view('series', [
            'popularSeries' => $popularSeries,
            'nowPlayingSeries' => $nowPlayingSeries
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $serie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '?language=es-ES')
            ->json();

        $serie['images'] = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/images')
            ->json();

        $serie['videos'] = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/videos?language=es-ES')
            ->json();

        dump($serie);

        return view('serie', [
            'serie' => $serie
        ]);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
