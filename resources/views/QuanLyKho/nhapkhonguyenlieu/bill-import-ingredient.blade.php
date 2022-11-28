@extends('QuanLyKho.layout.master')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.6/sb-1.3.3/sl-1.4.0/datatables.min.css" />
@endpush
@section('ContentPageQuanLyKho')
    <div class="container">
        <div class="box">
            <div class="control-table">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="control-info">
                    <div class="total-products">
                        <p class="h6" id="total-bill-improt-ingredient-warehouse">Có tất cả 0 sản phẩm</p>
                    </div>
                    <div class="progress">
                        <div id="progressbar-bill-improt-ingredient-warehouse" class="progress-bar" role="progressbar"
                            aria-label="Success example" style="width: 10%" aria-valuenow="1" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p id="showing-bill-improt-ingredient-warehouse">Đang hiển thị bản ghi từ 1 - 10</p>
                    </div>
                </div>
                <div class="control-actions">
                    <div class="btn add-btn" data-bs-toggle="modal" data-bs-target="#modal-confirm-ingredient-exist">
                        <img src="{{ asset('img/quanlykho/add.svg') }} " alt="">
                        <span class="label">Thêm hóa đơn nhập
                            nguyên liệu mới</span>
                    </div>
                </div>
            </div>
            <div class="custom-table table-responsive">
                <div class="table-content">
                    <table class="table" id="table-bill-import-ingredient-warehouse">
                        <thead class="thead">
                            <th>STT</th>
                            <th>Mã nhập nguyên liệu</th>
                            <th>Thời gian nhập</th>
                            <th>Tổng giá</th>
                            <th>Ghi chú</th>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Tên đơn vị phân phối</th>
                            <th>Hành động</th>
                            <th>Chi tiết</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.6/sb-1.3.3/sl-1.4.0/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            function processInfo(info) {
                console.log(info);
                var totalRecords = info.recordsTotal;
                var currentPage = info.page + 1;
                var perPage = info.length;
                var startRecord = info.start + 1;
                var endRecord = info.end;
                var widthProgressBar = (totalRecords === 0) ? 0 : (((currentPage * perPage) / totalRecords) * 100);
                var ariaValueNowProgressBar = (totalRecords === 0) ? 0 : (((currentPage * perPage) / totalRecords) *
                    100);

                $('#total-bill-improt-ingredient-warehouse').text(
                    `Có tất cả ${totalRecords} hóa đơn nhập sản phẩm`);
                $('#showing-bill-improt-ingredient-warehouse').text(
                    `Đang hiển thị bản ghi từ ${startRecord} - ${endRecord}`);
                $('#progressbar-bill-improt-ingredient-warehouse').attr("style", `width: ${widthProgressBar}%`);
                $('#progressbar-bill-improt-ingredient-warehouse').attr("aria-valuenow",
                    `${ariaValueNowProgressBar}`);
            }
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            var table = $('#table-bill-import-ingredient-warehouse').DataTable({
                dom: 'Blfrtip',
                select: true,
                buttons: [
                    $.extend(true, {}, buttonCommon, {
                        extend: 'copyHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'csvHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'print'
                    }),
                    'colvis'
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('nhapnguyenlieu.ajax.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "MaNhapKho"
                    },
                    {
                        "data": "ThoiGianNhap"
                    },
                    {
                        "data": "TongGia"
                    },
                    {
                        "data": "GhiChu"
                    },
                    {
                        "data": "MaNhanVien"
                    },
                    {
                        "data": "TenNhanVien"
                    },
                    {
                        "data": "TenDonViPhanPhoi"
                    },
                    {
                        data: 'btnEdit',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `<span class="btn btn-edit-bill-import-ingredient-wareshouse format-btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-bill-import-ingredient-warehouse"
                                            data-url="${data}">Sửa</span>`;
                        }
                    },
                    {
                        data: 'btnDetail',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `<a class="btn btn-show-detail-bill-import-warehouse format-btn-custom" href="${data}">Xem</a>`;
                        }
                    }
                ],
                columnDefs: [{
                    className: "not-export",
                    "targets": [8, 9],
                }],
                autoWidth: false,
                drawCallback: function() {
                    processInfo(this.api().page.info());
                    $('.btn-edit-bill-import-ingredient-wareshouse').click(function() {
                        var url = $(this).attr('data-url');
                        console.log(url);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        $.ajax({
                            url: url,
                            method: "get",
                            dataType: 'json',
                            success: function(response) {
                                console.log(response.arrayNhapKho);
                                $('#form-modal-edit-bill-import-ingredient-warehouse')
                                    .attr(
                                        'action',
                                        '{{ asset('quan-ly-kho/nhap-nguyen-vat-lieu/update/') }}/' +
                                        response.arrayNhapKho.MaNhapKho);
                                $('#Sua-MaNhapKho').val(response.arrayNhapKho
                                    .MaNhapKho);
                                $('#Sua-MaNhanVien').val(response.arrayNhapKho
                                    .MaNhanVien);
                                $('#Sua-ThoiGianNhap').val(response.arrayNhapKho
                                    .ThoiGianNhap);
                                $('#Sua-GhiChu').val(response.arrayNhapKho
                                    .GhiChu);
                                for (var i = 0; i < response.arrayDonViPhanPhoi
                                    .length; i++) {

                                    var selected = (response.arrayDonViPhanPhoi[i]
                                        .MaDonViPhanPhoi === response
                                        .arrayNhapKho
                                        .MaDonViPhanPhoi) ? 'selected' : '';

                                    $("#Sua-ChonDonViPhanPhoi").append(
                                        '<option value=' + response
                                        .arrayDonViPhanPhoi[i].MaDonViPhanPhoi +
                                        ' ' + selected + '>' + response
                                        .arrayDonViPhanPhoi[i]
                                        .TenDonViPhanPhoi +
                                        '</option>');

                                }
                            },
                            error: function() {
                                toastr.error(
                                    "Lỗi không thể lấy dữ liệu hóa đơn cần sửa!"
                                );
                            }
                        });
                    });
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#btn-confirm-add-ingredient-new').click(function() {
                $("#modal-confirm-ingredient-exist").modal('hide');
                $("#modal-add-ingredient-new").modal('show');
                $.ajax({
                    url: "{{ route('nguyenvatlieu.create') }}",
                    method: "get",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        for (var i = 0; i < response.arrayKieuNguyenLieu.length; i++) {
                            $("#Them-ChonMaChatLieu").append(
                                '<option value=' + response.arrayKieuNguyenLieu[i]
                                .MaChatLieu +
                                '>' + response.arrayKieuNguyenLieu[i].TenChatLieu +
                                '</option>');
                        }
                    },
                    error: function() {
                        toastr.error("Lỗi không thể tạo nguyên liệu mới!");
                    }
                });
            });

            $("#form-modal-add-ingredient-new").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr("action");

                var idMaNguyenLieu = $("#Them-MaNguyenVatLieu");
                var idTenNguyenLieu = $("#Them-TenNguyenVatLieu");
                var idMaKieuNguyenLieu = $("#Them-ChonMaChatLieu");
                var idMoTaNguyenLieu = $("#Them-MoTaNguyenVatLieu");

                var idSpanErrorMaNguyenLieu = $("#error-them-ma-nguyen-vat-lieu");
                var idSpanErrorTenNguyenLieu = $("#error-them-ten-nguyen-vat-lieu");
                var idSpanErrorMaKieuNguyenLieu = $("#error-chon-ma-chat-lieu");
                var idSpanErrorMoTaNguyenLieu = $("#error-them-mo-ta-nguyen-vat-lieu");

                function resetStyleError() {
                    idMaNguyenLieu.css('border', '1px solid #545F73');
                    idTenNguyenLieu.css('border', '1px solid #545F73');
                    idMaKieuNguyenLieu.css('border', '1px solid #545F73');
                    idMoTaNguyenLieu.css({
                        'width': '100%',
                        'height': '200px',
                        'border': '1px solid #bdc3c7'
                    });

                    idSpanErrorMaNguyenLieu.css('display', 'none');
                    idSpanErrorTenNguyenLieu.css('display', 'none');
                    idSpanErrorMaKieuNguyenLieu.css('display', 'none');
                    idSpanErrorMoTaNguyenLieu.css('display', 'none');


                    console.log("Vào hàm reset rồi");
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        MaNguyenVatLieu: idMaNguyenLieu.val(),
                        TenNguyenVatLieu: idTenNguyenLieu.val(),
                        MaChatLieu: idMaKieuNguyenLieu.val(),
                        MoTaNguyenVatLieu: idMoTaNguyenLieu.val(),

                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#modal-add-ingredient-new").modal('hide');
                        $("#modal-confirm-bill-import-ingredient-exist").modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Thêm mới nguyên vật liệu thất bại!");
                        var data = jqXHR.responseJSON;
                        resetStyleError();

                        if ($.isEmptyObject(data.errors) == false) {
                            console.log(data);
                            $.each(data.errors, function(key, value) {
                                if (key === "MaNguyenVatLieu") {
                                    idSpanErrorMaNguyenLieu.css('display', 'block');
                                    idSpanErrorMaNguyenLieu.html(value);
                                    idMaNguyenLieu.css('border', '2px solid red');
                                }
                                if (key === "TenNguyenVatLieu") {
                                    idSpanErrorTenNguyenLieu.css('display', 'block');
                                    idSpanErrorTenNguyenLieu.html(value);
                                    idTenNguyenLieu.css('border', '2px solid red');
                                }
                                if (key === "MaChatLieu") {
                                    idSpanErrorMaKieuNguyenLieu.css('display', 'block');
                                    idSpanErrorMaKieuNguyenLieu.html(value);
                                    idMaKieuNguyenLieu.css('border', '2px solid red');
                                }
                                if (key === "MoTaNguyenVatLieu") {
                                    idSpanErrorMoTaNguyenLieu.css('display', 'block');
                                    idSpanErrorMoTaNguyenLieu.html(value);
                                    idMoTaNguyenLieu.css({
                                        'width': '100%',
                                        'height': '200px',
                                        'border': '2px solid red',
                                        'border-radius': '2px'
                                    });
                                }
                            });
                        }
                    },
                });
            });

            $('#btn-confirm-add-ingredient-old').click(function() {
                $("#modal-confirm-ingredient-exist").modal('hide');
                $("#modal-confirm-bill-import-ingredient-exist").modal('show');
            });

            $('#btn-confirm-add-bill-import-ingredient-warehouse-new').click(function() {
                $("#modal-confirm-bill-import-ingredient-exist").modal('hide');
                $("#modal-add-bill-import-ingredient-warehouse").modal('show');
            });

            $('#btn-confirm-add-bill-import-ingredient-warehouse-new').click(function() {
                var valueMaNhanVien = "{{ Session::get('MaNhanVien') }}";
                console.log(valueMaNhanVien);
                $.ajax({
                    url: "{{ route('nhapnguyenlieu.create') }}",
                    method: "get",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#Them-MaNhapKho').val(response.lastIDNhapKhoNguyenVatLieu + 1);
                        $('#Them-MaNhanVien').val(valueMaNhanVien);
                        for (var i = 0; i < response.arrayDonViPhanPhoi.length; i++) {
                            $("#Them-ChonDonViPhanPhoi").append(
                                '<option value=' + response.arrayDonViPhanPhoi[i]
                                .MaDonViPhanPhoi +
                                '>' + response.arrayDonViPhanPhoi[i].TenDonViPhanPhoi +
                                '</option>');
                        }
                    },
                    error: function() {
                        toastr.error("Lỗi không thể tạo hóa đơn mới!");
                    }
                });
            });

            $("#form-modal-add-bill-import-ingredient-warehouse").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr("action");

                var idMaNhapKho = $("#Them-MaNhapKho");
                var idThoiGianNhap = $("#Them-ThoiGianNhap");
                var idMaNhanVien = $("#Them-MaNhanVien");
                var idDonViPhanPhoi = $("#Them-ChonDonViPhanPhoi");
                var idGhiChu = $("#Them-GhiChu");

                var idSpanErrorMaNhapKho = $("#error-them-ma-nhap-kho");
                var idSpanErrorThoiGianNhap = $("#error-them-thoi-gian-nhap");
                var idSpanErrorMaNhanVien = $("#error-them-ma-nhan-vien");
                var idSpanErrorDonViPhanPhoi = $("#error-them-chon-ma-don-vi-phan-phoi");
                var idSpanErrorGhiChu = $("#error-them-ghi-chu");

                function resetStyleError() {
                    idMaNhapKho.css('border', '1px solid #545F73');
                    idThoiGianNhap.css('border', '1px solid #545F73');
                    idMaNhanVien.css('border', '1px solid #545F73');
                    idDonViPhanPhoi.css('border', '1px solid #545F73');
                    idGhiChu.css({
                        'width': '100%',
                        'height': '200px',
                        'border': '1px solid #bdc3c7'
                    });

                    idSpanErrorMaNhapKho.css('display', 'none');
                    idSpanErrorThoiGianNhap.css('display', 'none');
                    idSpanErrorMaNhanVien.css('display', 'none');
                    idSpanErrorDonViPhanPhoi.css('display', 'none');
                    idSpanErrorGhiChu.css('display', 'none');


                    console.log("Vào hàm reset rồi");
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        MaNhapKho: idMaNhapKho.val(),
                        ThoiGianNhap: idThoiGianNhap.val(),
                        MaNhanVien: idMaNhanVien.val(),
                        MaDonViPhanPhoi: idDonViPhanPhoi.val(),
                        GhiChu: idGhiChu.val(),
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        window.location.href = "{{ route('chitietnhapnguyenvatlieu.create') }}";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Thêm mới hóa đơn nhập nguyên vật liệu thất bại!");
                        var data = jqXHR.responseJSON;
                        resetStyleError();

                        if ($.isEmptyObject(data.errors) == false) {
                            console.log(data);
                            $.each(data.errors, function(key, value) {
                                if (key === "MaNhapKho") {
                                    idSpanErrorMaNhapKho.css('display', 'block');
                                    idSpanErrorMaNhapKho.html(value);
                                    idMaNhapKho.css('border', '2px solid red');
                                }
                                if (key === "ThoiGianNhap") {
                                    idSpanErrorThoiGianNhap.css('display', 'block');
                                    idSpanErrorThoiGianNhap.html(value);
                                    idThoiGianNhap.css('border', '2px solid red');
                                }
                                if (key === "MaNhanVien") {
                                    idSpanErrorMaNhanVien.css('display', 'block');
                                    idSpanErrorMaNhanVien.html(value);
                                    idSpanErrorMaNhanVien.css('border',
                                        '2px solid red');
                                }
                                if (key === "MaDonViPhanPhoi") {
                                    idSpanErrorDonViPhanPhoi.css('display', 'block');
                                    idSpanErrorDonViPhanPhoi.html(value);
                                    idDonViPhanPhoi.css('border', '2px solid red');
                                }
                                if (key === "GhiChu") {
                                    idSpanErrorGhiChu.css('display', 'block');
                                    idSpanErrorGhiChu.html(value);
                                    idGhiChu.css({
                                        'width': '100%',
                                        'height': '200px',
                                        'border': '2px solid red',
                                        'border-radius': '2px'
                                    });
                                }
                            });
                        }

                    },
                });
            });

            $("#form-modal-edit-bill-import-ingredient-warehouse").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr("action");

                var idMaNhapKho = $("#Sua-MaNhapKho");
                var idThoiGianNhap = $("#Sua-ThoiGianNhap");
                var idMaNhanVien = $("#Sua-MaNhanVien");
                var idDonViPhanPhoi = $("#Sua-ChonDonViPhanPhoi");
                var idGhiChu = $("#Sua-GhiChu");

                var idSpanErrorMaNhapKho = $("#error-sua-ma-nhap-kho");
                var idSpanErrorThoiGianNhap = $("#error-sua-thoi-gian-nhap");
                var idSpanErrorMaNhanVien = $("#error-sua-ma-nhan-vien");
                var idSpanErrorDonViPhanPhoi = $("#error-sua-chon-ma-don-vi-phan-phoi");
                var idSpanErrorGhiChu = $("#error-sua-ghi-chu");

                function resetStyleError() {
                    idMaNhapKho.css('border', '1px solid #545F73');
                    idThoiGianNhap.css('border', '1px solid #545F73');
                    idMaNhanVien.css('border', '1px solid #545F73');
                    idDonViPhanPhoi.css('border', '1px solid #545F73');
                    idGhiChu.css({
                        'width': '100%',
                        'height': '200px',
                        'border': '1px solid #bdc3c7'
                    });

                    idSpanErrorMaNhapKho.css('display', 'none');
                    idSpanErrorThoiGianNhap.css('display', 'none');
                    idSpanErrorMaNhanVien.css('display', 'none');
                    idSpanErrorDonViPhanPhoi.css('display', 'none');
                    idSpanErrorGhiChu.css('display', 'none');


                    console.log("Vào hàm reset rồi");
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "put",
                    url: url,
                    data: {
                        MaNhapKho: idMaNhapKho.val(),
                        ThoiGianNhap: idThoiGianNhap.val(),
                        MaNhanVien: idMaNhanVien.val(),
                        MaDonViPhanPhoi: idDonViPhanPhoi.val(),
                        GhiChu: idGhiChu.val(),
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#modal-edit-bill-import-ingredient-warehouse").modal('hide');
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Sửa hóa đơn nhập nguyên vật liệu thất bại!");
                        var data = jqXHR.responseJSON;
                        resetStyleError();

                        if ($.isEmptyObject(data.errors) == false) {
                            console.log(data);
                            $.each(data.errors, function(key, value) {
                                if (key === "MaNhapKho") {
                                    idSpanErrorMaNhapKho.css('display', 'block');
                                    idSpanErrorMaNhapKho.html(value);
                                    idMaNhapKho.css('border', '2px solid red');
                                }
                                if (key === "ThoiGianNhap") {
                                    idSpanErrorThoiGianNhap.css('display', 'block');
                                    idSpanErrorThoiGianNhap.html(value);
                                    idThoiGianNhap.css('border', '2px solid red');
                                }
                                if (key === "MaNhanVien") {
                                    idSpanErrorMaNhanVien.css('display', 'block');
                                    idSpanErrorMaNhanVien.html(value);
                                    idSpanErrorMaNhanVien.css('border',
                                        '2px solid red');
                                }
                                if (key === "MaDonViPhanPhoi") {
                                    idSpanErrorDonViPhanPhoi.css('display', 'block');
                                    idSpanErrorDonViPhanPhoi.html(value);
                                    idDonViPhanPhoi.css('border', '2px solid red');
                                }
                                if (key === "GhiChu") {
                                    idSpanErrorGhiChu.css('display', 'block');
                                    idSpanErrorGhiChu.html(value);
                                    idGhiChu.css({
                                        'width': '100%',
                                        'height': '200px',
                                        'border': '2px solid red',
                                        'border-radius': '2px'
                                    });
                                }
                            });
                        }

                    },
                });
            });
        });
    </script>
@endpush
