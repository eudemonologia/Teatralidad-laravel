<a href="./serie/{{$serie['id']}}" class="hover:text-gray-300 w-60">
    <div class="w-64 h-96 relative">
        <img src="https://image.tmdb.org/t/p/w300{{$serie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150 w-full h-full object-cover">
    </div>
    <h3 class="text-lg mt-2">{{$serie['name']}}</h3>
    <p class="text-gray-400 text-sm">
        <span class="material-icons text-orange-500 text-xs select-none">star</span>
        {{$serie['vote_average'] * 10}}% | {{$serie['first_air_date']}}
    </p>	
</a>