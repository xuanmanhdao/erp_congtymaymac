@extends('layout.master')
@section('content')
    <h3>Thêm kế hoạch</h3>
    <br>
    <form action="{{ route('kehoach.store') }}" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Mã kế hoạch: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MaKeHoach" placeholder="Nhập mã kế hoạch...">
                @if ($errors->has('MaKeHoach'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MaKeHoach') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <label class="col-sm-1,5 col-form-label"><strong> Tên quy trình: </strong></label>
        <div class="col-sm-5">
        <select name="MaLoaiQuyTrinh" class="form-control select">
            <option selected>Chọn quy trình</option>
            @foreach ($quytrinh as $quytrinh)
                <option value="{{ $quytrinh->MaLoaiQuyTrinh }}">
                    {{ $quytrinh->TenQuyTrinh }}
                </option>
            @endforeach
        </select>
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


        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Ngày bắt đầu: </strong></label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="NgayBatDau">
                @if ($errors->has('NgayBatDau'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('NgayBatDau') }}
                    </span>
                @endif

            </div>
        </div>

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Ngày kết thúc: </strong></label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="NgayKetThuc">
                @if ($errors->has('NgayKetThuc'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('NgayKetThuc') }}
                    </span>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Nội dung kế hoạch: </strong></label>
            <textarea name="NoiDungKeHoach" cols="55" rows="4" placeholder="Nhập nội dung..."></textarea>
            @if ($errors->has('NoiDungKeHoach'))
                <span class="error" style="color: red;">
                    {{ $errors->first('NoiDungKeHoach') }}
                </span>
            @endif
        </div>

        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label"><strong> Ghi chú: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="GhiChu" placeholder="Ghi chú...">
                @if ($errors->has('GhiChu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('GhiChu') }}
                    </span>
                @endif
            </div>
        </div>

        <button class="btn btn-success">Thêm</button>


    </form>
@endsection
