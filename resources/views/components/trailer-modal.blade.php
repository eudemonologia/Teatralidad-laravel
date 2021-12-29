@extends('layouts.modal')

@section('card')
<div class="relative bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-20 overflow-hidden bg-center bg-cover bg-gray-900">
    <button class="closeModalLoginBtn absolute top-2 right-2">
        <span class="material-icons text-gray-600">
        close
        </span>
    </button>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/y4Ki5_Q2-gs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endsection