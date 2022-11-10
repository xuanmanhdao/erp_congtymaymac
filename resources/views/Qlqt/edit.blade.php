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
</style>
    <h3>Sửa quy trình {{ $data->MaLoaiQuyTrinh }}</h3>
    <br>
    <form action="{{ route('quytrinh.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" name="MaLoaiQuyTrinh" value="{{ $data->MaLoaiQuyTrinh }}">
        {{-- <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Mã loại quy trình: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MaLoaiQuyTrinh" value="{{ $data->MaLoaiQuyTrinh }}">
                @if ($errors->has('MaLoaiQuyTrinh'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MaLoaiQuyTrinh') }}
                    </span>
                @endif
            </div>
        </div> --}}

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Tên quy trình: </strong></label>
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
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Mô tả quy trình: </strong></label>
            <textarea name="MoTaQuyTrinh" cols="55" rows="4">{{ $data->MoTaQuyTrinh }}</textarea>
            @if ($errors->has('MoTaQuyTrinh'))
                <span class="error" style="color: red;">
                    {{ $errors->first('MoTaQuyTrinh') }}
                </span>
            @endif
        </div>
        <br>


        <div class="form-group">
            <label style="display: block">Chọn nguyên vật liệu</label>
            @foreach ($nguyenvatlieu as $nguyenvatlieu)
                <div class="custom-control custom-checkbox custom-control-inline ">
                    <input type="checkbox" name='NguyenVatLieu[]'
                        class="custom-control-input btn btn-warning nguyen-vat-lieu"
                        id="customCheck{{ $nguyenvatlieu->MaNguyenVatLieu }}" value="{{ $nguyenvatlieu->MaNguyenVatLieu }}">
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


        <button class="btn btn-success">Sửa</button>


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
