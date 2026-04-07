<x-movie-layout>
    <x-slot name="title">
        Quản lý phim
    </x-slot>

    <div style='text-align:center; color:#15c; font-weight:bold; font-size:20px; margin-bottom:10px;'>
        QUẢN LÝ PHIM
    </div>

    <a href="{{route('movie.create')}}" class='btn btn-sm btn-success mb-2'>Thêm</a>

    <table id="movie-table" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Mã phim</th>
                <th>Ảnh đại diện</th>
                <th>Tên phim</th>
                <th>Ngày phát hành</th>
                <th>Độ phổ biến</th>
                <th>Điểm bình chọn</th>
                <th width="120px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td><img src="{{ $row->image_link }}" width="50px"></td>
                <td>{{$row->movie_name_vn}}</td>
                <td>{{$row->release_date}}</td>
                <td>{{$row->popularity}}</td>
                <td>{{$row->vote_average}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('movie.detail',['id'=>$row->id])}}" class='btn btn-sm btn-primary'>Xem</a>
                        &nbsp;
                        <form method='post' action="{{route('movie.delete')}}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phim này không?');">
                            <input type='hidden' value='{{$row->id}}' name='id'>
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>

    <script>
        $(document).ready(function () {
            $('#movie-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                bStateSave: true,
            });
        });
    </script>
</x-movie-layout>