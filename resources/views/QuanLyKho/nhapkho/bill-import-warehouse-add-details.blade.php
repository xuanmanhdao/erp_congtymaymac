@extends('QuanLyKho.layout.master')

@section('ContentPageQuanLyKho')
    <div class="container">
        <div class="box">
            <form action="{{ route('chitietnhapsanpham.store') }}" id="form-modal-add-product-new" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="MaXuatKho">Mã nhập sản phẩm</label>
                    <select class="form-control" id="MaXuatKho" name="MaXuatKho"
                        @if ($errors->has('MaXuatKho')) style="border: 2px solid red; border-radius: 2px;" 
                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                        <option selected disabled>Chọn mã nhập</option>
                        @foreach ($arrayXuatKhoEloquent as $xuatKho)
                            <option value="{{ $xuatKho->MaXuatKho }}">{{ $xuatKho->MaXuatKho }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('MaXuatKho'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('MaXuatKho') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="MaSanPham">Mã sản phẩm</label>
                    <select class="form-control" id="MaSanPham" name="MaSanPham"
                        @if ($errors->has('MaSanPham')) style="border: 2px solid red; border-radius: 2px;" 
                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                        <option selected disabled>Chọn mã sản phẩm</option>
                        @foreach ($arraySanPhamEloquent as $sanPham)
                            <option value="{{ $sanPham->MaSanPham }}">{{ $sanPham->MaSanPham }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('MaSanPham'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('MaSanPham') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="SoLuong">Số lượng</label>
                    <input type="number" class="form-control" id="SoLuong" name="SoLuong"
                        @if ($errors->has('MaNhanVien')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('SoLuong'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('SoLuong') }}
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
                    <label for="Gia">Giá sản phẩm</label>
                    <input type="number" class="form-control" id="Gia" name="Gia"
                        @if ($errors->has('MaNhanVien')) style="border: 2px solid red;" @endif>
                    @if ($errors->has('Gia'))
                        <span class="error" style="color: red;">
                            {{ $errors->first('Gia') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ThanhTien">Thành tiền</label>
                    <input type="number" class="form-control" id="ThanhTien" name="ThanhTien" readonly
                        @if ($errors->has('MaNhanVien')) style="border: 2px solid red;" @endif>
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
                $('#ThanhTien').val(soLuong * gia);
            });

            $('#Gia').change(function() {
                var soLuong = $("#SoLuong").val();
                var gia = $("#Gia").val();
                $('#ThanhTien').val(soLuong * gia);
            });
        });
    </script>
@endpush
