@extends('layout.master')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h3>Quản lý quy trình</h3>

    <a class="btn btn-success" href="{{ route('quytrinh.create') }}"><i class="fa-solid fa-plus"></i></a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã quy trình"
                class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã quy trình</th>
            <th>Tên quy trình</th>
            <th>Mô tả quy trình</th>
            <th>Nguyên vật liệu</th>
            <th>Tác vụ</th>

        </tr>

        @foreach ($quytrinh as $data)
            <tr>
                <td>{{ $data->MaLoaiQuyTrinh }}</td>
                <td>{{ $data->TenQuyTrinh }}</td>
                <td>{{ $data->MoTaQuyTrinh }}</td>
                <td>
                    @foreach ($data->nguyenVatLieu as $nguyenvatlieu)
                        <p>{{ $nguyenvatlieu->TenNguyenVatLieu }}</p>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('quytrinh.edit', $data->MaLoaiQuyTrinh) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>

                    {{-- <button type="button" class="btn btn-primary" style="padding: 2px" data-toggle="modal"
                        data-target="#deleteModal">
                        <i class="fa-solid fa-trash"></i>
                    </button> --}}
                </td>
            </tr>
        @endforeach
    </table>
    {{ $quytrinh->links() }}
    {{-- <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $data->links() }}
        </ul>
    </nav> --}}
    </div>
    </div>
    </div>
@endsection
