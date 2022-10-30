@extends('layout.master')
@section('content')
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
    <h3>Quản lý kế hoạch</h3>

    <a class="btn btn-success" href="{{ route('kehoach.create') }}">Thêm kế hoạch</a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã kế hoạch" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã kế hoạch</th>
            <th>Kế hoạch</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Ghi chú</th>
            <th>Sửa</th>
            <th>Xoá</th>
            <th>Tác vụ</th>
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
                <td>
                    <button type="button" class="btn btn-danger deleteKehoachBtn" value="{{ $data->MaKeHoach }}">Demo</button>
                </td>
                
            </tr>
        @endforeach
    </table>
    {{-- <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $data->links() }}
        </ul>
    </nav> --}}
    </div>
    </div>
    </div>    
@endsection

@section('scripts')

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

@endsection
