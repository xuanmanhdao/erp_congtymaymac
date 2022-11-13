<div class="modal fade" id="importTypeProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="importProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('loaisanpham.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="importProductLabel">Thêm loại sản phẩm</h1>
                        <div class="modal-tab">
                            <div class="tab active" data-click="changModalTab" data-label="info">
                                Thông tin
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-between tab-content tab-active" data-label="tab-info">
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Mã loại</label>
                                <input type="text" placeholder="Điền mã loại sản phẩm" name="MaLoai"
                                    @if ($errors->has('MaLoai')) style="border: 2px solid red;" @endif>
                            </div>
                            @if ($errors->has('MaLoai'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('MaLoai') }}
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Tên loại</label>
                                <input type="text" placeholder="Điền tên loại sản phẩm" name="TenLoai"
                                    @if ($errors->has('TenLoai')) style="border: 2px solid red;" @endif>
                            </div>
                            @if ($errors->has('TenLoai'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('TenLoai') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Mã màu</label>
                                <input type="color" class="form-control form-control-color" value="#563d7c"
                                    title="Chọn màu" style="border: 1px solid #545F73; border-radius: 2px;"
                                    name="MauSac">
                            </div>
                            @if ($errors->has('MauSac'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('MauSac') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="">Vị trí xếp</label>
                                <select class="form-select" aria-label="Default select example" name="ViTriXep"
                                    @if ($errors->has('ViTriXep')) style="border: 2px solid red; border-radius: 2px;" 
                                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                                    <option selected disabled>Chọn kho</option>
                                    <option value="Kho số 1">Kho số 1</option>
                                    <option value="Kho số 2">Kho số 2</option>
                                    <option value="Kho số 3">Kho số 3</option>
                                    <option value="Kho số 4">Kho số 4</option>
                                    <option value="Kho số 5">Kho số 5</option>
                                    <option value="Kho số 6">Kho số 6</option>
                                </select>
                            </div>
                            @if ($errors->has('ViTriXep'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('ViTriXep') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn add-btn">Lưu</button>
                    <button type="button" class="btn reset-btn" data-bs-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </form>
    </div>
</div>
