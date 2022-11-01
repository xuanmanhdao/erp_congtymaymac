@extends('layout.master')
@section('content')

<h2 >Quản lý Đầu Vào</h3>
<hr>
<a class="btn btn-success" href="{{ route('dauvao.create')  }}">Thêm Đầu Vào</a>
<caption>
    <form class="float-right form-group form-inline">
        <label class="mr-1">Search:</label> 
        <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã lô" class="form-control">
    </form>
</caption>
<table class="table table-striped table-centered mb-0" > 
    <tr >
        <th >Mã Đầu Vào</th>
        <th>Tên Đầu Vào</th>
        <th>Loai</th>
        <th>Hiện trang</th>
        <th>Màu săc</th>
        <th>Ngày nhận</th>
        <th>Ghi chú</th>
        {{-- <th>Tác vụ</th> --}}
        <th>Sửa</th>
        <th>Xoá</th>
    </tr>
    @foreach ($dauvao as $data)
    <tr>
        <td>{{ $data->MaDauVao }}</td>
        <td>{{ $data->TenSPDauVao }}</td>
        <td>{{ $data->Loai }}</td>
        <td>{{ $data->HienTrang }}</td>
        <td>{{ $data->MauSac }}</td>
        <td>{{ $data->NgayNhan }}</td>
        <td>{{ $data->GhiChu }}</td>
        <td> 
            <a href="{{ route('dauvao.edit',$data->MaDauVao) }}" class="btn btn-sm btn-success" > <i class="fas fa-edit"></i>Edit</a>
        </td>
        <td>
            <form action="{{ route('dauvao.delete',$data->MaDauVao) }}" method="post" onsubmit="return ConfirmDelete( this )">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button>
            </form>
        </td>

    </tr>
     
    @endforeach
  <hr>
  <div>
       {{ $dauvao->links() }} 
  </div>
   

@endsection
