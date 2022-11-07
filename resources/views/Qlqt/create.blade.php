@extends('layout.master')
@section('content')

<h3>Thêm quy trình</h3>
<br>
<form action="{{ route('quytrinh.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label"><strong> Mã loại quy trình: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="MaLoaiQuyTrinh" placeholder="Nhập mã quy trình...">
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
          <input type="text" class="form-control" name="TenQuyTrinh">
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
        <textarea name="MoTaQuyTrinh" cols="55" rows="4" placeholder="Nhập mô tả..."></textarea>
        @if ($errors->has('MoTaQuyTrinh'))
        <span class="error" style="color: red;">
             {{ $errors->first('MoTaQuyTrinh') }}
        </span>
        @endif
    </div>
    <br>

    Nguyên vật liệu
      <select name="MaNguyenVatLieu" class="form-control select">
        <option selected>Chọn nguyên vật liệu</option>
        @foreach ($nguyenvatlieu as $nguyenvatlieu )
            <option value="{{ $nguyenvatlieu->MaNguyenVatLieu }}">
              {{ $nguyenvatlieu->TenNguyenVatLieu }}
            </option>
        @endforeach
      </select>


    <button class="btn btn-success">Thêm</button>

    
</form>




@endsection