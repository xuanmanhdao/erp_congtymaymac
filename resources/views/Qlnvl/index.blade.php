@extends('layout.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h3>Quản lý nguyên vật liêu</h3>

    <a class="btn btn-success" href="{{ route('nguyenvatlieu.create') }}"><i class="fa-solid fa-plus"></i></a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã nguyên vật liệu"
                class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã nguyên vật liệu</th>
            <th>Tên nguyên vật liệu</th>
            <th>Kiểu chất liệu</th>
            <th>Số lượng</th>
            <th>Đơn vị tính</th>
            <th>Tên Xưởng</th>
            <th>Đơn vị phân phối</th>
            <th>Tác vụ</th>

        </tr>
        @foreach ($nguyenvatlieu as $data)
            <tr>
                <td>{{ $data->MaNguyenVatLieu }}</td>
                <td>{{ $data->TenNguyenVatLieu }} </td>
                <td>{{ $data->chatlieu->TenChatLieu }}</td>
                <td>{{ $data->SoLuong }}</td>
                <td>{{ $data->DonViTinh }}</td>
                <td>{{ $data->xuong->TenXuong}}</td>
                <td>{{ $data->donviphanphoi->TenDonViPhanPhoi}}</td>

                <td>
                    <a class="btn btn-warning " href="{{ route('nguyenvatlieu.edit', $data->MaNguyenVatLieu) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>

                    {{-- <button type="button" class="btn btn-primary" style="padding: 2px" data-toggle="modal"
                        data-target="#deleteModal">
                        <i class="fa-solid fa-trash"></i>
                    </button> --}}
                </td>
            </tr>
 
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
