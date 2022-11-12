@extends('layout.master')
@section('content')

<h3>Sửa nguyên vật liệu</h3>
<br>
<form action="{{ route('nguyenvatlieu.update', $data) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã nguyên vật liệu: </strong></label>
        <div class="col-sm-5">
          <input disabled type="text" class="form-control" name="MaNguyenVatLieu" value="{{ $data->MaNguyenVatLieu }}">
          @if($errors->has('MaNguyenVatLieu'))
          <span class="error" style="color: red">
              {{ $errors->first('MaNguyenVatLieu') }}
          </span>
          @endif
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Tên nguyên vật liệu: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenNguyenVatLieu" value="{{ $data->TenNguyenVatLieu }}">
          @if($errors->has('TenNguyenVatLieu'))
          <span class="error" style="color: red">
              {{ $errors->first('TenNguyenVatLieu') }}
          </span>
          @endif
        </div>
    </div>

    <br> 
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Số lượng: </strong></label>
        <div class="col-sm-5">
          <input type="number" class="form-control" name="SoLuong" value="{{ $data->SoLuong }}">
          @if($errors->has('SoLuong'))
          <span class="error" style="color: red">
              {{ $errors->first('SoLuong') }}
          </span>
          @endif
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Đơn vị tính: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="DonViTinh" value="{{ $data->DonViTinh }}">
          @if($errors->has('DonViTinh'))
          <span class="error" style="color: red">
              {{ $errors->first('DonViTinh') }}
          </span>
          @endif
        </div>
    </div>

    <br> 

    Tên xưởng
      <select name="MaXuong" class="form-control select">
        @foreach ($xuong as $xuong )
      <option value="{{ $xuong->MaXuong }}" {{ $xuong->MaXuong == $data->xuong->MaXuong ? 'selected' : '' }}>{{ $xuong->TenXuong }}</option>
        
            {{-- <option value="{{ $xuong->MaXuong }}">
              {{ $xuong->TenXuong }}
            </option> --}}
        @endforeach
      </select>
      <br>

      Đơn vị phân phối
      <select name="MaDonViPhanPhoi" class="form-control select">
        @foreach ($donviphanphoi as $donviphanphoi )
      <option value="{{ $donviphanphoi->MaDonViPhanPhoi }}" {{ $donviphanphoi->MaDonViPhanPhoi == $data->donviphanphoi->MaDonViPhanPhoi ? 'selected' : '' }}>{{ $donviphanphoi->TenDonViPhanPhoi }}</option>

            {{-- <option value="{{ $donviphanphoi->MaDonViPhanPhoi }}">
              {{ $donviphanphoi->TenDonViPhanPhoi }}
            </option> --}}
        @endforeach
      </select>


    <button class="btn btn-success">Sửa</button>

    
</form>




@endsection