<x-movie-layout>

<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div class="row">
        {{-- Cột ảnh bên trái --}}
        <div class="col-md-3">
            @if($movie->image_link)
                <img src="{{ $movie->image_link }}" 
                     style="width: 100%; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);"
                     alt="{{ $movie->movie_name_vn }}">
            @elseif($movie->image)
                <img src="https://image.tmdb.org/t/p/w500{{ $movie->image }}" 
                     style="width: 100%; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);"
                     alt="{{ $movie->movie_name_vn }}">
            @else
                <img src="https://via.placeholder.com/300x450?text=No+Image" 
                     style="width: 100%; border-radius: 8px;"
                     alt="No image">
            @endif
        </div>
        
        {{-- Cột thông tin bên phải --}}
        <div class="col-md-9">
            <h3 style="margin-bottom: 5px; font-weight: bold;">
                {{ $movie->movie_name_vn ?: $movie->movie_name }}
            </h3>
            
            <p style="color: #666; margin-bottom: 15px; font-size: 14px;">
                Ngày phát hành: {{ date('Y-m-d', strtotime($movie->release_date)) }}
            </p>
            
            <p style="margin-bottom: 10px;">
                <strong>Quốc gia:</strong> {{ $movie->country_name ?: 'Đang cập nhật' }}
            </p>
            
            <p style="margin-bottom: 10px;">
                <strong>Thời gian:</strong> {{ $movie->runtime }} phút
            </p>
            
            <p style="margin-bottom: 20px;">
                <strong>Doanh thu:</strong> {{ number_format($movie->revenue) }}
            </p>
            
            <p style="margin-bottom: 10px;">
                <strong>Mô tả:</strong>
            </p>
            <p style="text-align: justify; line-height: 1.6; color: #333;">
                {{ $movie->overview_vn ?: $movie->overview ?: 'Chưa có mô tả cho phim này.' }}
            </p>
            
            @if($movie->trailer)
                <div style="margin-top: 25px;">
                    <a href="{{ $movie->trailer }}" 
                       target="_blank" 
                       style="display: inline-block; background: linear-gradient(to right, #1ed5a9, #01b4e4); color: white; padding: 8px 25px; border-radius: 30px; text-decoration: none; font-weight: 500;">
                        Xem trailer
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

</x-movie-layout>