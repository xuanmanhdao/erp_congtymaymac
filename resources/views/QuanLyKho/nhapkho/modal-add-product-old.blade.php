<div class="modal fade" id="importProductOldBillImportWarehouse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="importProductOldBillImportWarehouseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <div>
                    <h1 class="modal-title fs-5" id="importProductOldBillImportWarehouseH1">Thêm sản phẩm cũ</h1>
                    <div class="modal-tab">
                        <div class="tab active" data-click="changModalTab" data-label="info">
                            Thông tin
                        </div>
                        <div class="tab" data-click="changModalTab" data-label="detail">
                            Mô tả chi tiết
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-between tab-content tab-active" data-label="tab-info">
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Mã sản phẩm</label>
                            <input type="text" placeholder="Điền mã hàng">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" placeholder="0">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Số lượng</label>
                            <input type="text" placeholder="Điền mã vạch">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Đơn vị tính</label>
                            <input type="text" placeholder="0">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Giá</label>
                            <input type="text" placeholder="Điền tên hàng">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Tồn kho</label>
                            <input type="text" placeholder="0">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Nhóm hàng</label>
                            <input type="text" placeholder="Điền mã NCC">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Trọng lượng</label>
                            <input type="text" placeholder="0">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="modal-input">
                            <label for="">Thương hiệu</label>
                            <input type="text" placeholder="Điền mã NCC">
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center">
                        <div class="">
                            <input type="checkbox" placeholder="" style="margin-right: 5px">
                            <span for="" style="font-size: 14px;
                        line-height: 24px;">Bán
                                trực tiếp</span>
                        </div>
                    </div>
                    <div class="col-lg-12 row mt-5">
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="modal-product-img">
                                <img src="{{ asset('img/quanlykho/product-default.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between tab-content" data-label="tab-detail">
                    <div class="col-lg-12">
                        <p>Mô tả chi tiết</p>
                        <textarea name="" id="" style="width:100%; height: 200px; border: 1px solid #bdc3c7;"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn add-btn">Lưu</button>
                <button type="button" class="btn reset-btn" data-bs-dismiss="modal">Huỷ</button>
            </div>
        </div>
    </div>
</div>
