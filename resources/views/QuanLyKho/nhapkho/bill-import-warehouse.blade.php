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
                        <p class="h6" id="total-bill-improt-warehouse">Có tất cả 0 sản phẩm</p>
                    </div>
                    <div class="progress">
                        <div id="progressbar-bill-improt-warehouse" class="progress-bar" role="progressbar"
                            aria-label="Success example" style="width: 10%" aria-valuenow="1" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p id="showing-bill-improt-warehouse">Đang hiển thị bản ghi từ 1 - 10</p>
                    </div>
                </div>
                <div class="control-actions">
                    <div class="btn add-btn" id="btn-add-bill-import-warehouse" data-bs-toggle="modal"
                        data-bs-target="#importAddBillImportWarehouse">
                        <img src="{{ asset('img/quanlykho/add.svg') }} " alt="">
                        <span class="label">Thêm hóa đơn nhập
                            sản phẩm
                            mới</span>
                    </div>
                </div>
            </div>
            <div class="custom-table">
                <div class="table-content">
                    <table class="table" id="table-bill-import-warehouse">
                        <thead class="thead">
                            <th>STT</th>
                            <th>Mã nhập sản phẩm</th>
                            <th>Thời gian nhập</th>
                            <th>Tổng giá</th>
                            <th>Ghi chú</th>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Tên xưởng</th>
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

                $('#total-bill-improt-warehouse').text(`Có tất cả ${totalRecords} hóa đơn nhập sản phẩm`);
                $('#showing-bill-improt-warehouse').text(`Đang hiển thị bản ghi từ ${startRecord} - ${endRecord}`);
                $('#progressbar-bill-improt-warehouse').attr("style", `width: ${widthProgressBar}%`);
                $('#progressbar-bill-improt-warehouse').attr("aria-valuenow", `${ariaValueNowProgressBar}`);
            }
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            var table = $('#table-bill-import-warehouse').DataTable({
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
                ajax: '{{ route('nhapsanpham.ajax.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "MaXuatKho"
                    },
                    {
                        "data": "ThoiGianXuat"
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
                        "data": "TenXuong"
                    },
                    {
                        data: 'btnEdit',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `<span class="btn btn-edit" data-bs-toggle="modal"
                                            data-bs-target="#updateAddBillImportWarehouse"
                                            data-url="${data}">Sửa</span>`;
                        }
                    }
                ],
                columnDefs: [{
                    className: "not-export",
                    "targets": [8],
                }],
                drawCallback: function() {
                    processInfo(this.api().page.info());
                    $('.btn-edit').click(function() {
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
                                console.log(response.arrayXuatKho);
                                $('#form-modal-edit-bill-import-warehouse').attr(
                                    'action',
                                    '{{ asset('quan-ly-kho/nhap-san-pham/update/') }}/' +
                                    response.arrayXuatKho.MaXuatKho);
                                $('#UpdateMaXuatKho').val(response.arrayXuatKho
                                    .MaXuatKho);
                                $('#UpdateMaNhanVien').val(response.arrayXuatKho
                                    .MaNhanVien);
                                $('#UpdateThoiGianXuat').val(response.arrayXuatKho
                                    .ThoiGianXuat);
                                $('#UpdateGhiChu').val(response.arrayXuatKho
                                    .GhiChu);
                                for (var i = 0; i < response.arrayXuong
                                    .length; i++) {
                                    if (response.arrayXuong[0].MaXuong != response
                                        .arrayXuong[i]
                                        .MaXuong) {
                                        var selected = (response.arrayXuong[i]
                                            .MaXuong === response.arrayXuatKho
                                            .MaXuong) ? 'selected' : '';

                                        $("#form-update-select-xuong").append(
                                            '<option value=' + response
                                            .arrayXuong[i].MaXuong +
                                            ' ' + selected + '>' + response
                                            .arrayXuong[i]
                                            .TenXuong +
                                            '</option>');
                                    }
                                }
                            },
                            error: function() {
                                toastr.error("Lỗi không thể lấy dữ liệu hóa đơn cần sửa!");
                            }
                        });
                    });
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#btn-add-bill-import-warehouse').click(function() {
                var valueMaNhanVien = "{{ Session::get('MaNhanVien') }}";
                console.log(valueMaNhanVien);
                $.ajax({
                    url: "{{ route('nhapsanpham.create') }}",
                    method: "get",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.arrayXuong[0]);
                        $('#MaXuatKho').val(response.lastIDXuatKho + 1);
                        $('#MaNhanVien').val(valueMaNhanVien);
                        for (var i = 0; i < response.arrayXuong.length; i++) {
                            if (response.arrayXuong[0].MaXuong != response.arrayXuong[i]
                                .MaXuong) {
                                $("#form-add-select-xuong").append(
                                    '<option value=' + response.arrayXuong[i].MaXuong +
                                    '>' + response.arrayXuong[i].TenXuong +
                                    '</option>');
                            }
                        }
                        // toastr.success("Thêm mới thương hiệu thành công!");
                    },
                    error: function() {
                        toastr.error("Lỗi không thể tạo hóa đơn mới!");
                    }
                });
            });

            $("#form-modal-add-bill-import-warehouse").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr("action");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        MaXuatKho: $("#MaXuatKho").val(),
                        ThoiGianXuat: $("#ThoiGianXuat").val(),
                        MaNhanVien: $("#MaNhanVien").val(),
                        GhiChu: $("#GhiChu").val(),
                        MaXuong: $("#form-add-select-xuong").val(),
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#importAddBillImportWarehouse").modal('hide');
                        // location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Thêm mới hóa đơn nhập sản phẩm thất bại!");
                    },
                });
            });

            $("#form-modal-edit-bill-import-warehouse").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr("action");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "put",
                    url: url,
                    data: {
                        MaXuatKho: $("#UpdateMaXuatKho").val(),
                        ThoiGianXuat: $("#UpdateThoiGianXuat").val(),
                        MaNhanVien: $("#UpdateMaNhanVien").val(),
                        GhiChu: $("#UpdateGhiChu").val(),
                        MaXuong: $("#form-update-select-xuong").val(),
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#updateAddBillImportWarehouse").modal('hide');
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Sửa hóa đơn nhập sản phẩm thất bại!");
                    },
                });
            });


        });
        // `<option value='${ response.arrayXuong[i].MaXuong }>${ response.arrayXuong[i].TenXuong}</option>`
    </script>
@endpush
