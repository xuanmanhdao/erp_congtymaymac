<div class="modal fade" id="modal-add-ingredient-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-add-ingredient-new-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('nguyenvatlieu.store') }}" method="post" id="form-modal-add-ingredient-new">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-add-ingredient-new-h1">Thêm nguyên vật liệu mới</h1>
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
                                <label for="">Mã nguyên vật liệu</label>
                                <input type="text" placeholder="Điền mã nguyên vật liệu" name="MaNguyenVatLieu"
                                    id="Them-MaNguyenVatLieu" required>
                            </div>
                            <span class="error" id="error-them-ma-nguyen-vat-lieu"
                                style="color: red; display: none;"></span>
                        </div>

                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Tên nguyên vật liệu</label>
                                <input type="text" placeholder="Điền tên nguyên vật liệu" id="Them-TenNguyenVatLieu"
                                    name="TenNguyenVatLieu" required>
                            </div>
                            <span class="error" id="error-them-ten-nguyen-vat-lieu"
                                style="color: red; display: none;"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="ChonMaChatLieu">Kiểu nguyên liệu</label>
                                <select id="Them-ChonMaChatLieu" class="form-select" aria-label="Default select example"
                                    name="MaChatLieu" style="border: 1px solid #545F73; border-radius: 2px;">
                                    <option selected disabled>Chọn kiểu nguyên liệu</option>
                                </select>
                            </div>
                            <span class="error" id="error-chon-ma-chat-lieu" style="color: red; display:none"></span>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Mô tả chi tiết</label>
                            <textarea name="MoTaNguyenVatLieu" id="Them-MoTaNguyenVatLieu" required
                                style="width:100%; height: 200px; border: 1px solid #bdc3c7;"></textarea>
                            <span class="error" id="error-them-mo-ta-nguyen-vat-lieu"
                                style="color: red; display:none"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-save-ingredient-new" class="btn add-btn">Lưu</button>
                    <button type="button" class="btn reset-btn" data-bs-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </form>
    </div>
</div>
