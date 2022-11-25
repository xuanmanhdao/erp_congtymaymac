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
                        <p class="h6" id="total-ingredient-warehouse">Có tất cả 0 nguyên vật liệu</p>
                    </div>
                    <div class="progress">
                        <div id="progressbar-ingredient-warehouse" class="progress-bar" role="progressbar"
                            aria-label="Success example" style="width: 10%" aria-valuenow="1" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p id="showing-ingredient-warehouse">Đang hiển thị bản ghi từ 1 - 10</p>
                    </div>
                </div>
            </div>
            <div class="custom-table table-responsive">
                <div class="table-content">
                    <table class="table" id="table-ingredient-warehouse">
                        <thead class="thead">
                            <th>STT</th>
                            <th>Mã nguyên vật liệu</th>
                            <th>Kiểu nguyên vật liệu</th>
                            <th>Tên nguyên vật liệu</th>
                            <th>Số lượng</th>
                            <th>Đơn vị tính</th>
                            <th>Mô tả nguyên vật liệu</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
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

                $('#total-ingredient-warehouse').text(`Có tất cả ${totalRecords} nguyên vật liệu tồn kho`);
                $('#showing-ingredient-warehouse').text(`Đang hiển thị bản ghi từ ${startRecord} - ${endRecord}`);
                $('#progressbar-ingredient-warehouse').attr("style", `width: ${widthProgressBar}%`);
                $('#progressbar-ingredient-warehouse').attr("aria-valuenow", `${ariaValueNowProgressBar}`);
            }
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            var table = $('#table-ingredient-warehouse').DataTable({
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
                ajax: '{{ route('nguyenvatlieu.ajax.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "MaNguyenVatLieu"
                    },
                    {
                        "data": "TenChatLieu"
                    },
                    {
                        "data": "TenNguyenVatLieu"
                    },
                    {
                        "data": "SoLuong"
                    },
                    {
                        "data": "DonViTinh"
                    },
                    {
                        "data": "MoTaNguyenVatLieu"
                    },
                    {
                        "data": "ThoiGianTao"
                    },
                    {
                        "data": "ThoiGianCapNhat"
                    },
                ],
                columnDefs: [{
                    className: "not-export",
                }],
                autoWidth: false,
                drawCallback: function() {
                    processInfo(this.api().page.info());
                }
            });

        });
    </script>
@endpush
