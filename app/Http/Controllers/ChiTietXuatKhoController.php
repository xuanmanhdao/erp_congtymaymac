<?php

namespace App\Http\Controllers;

use App\Models\ChiTietXuatKho;
use App\Http\Requests\StoreChiTietXuatKhoRequest;
use App\Http\Requests\UpdateChiTietXuatKhoRequest;
use App\Models\SanPham;
use App\Models\XuatKho;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChiTietXuatKhoController extends Controller
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
        $arrayXuatKhoEloquent = XuatKho::get();
        // $subsetXuatKho = $arrayXuatKhoEloquent->map(function ($arrayXuatKho) {
        //     return $arrayXuatKho->only(['MaXuatKho']);
        // });

        $arraySanPhamEloquent = SanPham::get();
        // $subsetSanPham = $arraySanPhamEloquent->map(function ($arraySanPham) {
        //     return $arraySanPham->only(['MaSanPham', 'TenSanPham']);
        // });

        // return view('QuanLyKho.nhapkho.bill-import-warehouse-add-details', compact('subsetXuatKho', 'subsetSanPham'));
        return view('QuanLyKho.nhapkho.bill-import-warehouse-add-details', compact('arrayXuatKhoEloquent', 'arraySanPhamEloquent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChiTietXuatKhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChiTietXuatKhoRequest $request)
    {
        $chiTietXuatKho = new ChiTietXuatKho();
        $chiTietXuatKho->fill($request->except('_token')); // Lấy hết dữ liệu ngoại trừ thuộc tính _token
        $chiTietXuatKho->setThanhTien($request->SoLuong, $request->Gia);
        $chiTietXuatKho->save();

        $sanPham = SanPham::findOrFail($request->MaSanPham);
        $soLuongCu = $sanPham->SoLuong;

        $soLuongMoi = $soLuongCu + $request->SoLuong;
        $donViTinhMoi = $request->DonViTinh;

        $sanPham->update([
            'SoLuong' => $soLuongMoi,
            'DonViTinh' => $donViTinhMoi
        ]);

        $tongGiaXuatKho = ChiTietXuatKho::selectRaw('COALESCE(SUM(ThanhTien), 0) AS TongGiaThanhTien')
            ->where('MaXuatKho', $request->MaXuatKho)
            ->groupBy('MaXuatKho')
            ->get();

        foreach ($tongGiaXuatKho as $tonggiaxuatkho) {
            $thanhTienMoi = $tonggiaxuatkho->TongGiaThanhTien;
        }

        $xuatKho = XuatKho::findOrFail($request->MaXuatKho);
        $xuatKho->update([
            'TongGia' => $thanhTienMoi,
        ]);

        return redirect()->route('nhapsanpham.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChiTietXuatKho  $chiTietXuatKho
     * @return \Illuminate\Http\Response
     */
    public function show($maXuatKho)
    {
        return view('QuanLyKho.nhapkho.bill-import-warehouse-detail')->with('maXuatKho', $maXuatKho);
    }

    public function ajaxShowForMaXuatKho($maXuatKho)
    {
      
        $arrayChiTietXuatKho = ChiTietXuatKho::select('chitietxuatkho.MaXuatKho', 'MaSanPham', 'SoLuong', 'DonViTinh', 'Gia', 'ThanhTien','xuatkho.ThoiGianXuat')
            ->join('xuatkho', 'chitietxuatkho.MaXuatKho', '=', 'xuatkho.MaXuatKho')
            ->where('chitietxuatkho.MaXuatKho', '=', $maXuatKho)
            ->get();
        //   dd($arrayChiTietXuatKho); 
        return DataTables::of($arrayChiTietXuatKho)
            ->addIndexColumn()
            ->addColumn('ThoiGianXuat', function ($row) {
                return $row->ThoiGianXuat;
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChiTietXuatKho  $chiTietXuatKho
     * @return \Illuminate\Http\Response
     */
    public function edit(ChiTietXuatKho $chiTietXuatKho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChiTietXuatKhoRequest  $request
     * @param  \App\Models\ChiTietXuatKho  $chiTietXuatKho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChiTietXuatKhoRequest $request, ChiTietXuatKho $chiTietXuatKho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChiTietXuatKho  $chiTietXuatKho
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChiTietXuatKho $chiTietXuatKho)
    {
        //
    }
}
