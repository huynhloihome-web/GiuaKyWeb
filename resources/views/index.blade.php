<x-movie-layout>

<div class="container">
    <div class="row">
        @if(isset($data) && count($data) > 0)
            @foreach($data as $movie)
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
                                @if($movie->release_date)
                                    <p class="release-date text-muted">{{ date('d/m/Y', strtotime($movie->release_date)) }}</p>
                                @else
                                    <p class="release-date text-muted">Chưa có ngày phát hành</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fa fa-info-circle"></i> Không tìm thấy phim nào.
                </div>
            </div>
        @endif
    </div>
</div>

</x-movie-layout>