@extends('layout.master')
@section('content')

<h3>Sửa quy trình</h3>
<br>
<form action="{{ route('quytrinh.update', $data) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group row">
      <label class="col-sm-1,5 col-form-label"><strong> Mã loại quy trình: </strong></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="MaLoaiQuyTrinh" value="{{ $data->MaLoaiQuyTrinh }}">
        @if ($errors->has('MaLoaiQuyTrinh'))
        <span class="error" style="color: red;">
             {{ $errors->first('MaLoaiQuyTrinh') }}
        </span>
        @endif
      </div>
  </div>

  <br>

  <div class="form-group row">
      <label class="col-sm-1,5 col-form-label"><strong> Tên quy trình: </strong></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="TenQuyTrinh" value="{{ $data->TenQuyTrinh }}">
        @if ($errors->has('TenQuyTrinh'))
        <span class="error" style="color: red;">
             {{ $errors->first('TenQuyTrinh') }}
        </span>
        @endif
        
      </div>
  </div>

  <br>

  <div class="form-group row">
      <label class="col-sm-1,5 col-form-label"><strong> Mô tả quy trình: </strong></label>
      <textarea name="MoTaQuyTrinh" cols="55" rows="4" >{{ $data->MoTaQuyTrinh }}</textarea>
      @if ($errors->has('MoTaQuyTrinh'))
      <span class="error" style="color: red;">
           {{ $errors->first('MoTaQuyTrinh') }}
      </span>
      @endif
  </div>
  <br>

  Nguyên vật liệu
    <select name="MaNguyenVatLieu" class="form-control select">
      @foreach ($nguyenvatlieu as $nguyenvatlieu )
      <option value="{{ $nguyenvatlieu->MaNguyenVatLieu }}" {{ $nguyenvatlieu->MaNguyenVatLieu == $data->nguyenvatlieu->MaNguyenVatLieu ? 'selected' : '' }}>{{ $nguyenvatlieu->TenNguyenVatLieu }}</option>

          {{-- <option value="{{ $nguyenvatlieu->MaNguyenVatLieu }}">
            {{ $nguyenvatlieu->TenNguyenVatLieu }}
          </option> --}}
      @endforeach
    </select>


    <button class="btn btn-success">Sửa</button>

    
</form>




@endsection