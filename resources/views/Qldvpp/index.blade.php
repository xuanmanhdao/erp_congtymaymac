@extends('layout.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Quản lý đơn vị phân phối</title>
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

    <h3>Quản lý Đơn vị phân phối</h3>
    <hr>
    

    <a class="btn btn-success" href="{{ route('donviphanphoi.create') }}"><i class="fa-solid fa-plus"></i></a>

   

    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo  mã đơn vị phân phối" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã đơn vị phân phối</th>
            <th>Tên đơn vị phân phối</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>FAX</th>
            <th>Email</th>
           
            <th>Tác vụ</th>
        </tr>
        @foreach ($donviphanphoi as $data)
            <tr>
                <td>{{ $data->MaDonViPhanPhoi }}</td>
                <td>{{ $data->TenDonViPhanPhoi }}</td>
                <td>{{ $data->DiaChi }}</td>
                <td>{{ $data->SoDienThoai }}</td>
                <td>{{ $data->Fax }}</td>
                <td>{{ $data->Email }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('donviphanphoi.edit', $data->MaDonViPhanPhoi) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                
                
            </tr>
        @endforeach
    </table>
    <br>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $donviphanphoi->links() }}
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
