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
  <title>Quản lý nhập kho</title>
<h3>Thêm kho nhập</h3>
<br>
<form action="{{ route('nhapkho.store') }}" method="post">
    @csrf
 {{--    <div class="form-group row">  // tăng dần
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã nhập kho: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaNhapKho" placeholder="Nhập Mã nhập kho...">
          @if ($errors->has('MaNhapKho'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaNhapKho') }}
          </span>
          @endif
        </div>
    </div> --}}

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Thời gian nhập: </strong></label>
        <div class="col-sm-5">
          <input type="datetime-local" class="form-control" name="ThoiGianNhap">
          @if ($errors->has('ThoiGianNhap'))
          <span class="error" style="color: red;">
               {{ $errors->first('ThoiGianNhap') }}
          </span>
          @endif
          
        </div>
    </div>

    <br> 
<!-- <script>
function format_curency(a) {
    a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
</script> -->


    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div "><strong> Tổng giá: </strong></label>
        <div class="col-sm-5">
          <input  type="text" class="form-control" name="TongGia" placeholder="Nhập Tổng giá...">
          @if ($errors->has('TongGia'))
          <span class="error" style="color: red;">
               {{ $errors->first('TongGia') }}
          </span>
          @endif
        </div>
    </div>

    <br>

      <div class="form-group row">
        <label class="col-sm-1,5 col-form-label  flex-div"><strong> Ghi Chú: </strong></label>
        <textarea name="GhiChu" cols="55" rows="4" placeholder="Nhập ghi chú..."></textarea>
        @if ($errors->has('GhiChu'))
        <span class="error" style="color: red;">
             {{ $errors->first('GhiChu') }}
        </span>
        @endif
    </div>

    <br>
    
    <input type="hidden" class="form-control" name="MaNhanVien" value="{{ $nhanvien }}" >
    <!-- <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã nhân viên: </strong></label>
        <div class="col-sm-5">
          <input type="hidden" class="form-control" name="MaNhanVien" value="{{ $nhanvien }}" >
          @if ($errors->has('MaNhanVien'))
          <span class="error" style="color: red;">
              {{ $errors->first('MaNhanVien') }}
          </span>
          @endif
        </div>
    </div> -->

    
   {{--  <div class="form-group row">
       <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã Đơn vị phân phối: </strong></label>
    <select name="MaDonViPhanPhoi" class="form-control">
          @foreach ($nhapkho as $data) --}}
            {{-- expr
            <option value="{{ $data->MaDonViPhanPhoi }}"> {{ $data->MaDonViPhanPhoi }} </option>
          @endforeach
          
    </select>
    </div> --}}


    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã Đơn vị phân phối: </strong></label>
        <div class="col-sm-5">
          <select type="text" class="form-control" name="MaDonViPhanPhoi" >
          @foreach ($donviphanphoi as $phanphoi)
                    <option value="{{ $phanphoi->MaDonViPhanPhoi }}">{{ $phanphoi->MaDonViPhanPhoi }}</option>
          @endforeach
         </select>
        </div>
    </div>

    <button   class="snip1582">Thêm</button>

    
</form>




@endsection