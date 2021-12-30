<div class="modalVideo fixed top-0 h-screen w-full justify-center items-center bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-60 border border-gray-200 hidden z-30">
    <div class="relative bg-image w-full md:w-fit mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-20 overflow-hidden bg-center bg-cover p-10 bg-gray-900">
        <button class="closeModalLoginBtn absolute top-2 right-2">
            <span class="material-icons text-gray-600">
            close
            </span>
        </button>
        @if ( $movie['videos']['results'])
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" allowfullscreen allow="autoplay"></iframe>
        @endif
    </div>
</div>