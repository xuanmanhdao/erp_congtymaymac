<div class="modal fade" id="modal-add-supplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-add-supplier-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('donviphanphoi.store') }}" method="post" id="form-modal-add-supplier">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-add-supplier-h1">Thêm đơn vị phân phối</h1>
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
                                <label for="">Mã đơn vị phân phối</label>
                                <input type="text" placeholder="Điền mã đơn vị phân phối" name="MaDonViPhanPhoi"
                                    id="Them-MaDonViPhanPhoi" required>
                            </div>
                            <span class="error" id="error-them-ma-don-vi-phan-phoi"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Tên đơn vị phân phối</label>
                                <input type="text" placeholder="Điền tên đơn vị phân phối" id="Them-TenDonViPhanPhoi"
                                    name="TenDonViPhanPhoi" required>
                            </div>
                            <span class="error" id="error-them-ten-don-vi-phan-phoi"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Địa chỉ</label>
                                <input type="text" placeholder="Điền địa chỉ" id="Them-DiaChi" name="DiaChi"
                                    required>
                            </div>
                            <span class="error" id="error-them-dia-chi" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Số điện thoại</label>
                                <input type="text" placeholder="Điền số điện thoại" id="Them-SoDienThoai"
                                    name="SoDienThoai" required maxlength="10">
                            </div>
                            <span class="error" id="error-them-so-dien-thoai"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Fax</label>
                                <input type="text" placeholder="Điền Fax" id="Them-Fax" name="Fax" required>
                            </div>
                            <span class="error" id="error-them-fax" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Email</label>
                                <input type="text" placeholder="Điền Email" id="Them-Email" name="Email" required>
                            </div>
                            <span class="error" id="error-them-email" style="color: red; display: none;"></span>
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
