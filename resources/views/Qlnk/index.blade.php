@extends('layout.master')
@section('content')

  <title>Quản lý nhập kho</title>
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

    <h3>Quản lý Nhập kho</h3>
    <hr>

    <a class="btn btn-success" href="{{ route('nhapkho.create') }}">Thêm kho nhập</a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã nhập kho" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã nhập kho</th>
            <th>Thời gian nhập</th>
            <th>Tổng giá </th>
            <th>Ghi chú</th>
            <th>Mã nhân viên</th>
            <th>Đơn vị phân phối</th>
           
            <th>Tác vụ</th>
        </tr>
        @foreach ($nhapkho as $data)
            <tr>
                <td>{{ $data->MaNhapKho }}</td>
                <td>{{ $data->ThoiGianNhap }}</td>
                <td>{{ $data->TongGia }}</td>
                <td>{{ $data->GhiChu }}</td>
                <td>{{ $data->MaNhanVien }}</td>
                <td>{{ $data->MaDonViPhanPhoi }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('nhapkho.edit', $data->MaNhapKho) }}">Sửa</a>
                </td>
                
                
            </tr>
        @endforeach
    </table>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $nhapkho->links() }}
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
