@extends('layout.master')
@section('content')

<h3>Sửa Đầu vào</h3>
<br>
<form action="{{ route('dauvao.update',$data) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã Đầu vào : </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaDauVao" value="{{ $data->MaDauVao }}">

           @if ($errors->has('MaDauVao'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaDauVao') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Tên SP đầu vào: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenSPDauVao" value="{{ $data->TenSPDauVao }}">

          @if ($errors->has('TenSPDauVao'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenSPDauVao') }}
          </span>
          @endif

        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Loai: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="Loai" value="{{ $data->Loai }}">

          @if ($errors->has('Loai'))
          <span class="error" style="color: red;" >
               {{ $errors->first('Loai') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Hiện trang: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="HienTrang" value="{{ $data->HienTrang }}">

           @if ($errors->has('HienTrang'))
          <span class="error" style="color: red;">
               {{ $errors->first('HienTrang') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Màu sắc: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MauSac" value="{{ $data->MauSac }}">

          @if ($errors->has('MauSac'))
          <span class="error" style="color: red;" margintop="5px">
               {{ $errors->first('MauSac') }}
          </span>
          @endif
          
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ngay Nhận: </strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="NgayNhan" value="{{ $data->NgayNhan }}">

          @if ($errors->has('NgayNhan'))
          <span class="error" style="color: red;" margintop="5px">
               {{ $errors->first('NgayNhan') }}
          </span>
          @endif
          
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Ghi Chú: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="GhiChu" value="{{ $data->GhiChu }}">

          @if ($errors->has('GhiChu'))
          <span class="error" style="color: red;" margintop="5px">
               {{ $errors->first('GhiChu') }}
          </span>
          @endif
          
        </div>
    </div>

    <button class="btn btn-success">Sửa</button>

    
</form>




@endsection