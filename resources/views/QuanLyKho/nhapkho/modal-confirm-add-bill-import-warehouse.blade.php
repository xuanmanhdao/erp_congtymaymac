<div class="modal fade" id="confirmAddNewBillImportWarehouse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmAddNewBillImportWarehouseLable" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="modal-confirm-add-bill-import-warehouse">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="confirmAddNewBillImportWarehouseH1">Xác nhận!</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cần lựa chọn nhập hóa đơn đã tồn tại hoặc chưa!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn add-btn" id="btn-confirm-add-bill-new">Nhập hóa đơn chưa tồn
                        tại</button>
                    <a class="btn reset-btn" href="{{route('chitietnhapsanpham.create')}}" id="btn-confirm-add-bill-old">Nhập hóa đơn đã tồn
                        tại</a>
                </div>
            </div>
        </form>
    </div>
</div>
