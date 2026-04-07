<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieDetailController extends Controller
{
    // Hiển thị chi tiết phim
    public function show($id)
    {
        // Lấy thông tin phim theo id
        $movie = DB::table('movie')->where('id', $id)->first();
        
        // Kiểm tra nếu không tìm thấy phim
        if (!$movie) {
            abort(404, 'Không tìm thấy phim');
        }
        
        // Lấy thể loại của phim
        $genres = DB::table('movie_genre')
            ->join('genre', 'movie_genre.id_genre', '=', 'genre.id')
            ->where('movie_genre.id_movie', $id)
            ->select('genre.genre_name_vn', 'genre.genre_name')
            ->get();
        
        // Lấy danh sách thể loại cho menu bên trái
        $allGenres = DB::table('genre')->get();
        
        return view('movie-detail', compact('movie', 'genres', 'allGenres'));
    }
}