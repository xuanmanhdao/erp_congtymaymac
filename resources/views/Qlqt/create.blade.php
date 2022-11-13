@extends('layout.master')
@section('content')


<h3>Thêm quy trình</h3>
    <form action="{{ route('quytrinh.store') }}" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã loại quy trình: </strong></label>
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
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Tên quy trình: </strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="TenQuyTrinh">
          @if ($errors->has('TenQuyTrinh'))
          <span class="error" style="color: red;">
               {{ $errors->first('TenQuyTrinh') }}
          </span>
          @endif
          

    <div class="form-group row">
        <label class="col-sm-1,5 col-form-label flex-div"><strong> Mô tả quy trình: </strong></label>
        <textarea name="MoTaQuyTrinh" cols="55" rows="4" placeholder="Nhập mô tả..."></textarea>
        @if ($errors->has('MoTaQuyTrinh'))
        <span class="error" style="color: red;">
             {{ $errors->first('MoTaQuyTrinh') }}
        </span>
        @endif
    </div>
    <br>

    <div class="form-group row">
    <label class="col-sm-1,5 col-form-label flex-div"><strong> Nguyên vật liệu: </strong></label>
    <div class="col-sm-5">   
    <select name="MaNguyenVatLieu" class="form-control select ">

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Mô tả quy trình: </strong></label>
            <textarea name="MoTaQuyTrinh" cols="55" rows="4" placeholder="Nhập mô tả..."></textarea>
            @if ($errors->has('MoTaQuyTrinh'))
                <span class="error" style="color: red;">
                    {{ $errors->first('MoTaQuyTrinh') }}
                </span>
            @endif
        </div>
        <br>

        {{-- 
    Nguyên vật liệu
      <select name="MaNguyenVatLieu" class="form-control select">
>>>>>>> 1287c1479b8d2fe6eb3a3957d1aa8584adb639d0
        <option selected>Chọn nguyên vật liệu</option>
        @foreach ($nguyenvatlieu as $nguyenvatlieu)
            <option value="{{ $nguyenvatlieu->MaNguyenVatLieu }}">
              {{ $nguyenvatlieu->TenNguyenVatLieu }}
            </option>
        @endforeach
      </select>
<<<<<<< HEAD
    </div>
  </div>

=======
       --}}


        <div class="form-group">
            <label style="display: block">Chọn nguyên vật liệu</label>
            @foreach ($nguyenvatlieu as $nguyenvatlieu)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name='NguyenVatLieu[]'
                        class="custom-control-input btn btn-warning nguyen-vat-lieu"
                        id="customCheck{{ $nguyenvatlieu->MaNguyenVatLieu }}"
                        value="{{ $nguyenvatlieu->MaNguyenVatLieu }}">
                    <label class="custom-control-label"
                        for="customCheck{{ $nguyenvatlieu->MaNguyenVatLieu }}">{{ $nguyenvatlieu->TenNguyenVatLieu }}</label>
                </div>
            @endforeach
            @if ($errors->has('NguyenVatLieu'))
                <div class="alert alert-danger">
                    {{ $errors->first('NguyenVatLieu') }}
                </div>
            @endif
        </div>

        <button class="btn btn-success">Thêm</button>


    </form>
@endsection

@push('js')
    <script>
        const nguyenVatLieuElement = $('.nguyen-vat-lieu');
        let valueNguyenVatLieuDaNhap;
        var changed_status = true; // thiết lập trạng thái changed ban đầu là true (là được load data) ok 
        $(nguyenVatLieuElement).change(function() {
            changed_status = true; // khi chạy vào hàm này sẽ set changed là true = được load data, cũng như vậy
            var nguyenVatLieu = [];
            $(nguyenVatLieuElement).each(function() {
                if ($(this).is(":checked")) {
                    nguyenVatLieu.push($(this).val());
                }
            });
            nguyenVatLieu = nguyenVatLieu.toString();
            console.log('Bạn đã chọn nguyên vật liệu: ' + nguyenVatLieu);
            valueNguyenVatLieuDaNhap = nguyenVatLieu;
        });
    </script>
@endpush
