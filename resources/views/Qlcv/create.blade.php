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
  <title>Quản lý chức vụ</title>
<h3>Thêm chức vụ</h3>
<br>
<form action="{{ route('chucvu.store') }}" method="post">
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
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã chức vụ: </strong></label>
        <div class="col-sm-5">
          <input  type="text" class="form-control" name="MaChucVu" placeholder="Nhập Mã chức vụ... ">
          @if ($errors->has('MaChucVu'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaChucVu') }}
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
        <label class="col-sm-1,5 col-form-label flex-div "><strong> Tên chức vụ </strong></label>
        <div class="col-sm-5">
          <input  type="text" class="form-control" name="TenChucVu" placeholder="Nhập Tên chức vụ...">
          @if ($errors->has('TenChucVu'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenChucVu') }}
          </span>
          @endif
        </div>
    </div>

    <br>

      <div class="form-group row">
        <label class="col-sm-1,5 col-form-label  flex-div"><strong> Mô tả chức vụ: </strong></label>
        <textarea name="MoTaChucVu" cols="55" rows="4" placeholder="Mô tả chức vụ..."></textarea>
        @if ($errors->has('MoTaChucVu'))
        <span class="error" style="color: red;">
             {{ $errors->first('MoTaChucVu') }}
        </span>
        @endif
    </div>

    <br>
    
    

    <button   class="snip1582">Thêm</button>

    
</form>




@endsection