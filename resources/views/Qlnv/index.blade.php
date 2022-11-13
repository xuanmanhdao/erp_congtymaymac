@extends('layout.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Quản lý nhân viên</title>
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

    <h3>Quản lý nhân viên</h3>
    <hr>
    

    <a class="btn btn-success" href="{{ route('nhanvien.create') }}"><i class="fa-solid fa-plus"></i></a>

   

    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo  mã nhân viên" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Ngày sinh</th>
            <th>Căn cước công dân</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Email</th>
           <th>Số điện thoại</th>
           <th>Mã chức vụ</th>
           <th>Mã xưởng</th>
            <th>Tác vụ</th>
        </tr>
        @foreach ($nhanvien as $data)
            <tr>
                <td>{{ $data->MaNhanVien }}</td>
                <td>{{ $data->TenNhanVien }}</td>
                <td>{{ $data->NgaySinh }}</td>
                <td>{{ $data->CanCuocCongDan }}</td>
                <td>{{ $data->GioiTinh === 1 ? 'Nam' : 'Nữ' }}</td>
                <td>{{ $data->DiaChi }}</td>
                <td>{{ $data->Email }}</td>
                <td>{{ $data->SoDienThoai }}</td>
                <td>{{ $data->chucvu->TenChucVu }}</td>
                <td>{{ $data->xuong->TenXuong }}</td>
               
                <td>
                    <a class="btn btn-warning" href="{{ route('nhanvien.edit', $data->MaNhanVien) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                
                
            </tr>
        @endforeach
    </table>
    <br>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $nhanvien->links() }}
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
