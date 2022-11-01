@extends('layout.master')
@section('content')

<h3>Thêm Lô</h3>
<br>
<form action="{{ route('lo.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã Lô : </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaLo" placeholder="Nhập mã lô ...">

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
          <input type="text" class="form-control" name="TenLo" placeholder="Nhập tên lô ...">

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
          <input type="text" class="form-control" name="SoLuong" placeholder="Nhập số lượng ..." >

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
          <input type="text" class="form-control" name="MaXuong" placeholder="Nhập mã xưởng ...">

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
          <input type="text" class="form-control" name="TinhTrang" placeholder="Nhập tình trạng ...">

          @if ($errors->has('TinhTrang'))
          <span class="error" style="color: red;" margintop="5px">
               {{ $errors->first('TinhTrang') }}
          </span>
          @endif

        </div>
    </div>

    <button class="btn btn-success">Thêm</button>

    
</form>

    {{-- <ul class="alert text-danger">
        @foreach ($errors ->all() as $error)
            <li>{{ $error }}</li>
            {{-- expr --}}
        {{-- @endforeach
    </ul> --}} 




@endsection