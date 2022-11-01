@extends('layout.master')
@section('content')

<h2 >Quản lý Lô</h3>
<hr>
<a class="btn btn-success" href="{{ route('lo.create')  }}">Thêm Lô</a>
<caption>
    <form class="float-right form-group form-inline">
        <label class="mr-1">Search:</label> 
        <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã lô" class="form-control">
    </form>
</caption>
<table class="table table-striped table-centered mb-0" > 
    <tr >
        <th >Mã Lô</th>
        <th>Tên Lô</th>
        <th>Số lượng</th>
        <th>Mã Xưởng</th>
        <th>Tình trạng</th>
        {{-- <th>Tác vụ</th> --}}
        <th>Sửa</th>
        <th>Xoá</th>
    </tr>
    @foreach ($lo as $data)
    <tr>
        <td>{{ $data->MaLo }}</td>
        <td>{{ $data->TenLo }}</td>
        <td>{{ $data->SoLuong }}</td>
        <td>{{ $data->MaXuong }}</td>
        <td>{{ $data->TinhTrang }}</td>
        <td> 
            <a href="{{ route('lo.edit',$data->MaLo) }}" class="btn btn-sm btn-success" > <i class="fas fa-edit"></i>Edit</a>
        </td>
        <td>
            <form action="{{ route('lo.delete',$data->MaLo) }}" method="post" onsubmit="return ConfirmDelete( this )">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button>
            </form>
        </td>

    </tr>
     
    @endforeach
  <hr>
  <div>
       {{ $lo->links() }} 
  </div>
   

@endsection
