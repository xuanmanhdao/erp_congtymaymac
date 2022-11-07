@extends('layout.master')
@section('content')
    <h3>Thêm kế hoạch</h3>
    <br>
    <form action="{{ route('nguyenvatlieu.store') }}" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Mã nguyên vật liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MaNguyenVatLieu" placeholder="Nhập mã nguyên vật liệu...">
                @if ($errors->has('MaNguyenVatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MaNguyenVatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Tên nguyên vật liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="TenNguyenVatLieu">
                @if ($errors->has('TenNguyenVatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('TenNguyenVatLieu') }}
                    </span>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Số lượng: </strong></label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="SoLuong">
                @if ($errors->has('SoLuong'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('SoLuong') }}
                    </span>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Đơn vị tính: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="DonViTinh" placeholder="Đơn vị tính...">
                @if ($errors->has('DonViTinh'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('DonViTinh') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <label class="col-sm-1,5 col-form-label"><strong> Tên xưởng: </strong></label>
        <div class="col-sm-5">
        <select name="MaXuong" class="form-control select">
            <option selected>Chọn loại xưởng</option>
            @foreach ($xuong as $xuong)
                <option value="{{ $xuong->MaXuong }}">
                    {{ $xuong->TenXuong }}
                </option>
            @endforeach
        </select>
        </div>
        <br>

        <label class="col-sm-1,5 col-form-label"><strong> Đơn vị phân phối: </strong></label>
        <div class="col-sm-5">
        <select name="MaDonViPhanPhoi" class="form-control select">
            <option selected>Chọn đơn vị</option>
            @foreach ($donviphanphoi as $donviphanphoi)
                <option value="{{ $donviphanphoi->MaDonViPhanPhoi }}">
                    {{ $donviphanphoi->TenDonViPhanPhoi }}
                </option>
            @endforeach
        </select>
        </div>
        <br>

        <button class="btn btn-success">Thêm</button>


    </form>
@endsection
