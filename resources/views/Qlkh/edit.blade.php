@extends('layout.master')
@section('content')

<h3>Sửa kế hoạch</h3>
<br>
<form action="{{ route('kehoach.update', $data) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã kế hoạch: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaKeHoach" value="{{ $data->MaKeHoach }}">
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ngày bắt đầu: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgayBatDau" value="{{ $data->NgayBatDau }}">
        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ngày kết thúc: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgayKetThuc" value="{{ $data->NgayKetThuc }}">
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Nội dung kế hoạch: </strong></label>
        <textarea name="NoiDungKeHoach" cols="55" rows="4"> {{ $data->NoiDungKeHoach }}</textarea>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ghi chú: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="GhiChu" value="{{ $data->GhiChu }}">
        </div>
    </div>

    <button class="btn btn-success">Sửa</button>

    
</form>




@endsection