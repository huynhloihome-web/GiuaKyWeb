<x-movie-layout>

<div class="container">
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <a href="{{ url('/phim/' . $movie->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card shadow-sm h-100">
                        @if($movie->image_link)
                            <img src="{{ $movie->image_link }}" 
                                 style="height:350px; width:100%; object-fit:cover;"
                                 alt="{{ $movie->movie_name_vn }}">
                        @elseif($movie->image)
                            <img src="https://image.tmdb.org/t/p/w500{{ $movie->image }}" 
                                 style="height:350px; width:100%; object-fit:cover;"
                                 alt="{{ $movie->movie_name_vn }}">
                        @else
                            <img src="https://via.placeholder.com/300x450?text=No+Image" 
                                 style="height:350px; width:100%; object-fit:cover;"
                                 alt="No image">
                        @endif
                        
                        <div class="card-body text-center">
                            <h6 class="movie-title">{{ $movie->movie_name_vn ?: $movie->movie_name }}</h6>
                            <p class="release-date text-muted">{{ date('d/m/Y', strtotime($movie->release_date)) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

</x-movie-layout>