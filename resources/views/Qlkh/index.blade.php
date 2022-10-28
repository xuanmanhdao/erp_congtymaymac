@extends('layout.master')
@section('content')

<h3>Quản lý kế hoạch</h3>

<a class="btn btn-success" href="{{ route('kehoach.create')  }}">Thêm kế hoạch</a>
<caption>
    <form class="float-right form-group form-inline">
        <label class="mr-1">Search:</label> 
        <input type="search" name="q" value placeholder="Theo mã kế hoạch" class="form-control">
    </form>
</caption>
<table class="table table-striped table-centered mb-0">
    <tr>
        <th>Mã kế hoạch</th>
        <th>Kế hoạch</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Ghi chú</th>
        {{-- <th>Tác vụ</th> --}}
        <th>Sửa</th>
        <th>Xoá</th>
    </tr>
    @foreach ($kehoach as $data)
    <tr>
        <td>{{ $data->MaKeHoach }}</td>
        <td>{{ $data->NoiDungKeHoach }}</td>
        <td>{{ $data->NgayBatDau }}</td>
        <td>{{ $data->NgayKetThuc }}</td>
        <td>{{ $data->GhiChu }}</td>
        <td> 
            <a href="{{ route('kehoach.edit', $data->MaKeHoach) }}">Sửa</a>
        </td>
        <td>
            <form action="{{ route('kehoach.delete', $data->MaKeHoach) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Xoá</button>
            </form>
        </td>

    </tr>
        
    @endforeach

@endsection