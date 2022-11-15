<div class="modal fade" id="importAddBillImportWarehouse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="importAddBillImportWarehouseLable" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('nhapsanpham.store') }}" id="form-modal-add-bill-import-warehouse" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="importAddBillImportWarehouseH1">Thêm hóa đơn nhập sản phẩm</h1>
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
                                <label for="">Mã nhập sản phẩm</label>
                                <input type="text" id="MaXuatKho" placeholder="Điền mã nhập sản phẩm" name="MaXuatKho" readonly
                                    @if ($errors->has('MaXuatKho')) style="border: 2px solid red;" @endif>
                            </div>
                            @if ($errors->has('MaXuatKho'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('MaXuatKho') }}
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Thời gian nhập</label>
                                <input type="datetime-local" placeholder="Điền tên loại sản phẩm" id="ThoiGianXuat" name="ThoiGianXuat"
                                    @if ($errors->has('ThoiGianXuat')) style="border: 2px solid red;" @endif>
                            </div>
                            @if ($errors->has('ThoiGianXuat'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('ThoiGianXuat') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Mã nhân viên</label>
                                <input type="text" id="MaNhanVien" placeholder="Điền mã nhân viên" name="MaNhanVien" readonly
                                    @if ($errors->has('MaNhanVien')) style="border: 2px solid red;" @endif>
                            </div>
                            @if ($errors->has('MaNhanVien'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('MaNhanVien') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="">Mã xưởng</label>
                                <select id="form-add-select-xuong" class="form-select" aria-label="Default select example" name="MaXuong"
                                    @if ($errors->has('MaXuong')) style="border: 2px solid red; border-radius: 2px;" 
                                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                                    <option selected disabled>Chọn xưởng</option>
                                </select>
                            </div>
                            @if ($errors->has('MaXuong'))
                                <span class="error" style="color: red;">
                                    {{ $errors->first('MaXuong') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <p>Mô tả chi tiết</p>
                            <textarea name="GhiChu" id="GhiChu"
                                @if ($errors->has('GhiChu')) style="width:100%; height: 200px; border: 2px solid red; border-radius: 2px;" 
                                @else style="width:100%; height: 200px; border: 1px solid #bdc3c7;" @endif></textarea>
                        </div>
                        @if ($errors->has('GhiChu'))
                            <span class="error" style="color: red;">
                                {{ $errors->first('GhiChu') }}
                            </span>
                        @endif
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
