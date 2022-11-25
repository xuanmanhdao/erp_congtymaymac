@extends('QuanLyKho.layout.master')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.6/sb-1.3.3/sl-1.4.0/datatables.min.css" />
@endpush
@section('ContentPageQuanLyKho')
    <div class="container">

        <div class="box">
            <div class="control-table">
                <div class="control-info">
                    <div class="total-products">
                        <p class="h6" id="total-supplier">Có tất cả 0 sản phẩm</p>
                    </div>
                    <div class="progress">
                        <div id="progressbar-supplier" class="progress-bar" role="progressbar" aria-label="Success example"
                            style="width: 10%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p id="showing-supplier">Đang hiển thị bản ghi từ 1 - 10</p>
                    </div>
                </div>
                <div class="control-actions">
                    <div class="btn add-btn" id="btn-add-supplier" data-bs-toggle="modal"
                        data-bs-target="#modal-add-supplier">
                        <img src="{{ asset('img/quanlykho/add.svg') }} " alt="">
                        <span class="label">Thêm đơn vị phân phối</span>
                    </div>
                </div>
            </div>
            <div class="custom-table table-responsive">
                <div class="table-content">
                    <table class="table" id="table-supplier">
                        <thead class="thead">
                            <th>STT</th>
                            <th>Mã đơn vị phân phối</th>
                            <th>Tên đơn vị phân phối</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Hành động</th>
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

                $('#total-supplier').text(`Có tất cả ${totalRecords} đơn vị phân phối`);
                $('#showing-supplier').text(`Đang hiển thị bản ghi từ ${startRecord} - ${endRecord}`);
                $('#progressbar-supplier').attr("style", `width: ${widthProgressBar}%`);
                $('#progressbar-supplier').attr("aria-valuenow", `${ariaValueNowProgressBar}`);
            }
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            var table = $('#table-supplier').DataTable({
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
                ajax: '{{ route('donviphanphoi.ajax.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "MaDonViPhanPhoi"
                    },
                    {
                        "data": "TenDonViPhanPhoi"
                    },
                    {
                        "data": "DiaChi"
                    },
                    {
                        "data": "SoDienThoai"
                    },
                    {
                        "data": "Fax"
                    },
                    {
                        "data": "Email"
                    },
                    {
                        data: 'btnEditDonViPhanPhoi',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `<span class="btn btn-edit-don-vi-cung-cap format-btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-supplier"
                                            data-url="${data}">Sửa</span>`;
                        }
                    },
                ],
                columnDefs: [{
                    className: "not-export",
                    "targets": [7],
                }],
                autoWidth: false,
                drawCallback: function() {
                    processInfo(this.api().page.info());
                    $('.btn-edit-don-vi-cung-cap').click(function() {
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
                                console.log(response);
                                $('#form-modal-edit-supplier').attr(
                                    'action',
                                    '{{ asset('quan-ly-kho/don-vi-cung-cap/update/') }}/' +
                                    response.MaDonViPhanPhoi);
                                $('#Sua-MaDonViPhanPhoi').val(response.MaDonViPhanPhoi);
                                $('#Sua-TenDonViPhanPhoi').val(response.TenDonViPhanPhoi);
                                $('#Sua-DiaChi').val(response.DiaChi);
                                $('#Sua-SoDienThoai').val(response.SoDienThoai);
                                $('#Sua-Fax').val(response.Fax);
                                $('#Sua-Email').val(response.Email);
                            },
                            error: function() {
                                toastr.error(
                                    "Lỗi không thể lấy dữ liệu đơn vị cung cấp cần sửa!"
                                );
                            }
                        });
                    });
                }
            });

        });
    </script>

    <script>
        $("#form-modal-add-supplier").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr("action");

            var idMaDonViPhanPhoi = $("#Them-MaDonViPhanPhoi");
            var idTenDonViPhanPhoi = $("#Them-TenDonViPhanPhoi");
            var idDiaChi = $("#Them-DiaChi");
            var idSoDienThoai = $("#Them-SoDienThoai");
            var idFax = $("#Them-Fax");
            var idEmail = $("#Them-Email");

            var idSpanErrorMaDonViPhanPhoi = $("#error-them-ma-don-vi-phan-phoi");
            var idSpanErrorTenDonViPhanPhoi = $("#error-them-ten-don-vi-phan-phoi");
            var idSpanErrorDiaChi = $("#error-them-dia-chi");
            var idSpanErrorSoDienThoai = $("#error-them-so-dien-thoai");
            var idSpanErrorFax = $("#error-them-fax");
            var idSpanErrorEmail = $("#error-them-email");

            function resetStyleError() {
                idMaDonViPhanPhoi.css('border', '1px solid #545F73');
                idTenDonViPhanPhoi.css('border', '1px solid #545F73');
                idDiaChi.css('border', '1px solid #545F73');
                idSoDienThoai.css('border', '1px solid #545F73');
                idFax.css('border', '1px solid #545F73');
                idEmail.css('border', '1px solid #545F73');

                idSpanErrorMaDonViPhanPhoi.css('display', 'none');
                idSpanErrorTenDonViPhanPhoi.css('display', 'none');
                idSpanErrorDiaChi.css('display', 'none');
                idSpanErrorSoDienThoai.css('display', 'none');
                idSpanErrorFax.css('display', 'none');
                idSpanErrorEmail.css('display', 'none');

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
                    MaDonViPhanPhoi: idMaDonViPhanPhoi.val(),
                    TenDonViPhanPhoi: idTenDonViPhanPhoi.val(),
                    DiaChi: idDiaChi.val(),
                    SoDienThoai: idSoDienThoai.val(),
                    Fax: idFax.val(),
                    Email: idEmail.val(),
                },
                success: function(response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error("Thêm mới đơn vị cung cấp thất bại!");
                    var data = jqXHR.responseJSON;
                    resetStyleError();

                    if ($.isEmptyObject(data.errors) == false) {
                        console.log(data);
                        $.each(data.errors, function(key, value) {
                            if (key === "MaDonViPhanPhoi") {
                                idSpanErrorMaDonViPhanPhoi.css('display', 'block');
                                idSpanErrorMaDonViPhanPhoi.html(value);
                                idMaDonViPhanPhoi.css('border', '2px solid red');
                            }
                            if (key === "TenDonViPhanPhoi") {
                                idSpanErrorTenDonViPhanPhoi.css('display', 'block');
                                idSpanErrorTenDonViPhanPhoi.html(value);
                                idTenDonViPhanPhoi.css('border', '2px solid red');
                            }
                            if (key === "DiaChi") {
                                idSpanErrorDiaChi.css('display', 'block');
                                idSpanErrorDiaChi.html(value);
                                idDiaChi.css('border', '2px solid red');
                            }
                            if (key === "SoDienThoai") {
                                idSpanErrorSoDienThoai.css('display', 'block');
                                idSpanErrorSoDienThoai.html(value);
                                idSoDienThoai.css('border', '2px solid red');
                            }
                            if (key === "Fax") {
                                idSpanErrorFax.css('display', 'block');
                                idSpanErrorFax.html(value);
                                idFax.css('border', '2px solid red');
                            }
                            if (key === "Email") {
                                idSpanErrorEmail.css('display', 'block');
                                idSpanErrorEmail.html(value);
                                idEmail.css('border', '2px solid red');
                            }
                        });
                    }
                },
            });
        });

        $("#form-modal-edit-supplier").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr("action");

            var idMaDonViPhanPhoi = $("#Sua-MaDonViPhanPhoi");
            var idTenDonViPhanPhoi = $("#Sua-TenDonViPhanPhoi");
            var idDiaChi = $("#Sua-DiaChi");
            var idSoDienThoai = $("#Sua-SoDienThoai");
            var idFax = $("#Sua-Fax");
            var idEmail = $("#Sua-Email");

            var idSpanErrorMaDonViPhanPhoi = $("#error-sua-ma-don-vi-phan-phoi");
            var idSpanErrorTenDonViPhanPhoi = $("#error-sua-ten-don-vi-phan-phoi");
            var idSpanErrorDiaChi = $("#error-sua-dia-chi");
            var idSpanErrorSoDienThoai = $("#error-sua-so-dien-thoai");
            var idSpanErrorFax = $("#error-sua-fax");
            var idSpanErrorEmail = $("#error-sua-email");

            function resetStyleError() {
                idMaDonViPhanPhoi.css('border', '1px solid #545F73');
                idTenDonViPhanPhoi.css('border', '1px solid #545F73');
                idDiaChi.css('border', '1px solid #545F73');
                idSoDienThoai.css('border', '1px solid #545F73');
                idFax.css('border', '1px solid #545F73');
                idEmail.css('border', '1px solid #545F73');

                idSpanErrorMaDonViPhanPhoi.css('display', 'none');
                idSpanErrorTenDonViPhanPhoi.css('display', 'none');
                idSpanErrorDiaChi.css('display', 'none');
                idSpanErrorSoDienThoai.css('display', 'none');
                idSpanErrorFax.css('display', 'none');
                idSpanErrorEmail.css('display', 'none');

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
                    MaDonViPhanPhoi: idMaDonViPhanPhoi.val(),
                    TenDonViPhanPhoi: idTenDonViPhanPhoi.val(),
                    DiaChi: idDiaChi.val(),
                    SoDienThoai: idSoDienThoai.val(),
                    Fax: idFax.val(),
                    Email: idEmail.val(),
                },
                success: function(response) {
                    toastr.success(response.message);
                    $("#modal-edit-supplier").modal('hide');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error("Sửa đơn vị cung cấp thất bại!");
                    var data = jqXHR.responseJSON;
                    resetStyleError();

                    if ($.isEmptyObject(data.errors) == false) {
                        console.log(data);
                        $.each(data.errors, function(key, value) {
                            if (key === "MaDonViPhanPhoi") {
                                idSpanErrorMaDonViPhanPhoi.css('display', 'block');
                                idSpanErrorMaDonViPhanPhoi.html(value);
                                idMaDonViPhanPhoi.css('border', '2px solid red');
                            }
                            if (key === "TenDonViPhanPhoi") {
                                idSpanErrorTenDonViPhanPhoi.css('display', 'block');
                                idSpanErrorTenDonViPhanPhoi.html(value);
                                idTenDonViPhanPhoi.css('border', '2px solid red');
                            }
                            if (key === "DiaChi") {
                                idSpanErrorDiaChi.css('display', 'block');
                                idSpanErrorDiaChi.html(value);
                                idDiaChi.css('border', '2px solid red');
                            }
                            if (key === "SoDienThoai") {
                                idSpanErrorSoDienThoai.css('display', 'block');
                                idSpanErrorSoDienThoai.html(value);
                                idSoDienThoai.css('border', '2px solid red');
                            }
                            if (key === "Fax") {
                                idSpanErrorFax.css('display', 'block');
                                idSpanErrorFax.html(value);
                                idFax.css('border', '2px solid red');
                            }
                            if (key === "Email") {
                                idSpanErrorEmail.css('display', 'block');
                                idSpanErrorEmail.html(value);
                                idEmail.css('border', '2px solid red');
                            }
                        });
                    }
                },
            });
        });
    </script>
@endpush
