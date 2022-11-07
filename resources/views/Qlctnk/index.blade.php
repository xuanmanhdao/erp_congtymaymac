@extends('layout.master')
@section('content')

  <title>Quản lý chi tiết nhập kho</title>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xoá kế hoạch</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="MaKeHoach" id="MaKeHoach">
          Bạn có chắc muốn xoá không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <h3>Quản lý chi tiết nhập kho</h3>
    <hr>

    <a class="btn btn-success" href="{{ route('chitietnhapkho.create') }}">Thêm </a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã nhập kho" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã nhập kho</th>
            <th>Mã nguyên vật liệu</th>
            <th>Số lượng</th>
            <th>Đơn vị tính</th>
            <th>Thành tiền </th>
            
            <th>Tác vụ</th>
        </tr>
        @foreach ($chitietnhapkho as $data)
            <tr>
                <td>{{ $data->MaNhapKho }}</td>
                <td>{{ $data->MaNguyenVatLieu }}</td>
                <td>{{ $data->SoLuong }}</td>
                <td>{{ $data->DonViTinh }}</td>
                <td>{{ $data->ThanhTien }}</td>
                
                {{-- <td>
                    <a class="btn btn-success" href="{{ route('chitietnhapkho.edit', $data->MaNhapKho) }}">Sửa</a>
                </td> --}}
                
                
            </tr>
        @endforeach
    </table>
    <br>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $chitietnhapkho->links() }}
        </ul>
    </nav>
    </div>
    </div>
    </div>    
@endsection

{{-- @section('scripts')

    <script>
        $(document).ready(function (){
            $('.deleteKehoachbtn').click(function (e) { 
                e.preventDefault();
                var MaKeHoach = $(this).val();
                $('#MaKeHoach').val(MaKeHoach);
                $('#deleteModal').modal('show');
            });
        })
    </script>

@endsection --}}
