<div class="modal fade" id="importProductNewBillImportWarehouse" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="importProductNewBillImportWarehouseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('sanpham.store') }}" id="form-modal-add-product-new" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <div>
                        <h1 class="modal-title fs-5" id="importProductNewBillImportWarehouseH1">Thêm sản phẩm mới</h1>
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
                                <label for="">Mã sản phẩm</label>
                                <input type="text" placeholder="Điền mã hàng" name="MaSanPham" id="MaSanPham"
                                    required @if ($errors->has('MaSanPham')) style="border: 2px solid red;" @endif>
                            </div>
                            {{-- @if ($errors->has('MaSanPham')) --}}
                                <span class="error error-ma-san-pham" style="color: red; display:none">
                                    {{ $errors->first('MaSanPham') }}
                                </span>
                            {{-- @endif --}}
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" placeholder="Điền tên sản phẩm" name="TenSanPham" id="TenSanPham"
                                    required @if ($errors->has('TenSanPham')) style="border: 2px solid red;" @endif>
                            </div>
                            {{-- @if ($errors->has('TenSanPham')) --}}
                                <span class="error error-ten-san-pham" style="color: red; display:none">
                                    {{ $errors->first('TenSanPham') }}
                                </span>
                            {{-- @endif --}}
                        </div>
                        {{-- <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Số lượng</label>
                                <input type="text" placeholder="Điền mã vạch" name="SoLuong" id="SoLuong">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label for="">Đơn vị tính</label>
                                <input type="text" placeholder="0" name="DonViTinh" id="DonViTinh">
                            </div>
                        </div> --}}
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="">Mã loại sản phẩm</label>
                                <select id="form-add-select-loai" class="form-select"
                                    aria-label="Default select example" name="MaLoai"
                                    @if ($errors->has('MaLoai')) style="border: 2px solid red; border-radius: 2px;" 
                                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                                    <option selected disabled>Chọn loại sản phẩm</option>
                                </select>
                            </div>
                            {{-- @if ($errors->has('MaLoai')) --}}
                                <span class="error error-ma-loai-san-pham" style="color: red; display:none">
                                    {{ $errors->first('MaLoai') }}
                                </span>
                            {{-- @endif --}}
                        </div>
                        <div class="col-lg-5">
                            <div class="modal-input">
                                <label class="col-lg-4" for="">Mã loại quy trình</label>
                                <select id="form-add-select-loai-quy-trinh" class="form-select"
                                    aria-label="Default select example" name="MaLoaiQuyTrinh"
                                    @if ($errors->has('MaLoaiQuyTrinh')) style="border: 2px solid red; border-radius: 2px;" 
                                    @else style="border: 1px solid #545F73; border-radius: 2px;" @endif>
                                    <option selected disabled>Chọn loại quy trình</option>
                                </select>
                            </div>
                            {{-- @if ($errors->has('MaLoaiQuyTrinh')) --}}
                                <span class="error error-ma-loai-quy-trinh" style="color: red; display:none">
                                    {{ $errors->first('MaLoaiQuyTrinh') }}
                                </span>
                            {{-- @endif --}}
                        </div>
                        <div class="col-lg-12 row mt-5">
                            <div class="col-lg-2">
                                <input required type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL1(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh1"
                                        src="{{ asset('img/quanlykho/product-default.svg') }}"alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL2(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh2" src="{{ asset('img/quanlykho/product-default.svg') }}"
                                        alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL3(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh3" src="{{ asset('img/quanlykho/product-default.svg') }}"
                                        alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL4(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh4" src="{{ asset('img/quanlykho/product-default.svg') }}"
                                        alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL5(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh5" src="{{ asset('img/quanlykho/product-default.svg') }}"
                                        alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="HinhAnh[]" placeholder="Chọn hình ảnh"
                                    onchange="readURL6(this);"
                                    accept="image/png, image/gif, image/jpeg, image/svg, image/jpg"
                                    @if ($errors->has('HinhAnh')) style="border: 2px solid red;" @endif>
                                <div class="modal-product-img">
                                    <img id="HinhAnh6" src="{{ asset('img/quanlykho/product-default.svg') }}"
                                        alt="">
                                </div>
                                {{-- @if ($errors->has('HinhAnh')) --}}
                                    <span class="error error-hinh-anh" style="color: red; display:none">
                                        {{ $errors->first('HinhAnh') }}
                                    </span>
                                {{-- @endif --}}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Mô tả chi tiết</label>
                            <textarea name="MoTaSanPham" id="MoTaSanPham"
                                @if ($errors->has('MoTaSanPham')) style="width:100%; height: 200px; border: 2px solid red; border-radius: 2px;" 
                                @else style="width:100%; height: 200px; border: 1px solid #bdc3c7;" @endif
                                required></textarea>
                            {{-- @if ($errors->has('MoTaSanPham')) --}}
                                <span class="error error-mo-ta-san-pham" style="color: red; display:none">
                                    {{ $errors->first('MoTaSanPham') }}
                                </span>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-save-product-new" class="btn add-btn">Lưu</button>
                    <button type="button" class="btn reset-btn" data-bs-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </form>

    </div>
</div>
