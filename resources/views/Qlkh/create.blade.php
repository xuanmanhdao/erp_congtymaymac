@extends('layout.master')
@section('content')

<h3>Thêm kế hoạch</h3>
<br>
<form action="{{ route('kehoach.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã kế hoạch: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaKeHoach" placeholder="Nhập mã kế hoạch...">
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ngày bắt đầu: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgayBatDau">
        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ngày kết thúc: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgayKetThuc">
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Nội dung kế hoạch: </strong></label>
        <textarea name="NoiDungKeHoach" cols="55" rows="4" placeholder="Nhập nội dung..."></textarea>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ghi chú: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="GhiChu" placeholder="Ghi chú...">
        </div>
    </div>

    <button class="btn btn-success">Thêm</button>

    
</form>




@endsection