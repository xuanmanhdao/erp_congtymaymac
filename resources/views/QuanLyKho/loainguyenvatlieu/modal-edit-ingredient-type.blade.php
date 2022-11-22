<div class="modal fade" id="modal-edit-ingredient-type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-edit-ingredient-type-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('loainguyenvatlieu.update', 0) }}" method="post" id="form-modal-edit-ingredient-type">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-edit-ingredient-type-h1">Sửa kiểu nguyên vật liệu</h1>
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
                                <label for="">Mã kiểu nguyên liệu</label>
                                <input type="text" placeholder="Điền mã kiểu nguyên liệu" name="MaChatLieu"
                                    id="SuaMaChatLieu" readonly required>
                            </div>
                            <span class="error" id="error-sua-ma-kieu-chat-lieu"
                                style="color: red; display: none;"></span>

                        </div>

                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Tên kiểu nguyên liệu</label>
                                <input type="text" placeholder="Điền tên kiểu nguyên liệu" id="SuaTenChatLieu"
                                    name="TenChatLieu" required>
                            </div>

                            <span class="error" id="error-sua-ten-kieu-chat-lieu"
                                style="color: red; display: none;"></span>

                        </div>
                        <div class="col-lg-12">
                            <label for="">Mô tả chi tiết</label>
                            <textarea name="MoTaChatLieu" id="SuaMoTaChatLieu" id="MoTaChatLieu" required
                                style="width:100%; height: 200px; border: 1px solid #bdc3c7;"></textarea>

                            <span class="error" id="error-sua-mo-ta-kieu-chat-lieu"
                                style="color: red; display:none"></span>
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
