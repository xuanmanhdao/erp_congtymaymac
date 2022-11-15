@extends('QuanLyKho.layout.master')
@section('ContentPageQuanLyKho')
    <div class="container">

        <div class="box box-filter">
            <div class="row">
                <form class="col-lg-6 filter-options" action="{{ route('loaisanpham.search') }}" method="get">
                    <label for="">Mã loại sản phẩm</label>
                    <div class="filter-input-icon">
                        <input type="text" placeholder="Nhập mã sản phẩm" name="MaLoaiSanPham"
                            value="{{ isset($valueSearchMaLoaiSanPham) ? "$valueSearchMaLoaiSanPham" : '' }}">
                        <button class="fa-solid fa-magnifying-glass"
                            style="position: absolute; top: 12px; right: 12px; bottom: 12px; display:inline-block; border:0; background: white;"
                            type="submit"></button>
                    </div>
                </form>
                <form class="col-lg-6 filter-options" action="{{ route('loaisanpham.search') }}" method="get">
                    <label for="">Tên loại sản phẩm</label>
                    <div class="filter-input-icon">
                        <input type="text" placeholder="Nhập tên sản phẩm" name="TenLoaiSanPham"
                            value="{{ isset($valueSearchTenLoaiSanPham) ? "$valueSearchTenLoaiSanPham" : '' }}">
                        <button class="fa-solid fa-magnifying-glass"
                            style="position: absolute; top: 12px; right: 12px; bottom: 12px; display:inline-block; border:0; background: white;"
                            type="submit"></button>
                    </div>
                </form>
            </div>

        </div>

        <div class="box">
            <div class="control-table">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="control-info">
                    <div class="total-products" style="font-">
                        <p class="h6">Có tất cả {{ $totalLoaiSanPham }} loại sản phẩm</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-label="Success example"
                            style="width:{{ $totalLoaiSanPham === 0 ? '0' : (($arrayLoaiSanPham->currentpage() * $arrayLoaiSanPham->perpage()) / $totalLoaiSanPham) * 100 }}%"
                            aria-valuenow="{{ $totalLoaiSanPham === 0 ? '0' : (($arrayLoaiSanPham->currentpage() * $arrayLoaiSanPham->perpage()) / $totalLoaiSanPham) * 100 }}"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="upload-info">
                        <p>Đang hiển thị bản ghi từ
                            {{ ($arrayLoaiSanPham->currentpage() - 1) * $arrayLoaiSanPham->perpage() + 1 }}
                            -
                            {{ ($arrayLoaiSanPham->currentpage() - 1) * $arrayLoaiSanPham->perpage() + $arrayLoaiSanPham->perpage() }}
                        </p>
                    </div>
                </div>
                <div class="control-actions">
                    <div class="btn add-btn" data-bs-toggle="modal" data-bs-target="#importTypeProduct">
                        <img src="{{ asset('img/quanlykho/add.svg') }} " alt="">
                        <span class="label">Thêm loại sản phẩm
                            mới</span>
                    </div>
                    <div class="btn export-btn">
                        <img src="{{ asset('img/quanlykho/export-file.svg') }}" alt="">
                        <a href="{{ route('loaisanpham.export') }}" class="label">Xuất file</a>
                    </div>
                </div>
            </div>
            <div class="custom-table">
                <div class="table-content">
                    <table class="table">
                        <thead class="thead">
                            <tr class="tr">
                                <td class="td">
                                    STT
                                </td>
                                <td class="td">
                                    Mã loại sản phẩm
                                    <img id="order-by-MaLoaiSanPham-desc" src="{{ asset('img/quanlykho/sort-icon.svg') }}"
                                        alt="">
                                </td>
                                <td class="td">
                                    Tên loại
                                    <img id="order-by-TenLoaiSanPham-desc" src="{{ asset('img/quanlykho/sort-icon.svg') }}"
                                        alt="">
                                </td>
                                <td class="td">
                                    Màu sắc
                                    {{-- <img src="{{ asset('img/quanlykho/sort-icon.svg') }}" alt=""> --}}
                                </td>
                                <td class="td">
                                    Ví trị xếp
                                    <img id="order-by-ViTriXep-desc" src="{{ asset('img/quanlykho/sort-icon.svg') }}"
                                        alt="">
                                </td>
                                <td class="td">
                                    Số lượng sản phẩm
                                    <img id="order-by-SoLuongSanPham-desc" src="{{ asset('img/quanlykho/sort-icon.svg') }}"
                                        alt="">
                                </td>
                                <td class="td">Hoạt động</td>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php $i = ($arrayLoaiSanPham->currentpage() - 1) * $arrayLoaiSanPham->perpage() + 1; ?>

                            @foreach ($arrayLoaiSanPham as $loaiSanPham)
                                <tr class="tr">
                                    <td class="td">
                                        <span>{{ $i++ }}</span>
                                    </td>
                                    <td class="td">
                                        <span>{{ $loaiSanPham->MaLoai }}</span>
                                    </td>
                                    <td class="td">
                                        <span>{{ $loaiSanPham->TenLoai }}</span>
                                    </td>
                                    <td class="td">
                                        <span>{{ $loaiSanPham->MauSac }}</span>
                                        &nbsp;
                                        <input type="color" value="{{ $loaiSanPham->MauSac }}" class="form-control-color"
                                            disabled>
                                    </td>
                                    <td class="td">
                                        <span>{{ $loaiSanPham->ViTriXep }}</span>
                                    </td>
                                    <td class="td">
                                        <span>{{ $loaiSanPham->SoLuongSanPham === null ? '0' : " $loaiSanPham->SoLuongSanPham" }}</span>
                                    </td>
                                    <td class="td">
                                        <span class="btn btn-edit" data-bs-toggle="modal"
                                            data-bs-target="#updateTypeProduct"
                                            data-url="{{ route('loaisanpham.edit', $loaiSanPham->MaLoai) }}">Sửa</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    @if (isset($orderByColumn) && isset($requestOrderby) && isset($totalPage))
                        {{-- <div id="pagination-custom-by-manhbautroi"> --}}
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>

                                <?php for($soTrang=1; $soTrang<= $totalPage; $soTrang++) {?>
                                {{-- <li class="page-item active" aria-current="page"><span class="page-link">1</span></li> --}}
                                <?php if($arrayLoaiSanPham->currentpage()==$soTrang) {?>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">
                                        {{ $soTrang }}
                                    </span>
                                </li>
                                <?php } else{?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="http://127.0.0.1:8000/quan-ly-kho/loai-san-pham/order-by-column?columnOrderby={{ $orderByColumn }}&requestOrderby={{ $requestOrderby }}&page={{ $soTrang }}">
                                        {{ $soTrang }}
                                    </a>
                                </li>
                                <?php } ?>
                                <?php } ?>

                                <li class="page-item">
                                    <a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
                                </li>
                            </ul>
                        </nav>
                        {{-- {{$arrayLoaiSanPham->appends(['columnOrderby' => 'MaLoai','requestOrderby'=>'Desc' ])->links() }} --}}
                        {{-- </div> --}}
                    @elseif(isset($valueSearchMaLoaiSanPham))
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>

                                <?php for($soTrang=1; $soTrang<= $totalPage; $soTrang++) {?>
                                <?php if($arrayLoaiSanPham->currentpage()==$soTrang) {?>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">
                                        {{ $soTrang }}
                                    </span>
                                </li>
                                <?php } else{?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="http://127.0.0.1:8000/quan-ly-kho/loai-san-pham/tim-kiem?MaLoaiSanPham={{ $valueSearchMaLoaiSanPham }}&page={{ $soTrang }}">
                                        {{ $soTrang }}
                                    </a>
                                </li>
                                <?php } ?>
                                <?php } ?>

                                <li class="page-item">
                                    <a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
                                </li>
                            </ul>
                        </nav>
                    @elseif(isset($valueSearchTenLoaiSanPham))
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>

                                <?php for($soTrang=1; $soTrang<= $totalPage; $soTrang++) {?>
                                <?php if($arrayLoaiSanPham->currentpage()==$soTrang) {?>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">
                                        {{ $soTrang }}
                                    </span>
                                </li>
                                <?php } else{?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="http://127.0.0.1:8000/quan-ly-kho/loai-san-pham/tim-kiem?TenLoaiSanPham={{ $valueSearchTenLoaiSanPham }}&page={{ $soTrang }}">
                                        {{ $soTrang }}
                                    </a>
                                </li>
                                <?php } ?>
                                <?php } ?>

                                <li class="page-item">
                                    <a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
                                </li>
                            </ul>
                        </nav>
                    @else
                        {{ $arrayLoaiSanPham->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $('#order-by-MaLoaiSanPham-desc').click(function() {
                console.log('DDaxxx');
                var columnOrderby = 'MaLoai';
                var requestOrderby = 'Desc';
                $.ajax({
                    url: "{{ route('loaisanpham.orderbycolumn') }}",
                    method: "get",
                    dataType: 'html',
                    data: {
                        columnOrderby: columnOrderby,
                        requestOrderby: requestOrderby
                    },
                    success: function(response) {
                        // location.reload();
                        document.write(response);
                        // window.location.replace(response);
                    },
                    error: function() {}
                });
            });

            $('#order-by-TenLoaiSanPham-desc').click(function() {
                console.log('DDaxxx');
                var columnOrderby = 'TenLoai';
                var requestOrderby = 'DESC';
                $.ajax({
                    url: "{{ route('loaisanpham.orderbycolumn') }}",
                    method: "get",
                    dataType: 'html',
                    data: {
                        columnOrderby: columnOrderby,
                        requestOrderby: requestOrderby
                    },
                    success: function(response) {
                        // location.reload();
                        document.write(response);
                        // window.location.replace(response);
                    },
                    error: function() {}
                });
            });

            $('#order-by-ViTriXep-desc').click(function() {
                console.log('DDaxxx');
                var columnOrderby = 'ViTriXep';
                var requestOrderby = 'DESC';
                $.ajax({
                    url: "{{ route('loaisanpham.orderbycolumn') }}",
                    method: "get",
                    dataType: 'html',
                    data: {
                        columnOrderby: columnOrderby,
                        requestOrderby: requestOrderby
                    },
                    success: function(response) {
                        // location.reload();
                        document.write(response);
                        // window.location.replace(response);
                    },
                    error: function() {}
                });
            });

            $('#order-by-SoLuongSanPham-desc').click(function() {
                console.log('DDaxxx');
                var columnOrderby = 'SoLuongSanPham';
                var requestOrderby = 'DESC';
                $.ajax({
                    url: "{{ route('loaisanpham.orderbycolumn') }}",
                    method: "get",
                    dataType: 'html',
                    data: {
                        columnOrderby: columnOrderby,
                        requestOrderby: requestOrderby
                    },
                    success: function(response) {
                        // console.log(response.data);
                        // location.reload();
                        document.write(response);
                        // window.location.replace(response);
                    },
                    error: function() {}
                });
            });

            $('.btn-edit').click(function() {
                var url = $(this).attr('data-url');
                $.ajax({
                    url: url,
                    method: "get",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.MaLoai);
                        $('#form-edit-type-product').attr('action',
                            '{{ asset('quan-ly-kho/loai-san-pham/update-loai-san-pham/') }}/' + response.MaLoai);
                        $('#SuaMaLoai').val(response.MaLoai);
                        $('#SuaTenLoai').val(response.TenLoai);
                        $('#SuaMauSac').val(response.MauSac);
                        $('#SuaViTriXep').val(response.ViTriXep);
                        
                    },
                    error: function() {}
                });
            });

        });
    </script>
@endpush
