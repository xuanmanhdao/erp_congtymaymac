<?php

namespace App\Http\Controllers;

use App\Models\NhapKho;
use App\Http\Requests\StoreNhapKhoRequest;
use App\Http\Requests\UpdateNhapKhoRequest;
use App\Models\DonViPhanPhoi;
use Yajra\DataTables\DataTables;

class NhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('QuanLyKho.nhapkhonguyenlieu.bill-import-ingredient');
    }

    public function ajaxNhapKhoNguyenVatLieuIndex()
    {
        // $arrayXuatKho=XuatKho::query()->with('nhanVien', 'xuong');
        $arrayNhapKhoNguyenVatLieu = NhapKho::selectRaw('nhapkho.*, nhanvien.TenNhanVien AS TenNhanVien, donviphanphoi.TenDonViPhanPhoi as TenDonViPhanPhoi')
            ->join('nhanvien', 'nhanvien.MaNhanVien', '=', 'nhapkho.MaNhanVien')
            ->join('donviphanphoi', 'donviphanphoi.MaDonViPhanPhoi', '=', 'nhapkho.MaDonViPhanPhoi')
            ->get();
        // dd($arrayNhapKhoNguyenVatLieu);
        return DataTables::of($arrayNhapKhoNguyenVatLieu)
            ->addIndexColumn()
            ->addColumn('TenNhanVien', function ($row) {
                // return $row->nhanVien->TenNhanVien;
                return $row->TenNhanVien;
            })
            ->addColumn('TenDonViPhanPhoi', function ($row) {
                return $row->TenDonViPhanPhoi;
            })
            ->addColumn('btnEdit', function ($row) {
                return route('nhapnguyenlieu.edit', $row->MaNhapKho);
            })
            ->addColumn('btnDetail', function($row){
                return route('chitietnhapnguyenvatlieu.show', $row->MaNhapKho);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayRecordLastOfNhapKhoNguyenVatLieu = NhapKho::orderBy('MaNhapKho', 'DESC')->first();
        $lastID = $arrayRecordLastOfNhapKhoNguyenVatLieu->MaNhapKho;

        $arrayDonViPhanPhoiEloquent = DonViPhanPhoi::get();
        $subset = $arrayDonViPhanPhoiEloquent->map(function ($arrayDonViPhanPhoi) {
            return $arrayDonViPhanPhoi->only(['MaDonViPhanPhoi', 'TenDonViPhanPhoi']);
        });

        return response()->json(['arrayDonViPhanPhoi' => $subset, 'lastIDNhapKhoNguyenVatLieu' => $lastID], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhapKhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNhapKhoRequest $request)
    {
        NhapKho::create($request->validated());
        return response()->json(['message' => 'Đã thêm hóa đơn nhập sản phẩm thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhapKho  $nhapKho
     * @return \Illuminate\Http\Response
     */
    public function show(NhapKho $nhapKho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhapKho  $nhapKho
     * @return \Illuminate\Http\Response
     */
    public function edit(NhapKho $nhapKho)
    {
        $arrayDonViPhanPhoiEloquent = DonViPhanPhoi::get();
        $subset = $arrayDonViPhanPhoiEloquent->map(function ($arrayDonViPhanPhoi) {
            return $arrayDonViPhanPhoi->only(['MaDonViPhanPhoi', 'TenDonViPhanPhoi']);
        });
        return response()->json(['arrayDonViPhanPhoi' => $subset, 'arrayNhapKho' => $nhapKho], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhapKhoRequest  $request
     * @param  \App\Models\NhapKho  $nhapKho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhapKhoRequest $request, NhapKho $nhapKho)
    {
        $nhapKho->update($request->validated());
        return response()->json(['message' => 'Đã sửa hóa đơn nhập sản phẩm thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhapKho  $nhapKho
     * @return \Illuminate\Http\Response
     */
    public function destroy(NhapKho $nhapKho)
    {
        //
    }
}
