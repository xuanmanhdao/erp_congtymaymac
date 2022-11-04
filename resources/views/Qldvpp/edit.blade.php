@extends('layout.master')
@section('content')
<style type="text/css">
  .flex-div {
  display: flex;
  width: 200px;
  height: 50px;
  justify-content: center;
  align-items: center;
  font-size: medium;
  font-weight: bold;
  /*background-color: #f0fff0;*/
 /* border: solid 1px lightgray;*/
}
@import url(https://fonts.googleapis.com/css?family=BenchNine:700);
.snip1582 {
  background-color: #42d29d;
  border: none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-family: 'BenchNine', Arial, sans-serif;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 12px 40px 10px;
  position: relative;
  text-transform: uppercase;
  font-weight: ;
}

.snip1582:before,
.snip1582:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}

.snip1582:before {
  border-color: #c47135;
  border-top-width: 2px;
  left: 0px;
  top: -5px;
}

.snip1582:after {
  border-bottom-width: 2px;
  border-color: #c47135;
  bottom: -5px;
  right: 0px;
}

.snip1582:hover,
.snip1582.hover {
  background-color: #c47135;
}

.snip1582:hover:before,
.snip1582.hover:before,
.snip1582:hover:after,
.snip1582.hover:after {
  height: 100%;
  width: 100%;
}
}
</style>

  <title>Quản lý đơn vị phân phối</title>
<h3>Sửa Đơn vị Phân phối</h3>
<br>
<form action="{{ route('donviphanphoi.update',$data) }}" method="post">
  @method('PUT')
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã Đơn vị phân phối: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaDonViPhanPhoi" value="{{ $data->MaDonViPhanPhoi }}">
          @if ($errors->has('MaDonViPhanPhoi'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaDonViPhanPhoi') }}
          </span>
          @endif
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Tên đơn vị phân phối: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenDonViPhanPhoi" value="{{ $data->TenDonViPhanPhoi }}">
          @if ($errors->has('TenDonViPhanPhoi'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenDonViPhanPhoi') }}
          </span>
          @endif
          
        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Địa chỉ: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="DiaChi" value="{{ $data->DiaChi }}">
          @if ($errors->has('DiaChi'))
          <span class="error" style="color: red;">
               {{ $errors->first('DiaChi') }}
          </span>
          @endif
        </div>
    </div>

    <br>

      <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Số điện thoại: </strong></label>
        <div class="col-sm-5">
          <input type="tel" class="form-control" name="SoDienThoai" value="{{ $data->SoDienThoai }}">
          @if ($errors->has('SoDienThoai'))
          <span class="error" style="color: red;">
               {{ $errors->first('SoDienThoai') }}
          </span>
          @endif
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> FAX: </strong></label>
        <div class="col-sm-5">
          <input type="tel" class="form-control" name="Fax" value="{{ $data->Fax }}">
          @if ($errors->has('Fax'))
          <span class="error" style="color: red;">
              {{ $errors->first('Fax') }}
          </span>
          @endif
        </div>
    </div>

    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Email: </strong></label>
        <div class="col-sm-5">
          <input type="email" class="form-control" name="Email" value="{{ $data->Email }}">
          @if ($errors->has('Email'))
          <span class="error" style="color: red;">
              {{ $errors->first('Email') }}
          </span>
          @endif
        </div>
    </div>

    <button class="snip1582">Sửa</button>

    
</form>




@endsection