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
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong> Mô tả quy trình: </strong></label>
            <div class="col-sm-5">
                <textarea name="MoTaQuyTrinh" cols="55" rows="4" placeholder="Nhập mô tả..."></textarea>
                @if ($errors->has('MoTaQuyTrinh'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MoTaQuyTrinh') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <div class="form-group">
            <label style="display: block" class="col-sm-1,5 col-form-label flex-div">Chọn nguyên vật liệu</label>
            <table class="table table-dark">
                @foreach ($chatlieu as $cl)
                    <tr>
                        <td>{{ $cl->TenChatLieu }}</td>
                        <td>
                            @foreach ($nguyenvatlieu as $nvl)
                                @if ($nvl->MaChatLieu === $cl->MaChatLieu)
                                    <input type="checkbox" class="nguyen-vat-lieu" name="NguyenVatLieu[]"
                                        id="{{ $nvl->MaNguyenVatLieu }}" value="{{$nvl->MaNguyenVatLieu}}">
                                    <label for="{{ $nvl->MaNguyenVatLieu }}">{{ $nvl->TenNguyenVatLieu }}</label>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

        <br>


        <button class="btn btn-success">Thêm</button>


    </form>
@endsection


@push('js')
    {{-- <script>
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
    </script> --}}
@endpush
