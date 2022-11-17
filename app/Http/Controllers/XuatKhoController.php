<?php

namespace App\Http\Controllers;

use App\Models\XuatKho;
use App\Http\Requests\StoreXuatKhoRequest;
use App\Http\Requests\UpdateXuatKhoRequest;
use App\Models\NhanVien;
use App\Models\Xuong;
use Yajra\DataTables\DataTables;

class XuatKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $totalLoaiSanPham = XuatKho::count();
        // return view('QuanLyKho.nhapkho.bill-import-warehouse', compact('totalLoaiSanPham'));
        return view('QuanLyKho.nhapkho.bill-import-warehouse');
    }

    public function ajaxXuatKhoIndex()
    {
        // $arrayXuatKho=XuatKho::query()->with('nhanVien', 'xuong');
        $arrayXuatKho = XuatKho::selectRaw('xuatkho.*, nhanvien.TenNhanVien AS TenNhanVien, xuong.TenXuong as TenXuong')
            ->join('nhanvien', 'nhanvien.MaNhanVien', '=', 'xuatkho.MaNhanVien')
            ->join('xuong', 'xuong.MaXuong', '=', 'xuatkho.MaXuong')
            ->get();
        // dd($arrayXuatKho);
        return DataTables::of($arrayXuatKho)
            ->addIndexColumn()
            ->addColumn('TenNhanVien', function ($row) {
                return $row->nhanVien->TenNhanVien;
            })
            ->addColumn('TenXuong', function ($row) {
                return $row->xuong->TenXuong;
            })
            ->addColumn('btnEdit', function ($row) {
                return route('nhapsanpham.edit', $row->MaXuatKho);
            })
            ->make(true);
    }

    public function getMaXuatKhoLast()
    {
        $lastID = XuatKho::orderBy('MaXuatKho', 'DESC')->first();
        return response()->json($lastID, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayLastXuatKho = XuatKho::orderBy('MaXuatKho', 'DESC')->first();
        $lastID = $arrayLastXuatKho->MaXuatKho;

        $arrayXuongEloquent = Xuong::get();
        $subset = $arrayXuongEloquent->map(function ($arrayXuong) {
            return $arrayXuong->only(['MaXuong', 'TenXuong']);
        });

        // dd();
        return response()->json(['arrayXuong' => $subset, 'lastIDXuatKho' => $lastID], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreXuatKhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreXuatKhoRequest $request)
    {
        XuatKho::create($request->validated());
        return response()->json(['message' => 'Đã thêm hóa đơn nhập sản phẩm thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\XuatKho  $xuatKho
     * @return \Illuminate\Http\Response
     */
    public function show(XuatKho $xuatKho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\XuatKho  $xuatKho
     * @return \Illuminate\Http\Response
     */
    public function edit(XuatKho $xuatKho)
    {
        $arrayXuongEloquent = Xuong::get();
        $subset = $arrayXuongEloquent->map(function ($arrayXuong) {
            return $arrayXuong->only(['MaXuong', 'TenXuong']);
        });
        return response()->json(['arrayXuong' => $subset, 'arrayXuatKho' => $xuatKho], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateXuatKhoRequest  $request
     * @param  \App\Models\XuatKho  $xuatKho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateXuatKhoRequest $request, XuatKho $xuatKho)
    {
        $xuatKho->update($request->validated());
        return response()->json(['message' => 'Đã sửa hóa đơn nhập sản phẩm thành công'], 200);
        // return redirect()->route('loaisanpham.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\XuatKho  $xuatKho
     * @return \Illuminate\Http\Response
     */
    public function destroy(XuatKho $xuatKho)
    {
        //
    }
}
