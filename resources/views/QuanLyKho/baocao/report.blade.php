@extends('QuanLyKho.layout.master')
@push('css')
    <link href="{{ asset('css/quanlykho/dashboard.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('ContentPageQuanLyKho')
    <div class="container">
        <div class="box">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <h1 class="page-header">Thống kê nguyên vật liệu</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        {{-- <i class="fa fa-comments fa-5x"></i> --}}
                                        <i class="fa fa-solid fa-warehouse fa-5x"></i>
                                    </div>
                                    @foreach ($nguyenVatLieuTonKhoNhieuNhat as $nguyenVatLieuTonKhoNhieuNhat)
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" style="text-transform: uppercase;">{{  $nguyenVatLieuTonKhoNhieuNhat->TenNguyenVatLieu }}</div>
                                        <div>Số lượng: {{ $nguyenVatLieuTonKhoNhieuNhat->SoLuong }}</div>
                                        <div>Tồn Kho Nhiều Nhất!</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem Chi Tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    @foreach ($nguyenVatLieuTonKhoItNhat as $nguyenVatLieuTonKhoItNhat)
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" style="text-transform: uppercase;">{{  $nguyenVatLieuTonKhoItNhat->TenNguyenVatLieu }}</div>
                                        <div>Số lượng: {{ $nguyenVatLieuTonKhoItNhat->SoLuong }}</div>
                                        <div>Tồn Kho Ít Nhất!</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem Chi Tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                        {{-- <i class="fa-solid fa-interrobang"></i> --}}
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" style="text-transform: uppercase;">SỐ HĐ: {{ $hoaDonChuaKiemTra[0]['SoHoaDon'] }}</div>
                                        <div>Nguyên vật liệu</div>
                                        <div>Chưa Kiểm Tra!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('baocao.nguyenvatlieuchuakiemtra') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem Chi Tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" style="text-transform: uppercase;">SỐ HĐ: {{ $hoaDonChuaDatYeuCau[0]['SoHoaDon'] }}</div>
                                        <div>Nguyên vật liệu</div>
                                        <div>Chưa Đạt Chuẩn!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('baocao.nguyenvatlieuchuadatchuan') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem Chi Tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- row --}}
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
