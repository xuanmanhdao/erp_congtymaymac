<div class="modal fade" id="modal-add-bill-import-ingredient-warehouse" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modal-add-bill-import-ingredient-warehouse-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('nhapnguyenlieu.store') }}" method="post"
            id="form-modal-add-bill-import-ingredient-warehouse">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-add-bill-import-ingredient-warehouse-h1">Thêm hóa đơn
                            nhập nguyên vật liệu mới</h1>
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
                                    id="Them-MaNhapKho" readonly required>
                            </div>
                            <span class="error" id="error-them-ma-nhap-kho" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Thời gian nhập</label>
                                <input type="datetime-local" placeholder="Điền thời gian nhập" id="Them-ThoiGianNhap"
                                    name="ThoiGianNhap">
                            </div>
                            <span class="error" id="error-them-thoi-gian-nhap"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Mã nhân viên nhập kho</label>
                                <input type="text" placeholder="Điền nhân viên" name="MaNhanVien"
                                    id="Them-MaNhanVien" readonly required>
                            </div>
                            <span class="error" id="error-them-ma-nhan-vien" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="ChonDonViPhanPhoi">Mã đơn vị phân phối</label>
                                <select id="Them-ChonDonViPhanPhoi" class="form-select" aria-label="Default select example"
                                    name="DonViPhanPhoi" style="border: 1px solid #545F73; border-radius: 2px;">
                                    <option selected disabled>Chọn kiểu nguyên liệu</option>
                                </select>
                            </div>
                            <span class="error" id="error-them-chon-ma-don-vi-phan-phoi" style="color: red; display:none"></span>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Mô tả chi tiết</label>
                            <textarea name="GhiChu" id="Them-GhiChu" required style="width:100%; height: 200px; border: 1px solid #bdc3c7;"></textarea>
                            <span class="error" id="error-them-ghi-chu" style="color: red; display:none"></span>
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
