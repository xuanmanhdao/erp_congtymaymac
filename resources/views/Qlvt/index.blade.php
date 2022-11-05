@extends('layout.master')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xoá vật tư</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="MaVatTu" id="MaVatTu">
          Bạn có chắc muốn xoá không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    <h3>Quản lý vật tư</h3>
    {{-- @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif --}}

    <a class="btn btn-success" href="{{ route('vattu.create') }}">Thêm vật tư</a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã vật tư" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã vật tư</th>
            <th>Tên vật tư</th>
            <th>Số lượng </th>
            <th>Giá Vật Tư</th>
            <th>Mô Tả Vật Tư</th>
            <th>Mã Xưởng</th>
            <th>Tác vụ</th>
        </tr>
        @foreach ($vattu as $data)
            <tr>
                <td>{{ $data->MaVatTu }}</td>
                <td>{{ $data->TenVatTu }}</td>
                <td>{{ $data->SoLuong }}</td>
                <td>{{ $data->GiaVatTu }}</td>
                <td>{{ $data->MoTaVatTu }}</td>
                <td>{{ $data->MaXuong}}</td>
               
                <td>
                    <a class="btn btn-success " href="{{ route('vattu.edit', $data->MaVatTu) }}">Sửa</a>
                </td>
                {{-- <td>
                    <form action="{{ route('vattu.delete', $data->MaVatTu) }}" method="post">
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
            {{ $vattu->links() }}
        </ul>
    </nav>
    </div>
    </div>
    </div>    
@endsection

{{-- @section('scripts')

    <script>
        $(document).ready(function (){
            $('.deleteVatTubtn').click(function (e) { 
                e.preventDefault();
                var MaVatTu = $(this).val();
                $('#MaVatTu').val(MaVatTu);
                $('#deleteModal').modal('show');
            });
        })
    </script>

@endsection --}}
