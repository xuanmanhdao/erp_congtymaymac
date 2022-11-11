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
  <title>Quản lý nhân viên</title>
<h3>Thêm nhân viên</h3>
<br>
<form action="{{ route('nhanvien.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã nhân viên: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaNhanVien" placeholder="Nhập Mã nhân viên...">
          @if ($errors->has('MaNhanVien'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaNhanVien') }}
          </span>
          @endif
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Tên nhân viên: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenNhanVien" placeholder="Nhập Tên nhân viên...">
          @if ($errors->has('TenNhanVien'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenNhanVien') }}
          </span>
          @endif
          
        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div "><strong> Ngày sinh: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgaySinh" placeholder="Nhập Ngày sinh...">
          @if ($errors->has('NgaySinh'))
          <span class="error" style="color: red;">
               {{ $errors->first('NgaySinh') }}
          </span>
          @endif
        </div>
    </div>

    <br>

      <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Căn cước công dân: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="CanCuocCongDan" placeholder="Nhập Số CCCD...">
          @if ($errors->has('CanCuocCongDan'))
          <span class="error" style="color: red;">
               {{ $errors->first('CanCuocCongDan') }}
          </span>
          @endif
        </div>
    </div>

    <br>


{{-- <select name="GioiTinh" class="form-select">
                                        <option selected>Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nu">Nữ</option>
                                    </select> --}}

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Giới tính: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="GioiTinh" placeholder="Nhập Giới tính...">
          @if ($errors->has('GioiTinh'))
          <span class="error" style="color: red;">
              {{ $errors->first('GioiTinh') }}
          </span>
          @endif
        </div>
    </div>

    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Địa chỉ: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="DiaChi" placeholder="Nhập Địa chỉ...">
          @if ($errors->has('DiaChi'))
          <span class="error" style="color: red;">
              {{ $errors->first('DiaChi') }}
          </span>
          @endif
        </div>
    </div>

    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Email: </strong></label>
        <div class="col-sm-5">
          <input type="email" class="form-control" name="Email" placeholder="Nhập Email...">
          @if ($errors->has('Email'))
          <span class="error" style="color: red;">
              {{ $errors->first('Email') }}
          </span>
          @endif
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Số điện thoại: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="SoDienThoai" placeholder="Nhập Số điện thoại...">
          @if ($errors->has('SoDienThoai'))
          <span class="error" style="color: red;">
              {{ $errors->first('SoDienThoai') }}
          </span>
          @endif
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã chức vụ : </strong></label>
        <div class="col-sm-5">
          <select type="text" class="form-control" name="MaChucVu" >
          @foreach ($chucvu as $nv)
                    <option value="{{ $nv->MaChucVu }}">{{ $nv->MaChucVu }}</option>
          @endforeach
         </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã xưởng: </strong></label>
        <div class="col-sm-5">
          <select type="" class="form-control" name="MaXuong" >
          @foreach ($xuong as $nv)
                    <option value="{{ $nv->MaXuong }}">{{ $nv->MaXuong }}</option>
          @endforeach
         </select>
        </div>
    </div>


    <button class="snip1582">Thêm</button>

    
</form>




@endsection