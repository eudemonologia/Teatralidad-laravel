<a href="/actor/{{$actor['id']}}" class="hover:text-gray-300 w-60">
    <div class="w-64 h-96 relative">
        <img src="https://image.tmdb.org/t/p/w300{{ $actor['profile_path'] }}" alt="Foto de {{ $actor['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150 w-full h-full object-cover">
    </div>
    <h3 class="text-lg mt-2">{{$actor['name']}}</h3>
    <p class="text-gray-400 text-sm">
        @foreach ($actor['known_for'] as $known_for)
            @if ($loop->iteration < 5)
                @if ($known_for['media_type'] == 'movie')
                    {{ $known_for['title'] }}
                @else
                    {{ $known_for['name'] }}
                @endif
                @if (!$loop->last)
                    /
                @endif
            @else
                @break
            @endif
        @endforeach
    </p>
</a>