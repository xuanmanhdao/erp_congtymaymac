<?php

namespace App\Http\Controllers;

use App\Models\ChiTietNhapKho;
use App\Http\Requests\StoreChiTietNhapKhoRequest;
use App\Http\Requests\UpdateChiTietNhapKhoRequest;
use App\Models\NguyenVatLieu;
use App\Models\NhapKho;
use Yajra\DataTables\DataTables;

class ChiTietNhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayNhapKhoNguyenVatLieuEloquent = NhapKho::get();
        $arrayNguyenVatLieuEloquent = NguyenVatLieu::get();
        return view('QuanLyKho.nhapkhonguyenlieu.add-bill-import-ingredient-detail', compact('arrayNhapKhoNguyenVatLieuEloquent', 'arrayNguyenVatLieuEloquent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChiTietNhapKhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChiTietNhapKhoRequest $request)
    {
        $chiTietNhapKho = new ChiTietNhapKho();
        $chiTietNhapKho->fill($request->except('_token')); // Lấy hết dữ liệu ngoại trừ thuộc tính _token
        $chiTietNhapKho->setThanhTien($request->SoLuong, $request->Gia);
        $chiTietNhapKho->save();

        $nguyenVatLieu = NguyenVatLieu::findOrFail($request->MaNguyenVatLieu);
        $soLuongCu = $nguyenVatLieu->SoLuong;

        $soLuongMoi = $soLuongCu + $request->SoLuong;
        $donViTinhMoi = $request->DonViTinh;

        $nguyenVatLieu->update([
            'SoLuong' => $soLuongMoi,
            'DonViTinh' => $donViTinhMoi
        ]);

        $tongGiaNhapKho = ChiTietNhapKho::selectRaw('COALESCE(SUM(ThanhTien), 0) AS TongGiaThanhTien')
            ->where('MaNhapKho', $request->MaNhapKho)
            ->groupBy('MaNhapKho')
            ->get();

        foreach ($tongGiaNhapKho as $tonggianhapkho) {
            $thanhTienMoi = $tonggianhapkho->TongGiaThanhTien;
        }

        $nhapKho = NhapKho::findOrFail($request->MaNhapKho);
        $nhapKho->update([
            'TongGia' => $thanhTienMoi,
        ]);

        return redirect()->route('nhapnguyenlieu.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChiTietNhapKho  $chiTietNhapKho
     * @return \Illuminate\Http\Response
     */
    public function show($maNhapKho)
    {
        return view('QuanLyKho.nhapkhonguyenlieu.bill-import-ingredient-detail')->with('maNhapKho', $maNhapKho);
    }

    public function ajaxShowForMaNhapKho($maNhapKho)
    {
      
        $arrayChiTietNhapKho = ChiTietNhapKho::select('chitietnhapkho.MaNhapKho', 'MaNguyenVatLieu', 'SoLuong', 'DonViTinh', 'Gia', 'ThanhTien','nhapkho.ThoiGianNhap')
            ->join('nhapkho', 'chitietnhapkho.MaNhapKho', '=', 'nhapkho.MaNhapKho')
            ->where('chitietnhapkho.MaNhapKho', '=', $maNhapKho)
            ->get();
        //   dd($arrayChiTietNhapKho); 
        return DataTables::of($arrayChiTietNhapKho)
            ->addIndexColumn()
            ->addColumn('ThoiGianNhap', function ($row) {
                return $row->ThoiGianNhap;
            })
            ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChiTietNhapKho  $chiTietNhapKho
     * @return \Illuminate\Http\Response
     */
    public function edit(ChiTietNhapKho $chiTietNhapKho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChiTietNhapKhoRequest  $request
     * @param  \App\Models\ChiTietNhapKho  $chiTietNhapKho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChiTietNhapKhoRequest $request, ChiTietNhapKho $chiTietNhapKho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChiTietNhapKho  $chiTietNhapKho
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChiTietNhapKho $chiTietNhapKho)
    {
        //
    }
}
