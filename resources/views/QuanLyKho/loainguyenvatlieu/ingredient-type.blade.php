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
                        <p class="h6" id="total-ingredient-type">Có tất cả 0 sản phẩm</p>
                    </div>
                    <div class="progress">
                        <div id="progressbar-ingredient-type" class="progress-bar" role="progressbar"
                            aria-label="Success example" style="width: 10%" aria-valuenow="1" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p id="showing-ingredient-type">Đang hiển thị bản ghi từ 1 - 10</p>
                    </div>
                </div>
                <div class="control-actions">
                    <div class="btn add-btn" id="btn-add-ingredient-type" data-bs-toggle="modal"
                        data-bs-target="#modal-add-ingredient-type">
                        <img src="{{ asset('img/quanlykho/add.svg') }} " alt="">
                        <span class="label">Thêm kiểu nguyên vật liệu</span>
                    </div>
                </div>
            </div>
            <div class="custom-table table-responsive">
                <div class="table-content">
                    <table class="table" id="table-ingredient-type">
                        <thead class="thead">
                            <th>STT</th>
                            <th>Mã kiểu nguyên liệu</th>
                            <th>Tên kiểu nguyên liệu</th>
                            <th>Mô tả</th>
                            <th>Số lượng nguyên liệu</th>
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

                $('#total-ingredient-type').text(`Có tất cả ${totalRecords} kiểu nguyên vật liệu`);
                $('#showing-ingredient-type').text(`Đang hiển thị bản ghi từ ${startRecord} - ${endRecord}`);
                $('#progressbar-ingredient-type').attr("style", `width: ${widthProgressBar}%`);
                $('#progressbar-ingredient-type').attr("aria-valuenow", `${ariaValueNowProgressBar}`);
            }
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            var table = $('#table-ingredient-type').DataTable({
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
                ajax: '{{ route('loainguyenvatlieu.ajax.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "MaChatLieu"
                    },
                    {
                        "data": "TenChatLieu"
                    },
                    {
                        "data": "MoTaChatLieu"
                    },
                    {
                        "data": "SoLuongNguyenVatLieu"
                    },
                    {
                        data: 'btnEditNguyenVatLieu',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `<span class="btn btn-edit-kieu-nguyen-vat-lieu format-btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-ingredient-type"
                                            data-url="${data}">Sửa</span>`;
                        }
                    },
                ],
                columnDefs: [{
                    className: "not-export",
                    "targets": [5],
                }],
                autoWidth: false,
                drawCallback: function() {
                    processInfo(this.api().page.info());
                    $('.btn-edit-kieu-nguyen-vat-lieu').click(function() {
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
                                console.log(response.arrayChatLieu);
                                $('#form-modal-edit-ingredient-type').attr(
                                    'action',
                                    '{{ asset('quan-ly-kho/loai-nguyen-vat-lieu/update/') }}/' +
                                    response.arrayChatLieu.MaChatLieu);
                                $('#SuaMaChatLieu').val(response.arrayChatLieu
                                    .MaChatLieu);
                                $('#SuaTenChatLieu').val(response.arrayChatLieu
                                    .TenChatLieu);
                                $('#SuaMoTaChatLieu').val(response.arrayChatLieu
                                    .MoTaChatLieu);
                            },
                            error: function() {
                                toastr.error(
                                    "Lỗi không thể lấy dữ liệu kiểu nguyên vật liệu cần sửa!"
                                );
                            }
                        });
                    });
                }
            });

        });
    </script>

    <script>
        $("#form-modal-add-ingredient-type").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr("action");

            var idMaChatLieu = $("#ThemMaChatLieu");
            var idTenChatLieu = $("#ThemTenChatLieu");
            var idMoTaChatLieu = $("#ThemMoTaChatLieu");

            var idSpanErrorMaChatLieu = $("#error-them-ma-kieu-chat-lieu");
            var idSpanErrorTenChatLieu = $("#error-them-ten-kieu-chat-lieu");
            var idSpanErrorMoTaChatLieu = $("#error-them-mo-ta-kieu-chat-lieu");

            function resetStyleError() {
                idMaChatLieu.css('border', '1px solid #545F73');
                idTenChatLieu.css('border', '1px solid #545F73');
                idMoTaChatLieu.css({
                    'width': '100%',
                    'height': '200px',
                    'border': '1px solid #bdc3c7'
                });

                idSpanErrorMaChatLieu.css('display', 'none');
                idSpanErrorTenChatLieu.css('display', 'none');
                idSpanErrorMoTaChatLieu.css('display', 'none');

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
                    MaChatLieu: idMaChatLieu.val(),
                    TenChatLieu: idTenChatLieu.val(),
                    MoTaChatLieu: idMoTaChatLieu.val(),
                },
                success: function(response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error("Thêm mới kiểu nguyên vật liệu thất bại!");
                    var data = jqXHR.responseJSON;
                    resetStyleError();

                    if ($.isEmptyObject(data.errors) == false) {
                        console.log(data);
                        $.each(data.errors, function(key, value) {
                            if (key === "MaChatLieu") {
                                idSpanErrorMaChatLieu.css('display', 'block');
                                idSpanErrorMaChatLieu.html(value);
                                idMaChatLieu.css('border', '2px solid red');
                            }
                            if (key === "TenChatLieu") {
                                idSpanErrorTenChatLieu.css('display', 'block');
                                idSpanErrorTenChatLieu.html(value);
                                idTenChatLieu.css('border', '2px solid red');
                            }
                            if (key === "MoTaChatLieu") {
                                idSpanErrorMoTaChatLieu.css('display', 'block');
                                idSpanErrorMoTaChatLieu.html(value);
                                idMoTaChatLieu.css({
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

        $("#form-modal-edit-ingredient-type").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr("action");

            var idMaChatLieu = $("#SuaMaChatLieu");
            var idTenChatLieu = $("#SuaTenChatLieu");
            var idMoTaChatLieu = $("#SuaMoTaChatLieu");

            var idSpanErrorMaChatLieu = $("#error-sua-ma-kieu-chat-lieu");
            var idSpanErrorTenChatLieu = $("#error-sua-ten-kieu-chat-lieu");
            var idSpanErrorMoTaChatLieu = $("#error-sua-mo-ta-kieu-chat-lieu");

            function resetStyleError() {
                idMaChatLieu.css('border', '1px solid #545F73');
                idTenChatLieu.css('border', '1px solid #545F73');
                idMoTaChatLieu.css({
                    'width': '100%',
                    'height': '200px',
                    'border': '1px solid #bdc3c7'
                });

                idSpanErrorMaChatLieu.css('display', 'none');
                idSpanErrorTenChatLieu.css('display', 'none');
                idSpanErrorMoTaChatLieu.css('display', 'none');

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
                    MaChatLieu: idMaChatLieu.val(),
                    TenChatLieu: idTenChatLieu.val(),
                    MoTaChatLieu: idMoTaChatLieu.val(),
                },
                success: function(response) {
                    toastr.success(response.message);
                    $("#modal-edit-ingredient-type").modal('hide');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error("Sửa kiểu nguyên vật liệu thất bại!");
                    var data = jqXHR.responseJSON;
                    resetStyleError();

                    if ($.isEmptyObject(data.errors) == false) {
                        console.log(data);
                        $.each(data.errors, function(key, value) {
                            if (key === "MaChatLieu") {
                                idSpanErrorMaChatLieu.css('display', 'block');
                                idSpanErrorMaChatLieu.html(value);
                                idMaChatLieu.css('border', '2px solid red');
                            }
                            if (key === "TenChatLieu") {
                                idSpanErrorTenChatLieu.css('display', 'block');
                                idSpanErrorTenChatLieu.html(value);
                                idTenChatLieu.css('border', '2px solid red');
                            }
                            if (key === "MoTaChatLieu") {
                                idSpanErrorMoTaChatLieu.css('display', 'block');
                                idSpanErrorMoTaChatLieu.html(value);
                                idMoTaChatLieu.css({
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
    </script>
@endpush
