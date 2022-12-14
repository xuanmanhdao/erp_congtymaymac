@extends('QuanLyKho.layout.master')

@section('ContentPageQuanLyKho')
    <div class="container">
        <div class="box">
            <form action="{{ route('chitietnhapnguyenvatlieu.store') }}" id="form-modal-add-bill-import-ingredient-detail"
                method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="MaNhapKho">Mã nhập nguyên vật liệu</label>
                    <select class="form-control" id="MaNhapKho" name="MaNhapKho"
                        @if ($errors->has('MaNhapKho')) style="border: 2px solid red; border-radius: 2px;" 
                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                        <option selected disabled>Chọn mã nhập</option>
                        @foreach ($arrayNhapKhoNguyenVatLieuEloquent as $nhapKho)
                            <option value="{{ $nhapKho->MaNhapKho }}">{{ $nhapKho->MaNhapKho }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('MaNhapKho'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('MaNhapKho') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="MaNguyenVatLieu">Tên nguyên vật liệu</label>
                    <select class="form-control" id="MaNguyenVatLieu" name="MaNguyenVatLieu"
                        @if ($errors->has('MaNguyenVatLieu')) style="border: 2px solid red; border-radius: 2px;" 
                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                        <option selected disabled>Chọn nguyên liệu</option>
                        @foreach ($arrayNguyenVatLieuEloquent as $nguyenVatLieu)
                            <option value="{{ $nguyenVatLieu->MaNguyenVatLieu }}">{{ $nguyenVatLieu->TenNguyenVatLieu }} - {{ $nguyenVatLieu->MaNguyenVatLieu }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('MaNguyenVatLieu'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('MaNguyenVatLieu') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="SoLuong">Số lượng</label>
                    <input type="number" class="form-control" id="SoLuong" name="SoLuong"
                        @if ($errors->has('SoLuong')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('SoLuong'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('SoLuong') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Gia">Giá nguyên liệu</label>
                    <input type="number" class="form-control" id="Gia" name="Gia"
                        @if ($errors->has('Gia')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('Gia'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('Gia') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="DonViTinh">Đơn vị tính</label>
                    <input type="text" class="form-control" id="DonViTinh" name="DonViTinh"
                        placeholder="Nhập đơn vị tính"
                        @if ($errors->has('DonViTinh')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('DonViTinh'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('DonViTinh') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ThanhTien">Thành tiền</label>
                    <input type="text" class="form-control" id="ThanhTien" name="ThanhTien" placeholder="0 vnđ" readonly
                        @if ($errors->has('ThanhTien')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('ThanhTien'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('ThanhTien') }}
                        </span>
                    @endif
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#SoLuong').change(function() {
                var soLuong = $("#SoLuong").val();
                var gia = $("#Gia").val();
                $('#ThanhTien').val(soLuong * gia + ' vnđ');
            });

            $('#Gia').change(function() {
                var soLuong = $("#SoLuong").val();
                var gia = $("#Gia").val();
                $('#ThanhTien').val(soLuong * gia + ' vnđ');
            });
        });
    </script>
@endpush
