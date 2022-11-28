<div class="modal fade" id="modal-confirm-ingredient-exist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-confirm-ingredient-exist-Lable" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="form-modal-confirm-ingredient-exist">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="modal-confirm-ingredient-exist-H1">Xác nhận!</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cần lựa chọn nhập nguyên vật liệu đã tồn tại hoặc chưa!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn add-btn" id="btn-confirm-add-ingredient-new">Nguyên vật liệu chưa tồn tại</button>
                    <button type="button" class="btn reset-btn" id="btn-confirm-add-ingredient-old">Nguyên vật liệu đã tồn tại</button>
                </div>
            </div>
        </form>
    </div>
</div>
