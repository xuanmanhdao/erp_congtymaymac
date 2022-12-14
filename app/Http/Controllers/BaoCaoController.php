<?php

namespace App\Http\Controllers;

use App\Models\NguyenVatLieu;
use App\Models\NhapKho;
use App\Models\TinhTrangNhapKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BaoCaoController extends Controller
{
    public function baoCaoNguyenVatLieu()
    {
        $nguyenVatLieuTonKhoNhieuNhat = NguyenVatLieu::orderBy('SoLuong','desc')->limit(1)->get();
        $nguyenVatLieuTonKhoItNhat = NguyenVatLieu::orderBy('SoLuong','asc')->limit(1)->get();

        // 0: Chưa kiểm tra. 1: Tốt. 2: Chưa đạt yêu cầu 
        $hoaDonChuaKiemTra=TinhTrangNhapKho::select(DB::raw('count(*) as SoHoaDon'))->where('TinhTrang','=',0)->get();  
        $hoaDonChuaDatYeuCau=TinhTrangNhapKho::select(DB::raw('count(*) as SoHoaDon'))->where('TinhTrang','=',2)->get();


        return view('QuanLyKho.baocao.report', 
        compact('nguyenVatLieuTonKhoNhieuNhat', 'nguyenVatLieuTonKhoItNhat','hoaDonChuaKiemTra','hoaDonChuaDatYeuCau'));
    }

    public function baoCaoNguyenVatLieuChuaKiemTra(){

        return view('QuanLyKho.baocao.bill-import-warehouse-unchecked');
    }

    public function ajaxBaoCaoNguyenVatLieuChuaKiemTra()
    {

        $hoaDonChuaKiemTra=NhapKho::selectRaw('nhapkho.*, nhanvien.TenNhanVien AS TenNhanVien, donviphanphoi.TenDonViPhanPhoi as TenDonViPhanPhoi')
        ->join('nhanvien', 'nhanvien.MaNhanVien', '=', 'nhapkho.MaNhanVien')
        ->join('donviphanphoi', 'donviphanphoi.MaDonViPhanPhoi', '=', 'nhapkho.MaDonViPhanPhoi')
        ->join('tinh_trang_nhap_kho', 'tinh_trang_nhap_kho.MaNhapKho', '=', 'nhapkho.MaNhapKho')
        ->where('tinh_trang_nhap_kho.TinhTrang', '=', 0)->get();

        // dd($hoaDonChuaKiemTra);
        return DataTables::of($hoaDonChuaKiemTra)
            ->addIndexColumn()
            ->addColumn('TenNhanVien', function ($row) {
                // return $row->nhanVien->TenNhanVien;
                return $row->TenNhanVien;
            })
            ->addColumn('TenDonViPhanPhoi', function ($row) {
                return $row->TenDonViPhanPhoi;
            })
            ->addColumn('btnDetail', function($row){
                return route('chitietnhapnguyenvatlieu.show', $row->MaNhapKho);
            })
            ->make(true);
    }

    public function baoCaoNguyenVatLieuChuaDatChuan(){
        return view('QuanLyKho.baocao.bill-import-warehouse-unqualified');
    }

    public function ajaxBaoCaoNguyenVatLieuChuaDatChuan()
    {

        $hoaDonChuaDatChuan=NhapKho::selectRaw('nhapkho.*, nhanvien.TenNhanVien AS TenNhanVien, donviphanphoi.TenDonViPhanPhoi as TenDonViPhanPhoi')
        ->join('nhanvien', 'nhanvien.MaNhanVien', '=', 'nhapkho.MaNhanVien')
        ->join('donviphanphoi', 'donviphanphoi.MaDonViPhanPhoi', '=', 'nhapkho.MaDonViPhanPhoi')
        ->join('tinh_trang_nhap_kho', 'tinh_trang_nhap_kho.MaNhapKho', '=', 'nhapkho.MaNhapKho')
        ->where('tinh_trang_nhap_kho.TinhTrang', '=', 2)->get();

        // dd($hoaDonChuaDatChuan);
        return DataTables::of($hoaDonChuaDatChuan)
            ->addIndexColumn()
            ->addColumn('TenNhanVien', function ($row) {
                // return $row->nhanVien->TenNhanVien;
                return $row->TenNhanVien;
            })
            ->addColumn('TenDonViPhanPhoi', function ($row) {
                return $row->TenDonViPhanPhoi;
            })
            ->addColumn('btnDetail', function($row){
                return route('chitietnhapnguyenvatlieu.show', $row->MaNhapKho);
            })
            ->make(true);
    }

    public function baoCaoSanPham()
    {
        return view('QuanLyKho.baocao.report');
    }
}
