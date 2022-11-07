@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h3>Quản lý kế hoạch</h3>

    <a class="btn btn-success" href="{{ route('kehoach.create') }}">Thêm kế hoạch</a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã kế hoạch"
                class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã kế hoạch</th>
            <th>Nội dung kế hoạch</th>
            <th>Tên quy trình</th>
            <th>Tên xưởng</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Ghi chú</th>
            <th>Tác vụ</th>

        </tr>
        @foreach ($kehoach as $data)
            <tr>
                <td>{{ $data->MaKeHoach }}</td>
                <td>{{ $data->NoiDungKeHoach }}</td>
                <td>{{ $data->quytrinh->TenQuyTrinh}}</td>
                <td>{{ $data->xuong->TenXuong}}</td>
                <td>{{ $data->NgayBatDau }}</td>
                <td>{{ $data->NgayKetThuc }}</td>
                <td>{{ $data->GhiChu }}</td>
                <td>
                    <a href="{{ route('kehoach.edit', $data->MaKeHoach) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>

                    <button type="button" class="btn btn-primary" style="padding: 2px" data-toggle="modal"
                        data-target="#deleteModal">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>

            <!-- Modal Delete Start-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Bạn có chắc muốn xoá không?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Có, hãy xoá!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            <form action="{{ route('kehoach.delete', $data->MaKeHoach) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Xoá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Delete End-->
        @endforeach
    </table>
    {{-- <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $data->links() }}
        </ul>
    </nav> --}}
    </div>
    </div>
    </div>
@endsection
