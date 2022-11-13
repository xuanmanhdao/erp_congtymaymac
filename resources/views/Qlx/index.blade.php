@extends('layout.master')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xoá xưởng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="MaXuong" id="MaXuong">
          Bạn có chắc muốn xoá không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
    <h3>Quản lý xưởng</h3>

    <a class="btn btn-success" href="{{ route('xuong.create') }}"><i class="fa-solid fa-plus"></i></a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã xưởng" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã xưởng</th>
            <th>Địa chỉ</th>
            <th>Tên xưởng</th>
            <th>Mô tả xưởng</th>
            <th>Tác vụ</th>
        </tr>
        @foreach ($xuong as $data)
            <tr>
                <td>{{ $data->MaXuong }}</td>
                <td>{{ $data->DiaChi }}</td>
                <td>{{ $data->TenXuong }}</td>
                <td>{{ $data->MoTaXuong }}</td>
               
                <td>
                    <a class="btn btn-warning " href="{{ route('xuong.edit', $data->MaXuong) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                {{-- <td>
                    <form action="{{ route('xuong.delete', $data->MaXuong) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Xoá</button>
                    </form>
                </td> --}}
                {{-- <td>
                    <button type="button" class="btn btn-danger deleteKehoachBtn" value="{{ $data->MaXuong }}">Demo</button>
                </td> --}}
                
            </tr>
        @endforeach
    </table>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $xuong->links() }}
        </ul>
    </nav>
    </div>
    </div>
    </div>    
@endsection

@section('scripts')

    <script>
        $(document).ready(function (){
            $('.deleteXuongbtn').click(function (e) { 
                e.preventDefault();
                var MaXuong = $(this).val();
                $('#MaXuong').val(MaXuong);
                $('#deleteModal').modal('show');
            });
        })
    </script>

@endsection
