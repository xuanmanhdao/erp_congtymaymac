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

  <title>Quản lý xưởng</title>
<h3>Sửa Xưởng</h3>
<br>
<form action="{{ route('xuong.update',$data) }}" method="post">
  @method('PUT')
    @csrf
    <input type="hidden"  class="form-control" name="MaXuong" value="{{ $data->MaXuong }}">
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã Xưởng </strong></label>
        <div class="col-sm-5">
          <input type="text" disabled class="form-control"  value="{{ $data->MaXuong }}">
          @if ($errors->has('MaXuong'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaXuong') }}
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
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Tên Xưởng: </strong></label>
        <div class="col-sm-5">
          <input type="tel" class="form-control" name="TenXuong" value="{{ $data->TenXuong }}">
          @if ($errors->has('TenXuong'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenXuong') }}
          </span>
          @endif
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mô tả xưởng: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MoTaXuong" value="{{ $data->MoTaXuong }}">
          @if ($errors->has('MoTaXuong'))
          <span class="error" style="color: red;">
              {{ $errors->first('MoTaXuong') }}
          </span>
          @endif
        </div>
    </div>

    <br>
    

    <button class="snip1582">Sửa</button>

    
</form>




@endsection