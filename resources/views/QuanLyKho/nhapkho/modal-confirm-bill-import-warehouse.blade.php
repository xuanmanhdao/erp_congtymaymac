<div class="modal fade" id="confirmAddBillImportWarehouse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmAddBillImportWarehouseLable" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('nhapsanpham.store') }}" id="form-modal-confirm-bill-import-warehouse" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="confirmAddBillImportWarehouseH1">Đã thêm mới hóa đơn nhập thành
                            công!</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cần lựa chọn nhập sản phẩm đã tồn tại hoặc chưa!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn add-btn" id="btn-confirm-add-product-new">Sản phẩm chưa tồn tại</button>
                    <button type="button" class="btn reset-btn" id="btn-confirm-add-product-old">Sản phẩm đã tồn tại</button>
                </div>
            </div>
        </form>
    </div>
</div>
