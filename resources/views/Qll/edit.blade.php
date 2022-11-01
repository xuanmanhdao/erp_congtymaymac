@extends('layout.master')
@section('content')

<h3>Sửa Lô</h3>
<br>
<form action="{{ route('lo.update',$data) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã Lô : </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaLo" value="{{ $data->MaLo }}">

           @if ($errors->has('MaLo'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaLo') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Tên Lô: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenLo" value="{{ $data->TenLo }}">

          @if ($errors->has('TenLo'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenLo') }}
          </span>
          @endif

        </div>
    </div>

    <br> 

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Số lượng: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="SoLuong" value="{{ $data->SoLuong }}">

          @if ($errors->has('SoLuong'))
          <span class="error" style="color: red;" >
               {{ $errors->first('SoLuong') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã Xưởng: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaXuong" value="{{ $data->MaXuong }}">

           @if ($errors->has('MaXuong'))
          <span class="error" style="color: red;">
               {{ $errors->first('MaXuong') }}
          </span>
          @endif

        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Tình trạng: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TinhTrang" value="{{ $data->TinhTrang }}">

          @if ($errors->has('TinhTrang'))
          <span class="error" style="color: red;" margintop="5px">
               {{ $errors->first('TinhTrang') }}
          </span>
          @endif
          
        </div>
    </div>

    <button class="btn btn-success">Sửa</button>

    
</form>




@endsection