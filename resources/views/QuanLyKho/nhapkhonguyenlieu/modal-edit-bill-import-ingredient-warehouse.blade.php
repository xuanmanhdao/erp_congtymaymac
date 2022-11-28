<div class="modal fade" id="modal-edit-bill-import-ingredient-warehouse" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modal-edit-bill-import-ingredient-warehouse-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('nhapnguyenlieu.update', 0) }}" method="post"
            id="form-modal-edit-bill-import-ingredient-warehouse">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-edit-bill-import-ingredient-warehouse-h1">Sửa hóa đơn
                            nhập nguyên vật liệu</h1>
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
                                <label for="">Mã nhập kho nguyên vật liệu</label>
                                <input type="text" placeholder="Điền mã nguyên vật liệu" name="MaNhapKho"
                                    id="Sua-MaNhapKho" readonly required>
                            </div>
                            <span class="error" id="error-sua-ma-nhap-kho" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Thời gian nhập</label>
                                <input type="datetime-local" placeholder="Điền thời gian nhập" id="Sua-ThoiGianNhap"
                                    name="ThoiGianNhap">
                            </div>
                            <span class="error" id="error-sua-thoi-gian-nhap"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Mã nhân viên nhập kho</label>
                                <input type="text" placeholder="Điền nhân viên" name="MaNhanVien" id="Sua-MaNhanVien"
                                    readonly required>
                            </div>
                            <span class="error" id="error-sua-ma-nhan-vien" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="ChonDonViPhanPhoi">Mã đơn vị phân phối</label>
                                <select id="Sua-ChonDonViPhanPhoi" class="form-select"
                                    aria-label="Default select example" name="DonViPhanPhoi"
                                    style="border: 1px solid #545F73; border-radius: 2px;">
                                    <option selected disabled>Chọn kiểu nguyên liệu</option>
                                </select>
                            </div>
                            <span class="error" id="error-sua-chon-ma-don-vi-phan-phoi"
                                style="color: red; display:none"></span>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Mô tả chi tiết</label>
                            <textarea name="GhiChu" id="Sua-GhiChu" required style="width:100%; height: 200px; border: 1px solid #bdc3c7;"></textarea>
                            <span class="error" id="error-sua-ghi-chu" style="color: red; display:none"></span>
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
