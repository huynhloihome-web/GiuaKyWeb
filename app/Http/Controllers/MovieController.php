<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

    public function detail($id)
    {
        $movie = DB::table("movie")
            ->where("status", 1)
            ->where("id", $id)
            ->first();

        return view("movie.detail", compact("movie"));
    }

    public function manage()
    {
        $data = DB::table("movie")
            ->where("status", 1)
            ->orderBy("release_date", "desc")
            ->get();

        return view("movie.manage", compact("data"));
    }

    public function delete(Request $request)
    {
        DB::table("movie")
            ->where("id", $request->id)
            ->update(["status" => 0]);

        return redirect()->route("movie.manage");
    }

    public function create()
    {
        return view("movie.create");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|integer|unique:movie,id',
                'movie_name' => 'required',
                'original_name' => 'required',
            ],
            [
                'id.required' => 'Vui lòng nhập mã phim',
                'id.integer' => 'Mã phim phải là số nguyên',
                'id.unique' => 'Mã phim đã tồn tại',

                'movie_name.required' => 'Vui lòng nhập tên phim',
                'original_name.required' => 'Vui lòng nhập tên gốc',
            ]
        );

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->storeAs("", $fileName, "public");
            $imagePath = "/" . $fileName;
        }

        $data = [];
        $data["id"] = $request->id;
        $data["movie_name"] = $request->movie_name;
        $data["original_name"] = $request->original_name;

        $data["movie_name_vn"] = $request->movie_name_vn;
        $data["image"] = $imagePath;
        $data["tagline"] = $request->tagline;
        $data["tagline_vn"] = $request->tagline_vn;
        $data["overview"] = $request->overview;
        $data["overview_vn"] = $request->overview_vn;
        $data["runtime"] = $request->runtime;
        $data["budget"] = $request->budget;
        $data["revenue"] = $request->revenue;
        $data["popularity"] = $request->popularity;
        $data["vote_average"] = $request->vote_average;
        $data["vote_count"] = $request->vote_count;
        $data["country_code"] = $request->country_code;
        $data["country_name"] = $request->country_name;
        $data["trailer"] = $request->trailer;
        $data["release_date"] = $request->release_date;

        $data["updated_at"] = date("Y-m-d H:i:s");
        $data["status"] = 1;

        DB::table("movie")->insert($data);

        return redirect()->route("movie.manage");
    }

    public function genre($id)
    {
        $data = DB::table("movie as m")
            ->join("movie_genre as mg", "m.id", "=", "mg.id_movie")
            ->where("m.status", 1)
            ->where("mg.id_genre", $id)
            ->orderBy("m.release_date", "desc")
            ->select("m.*")
            ->limit(12)
            ->get();

        return view("index", compact("data"));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $data = DB::select(
            "select * from movie where movie_name_vn like ? and status = 1",
            ["%" . $keyword . "%"]
        );

        return view("index", compact("data"));
    }
}