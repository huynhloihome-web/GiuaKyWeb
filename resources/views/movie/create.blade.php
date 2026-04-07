<x-movie-layout>
    <x-slot name="title">
        Thêm phim
    </x-slot>

    <div class="card">
        <div class="card-header">
            <b>THÊM PHIM MỚI</b>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('movie.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <p style="color:red">(*) Là các trường bắt buộc</p>

                <!-- ID -->
                <div class="form-group">
                    <label>Mã phim <span style="color:red">*</span></label>
                    <input type="text" name="id" class="form-control" value="{{old('id')}}">
                    @error('id')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>

                <!-- movie_name -->
                <div class="form-group">
                    <label>Tên phim <span style="color:red">*</span></label>
                    <input type="text" name="movie_name" class="form-control" value="{{old('movie_name')}}">
                    @error('movie_name')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>

                <!-- original_name -->
                <div class="form-group">
                    <label>Tên gốc <span style="color:red">*</span></label>
                    <input type="text" name="original_name" class="form-control" value="{{old('original_name')}}">
                    @error('original_name')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>

                <!-- OPTIONAL FIELDS -->

                <div class="form-group">
                    <label>Tên phim tiếng Việt</label>
                    <input type="text" name="movie_name_vn" class="form-control" value="{{old('movie_name_vn')}}">
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{old('tagline')}}">
                </div>

                <div class="form-group">
                    <label>Tagline tiếng Việt</label>
                    <input type="text" name="tagline_vn" class="form-control" value="{{old('tagline_vn')}}">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="overview" class="form-control">{{old('overview')}}</textarea>
                </div>

                <div class="form-group">
                    <label>Nội dung tiếng Việt</label>
                    <textarea name="overview_vn" class="form-control">{{old('overview_vn')}}</textarea>
                </div>

                <div class="form-group">
                    <label>Thời lượng</label>
                    <input type="text" name="runtime" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kinh phí</label>
                    <input type="text" name="budget" class="form-control">
                </div>

                <div class="form-group">
                    <label>Doanh thu</label>
                    <input type="text" name="revenue" class="form-control">
                </div>

                <div class="form-group">
                    <label>Độ phổ biến</label>
                    <input type="text" name="popularity" class="form-control">
                </div>

                <div class="form-group">
                    <label>Điểm trung bình</label>
                    <input type="text" name="vote_average" class="form-control">
                </div>

                <div class="form-group">
                    <label>Số lượt vote</label>
                    <input type="text" name="vote_count" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mã quốc gia</label>
                    <input type="text" name="country_code" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tên quốc gia</label>
                    <input type="text" name="country_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Trailer</label>
                    <input type="text" name="trailer" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ngày phát hành</label>
                    <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd">
                </div>

                <input type="submit" value="Thêm phim" class="btn btn-success">
                <a href="{{route('movie.manage')}}" class="btn btn-secondary">Quay lại</a>

            </form>
        </div>
    </div>
</x-movie-layout>