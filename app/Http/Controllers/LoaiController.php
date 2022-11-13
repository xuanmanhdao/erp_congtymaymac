<?php

namespace App\Http\Controllers;

use App\Exports\LoaiExport;
use App\Models\Loai;
use App\Http\Requests\StoreLoaiRequest;
use App\Http\Requests\UpdateLoaiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalLoaiSanPham = Loai::count();
        // SELECT loai.*, SUM(sanpham.SoLuong) AS TongSanPham FROM loai left JOIN sanpham ON loai.MaLoai=sanpham.MaLoai GROUP BY loai.MaLoai
        $arrayLoaiSanPham = Loai::selectRaw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham')
            // ->select(DB::raw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham'))
            // ->join('sanpham', 'sanpham.MaLoai', '=','loai.MaLoai')
            ->leftJoin('sanpham', 'sanpham.MaLoai', '=', 'loai.MaLoai')
            ->groupBy('loai.MaLoai')
            ->orderBy('loai.MaLoai')
            ->paginate(10);
        // ->get();

        // dd($arrayLoaiSanPham);

        return view('QuanLyKho.loaisanpham.product-type', compact('totalLoaiSanPham', 'arrayLoaiSanPham'));
    }

    public function orderByColumn(Request $request)
    {
        // dd($request->columnOrderby);
        $orderByColumn = $request->columnOrderby;
        $requestOrderby = $request->requestOrderby;
        $perPage = 10;
        $totalLoaiSanPham = Loai::count();
        $totalPage = ceil($totalLoaiSanPham / $perPage);

        $arrayLoaiSanPham = Loai::selectRaw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham')
            ->leftJoin('sanpham', 'sanpham.MaLoai', '=', 'loai.MaLoai')
            ->groupBy('loai.MaLoai')
            ->orderBy($request->columnOrderby, $request->requestOrderby)
            ->paginate($perPage);

        // return response()->json($arrayLoaiSanPham, 200);
        return view('QuanLyKho.loaisanpham.product-type', compact('totalLoaiSanPham', 'arrayLoaiSanPham', 'orderByColumn', 'requestOrderby', 'totalPage'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoaiRequest $request)
    {
        Loai::create($request->validated());
        return redirect()->route('loaisanpham.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function show(Loai $loai, Request $request)
    {
        if (isset($request->MaLoaiSanPham)) {
            $perPage = 10;
            $valueSearchMaLoaiSanPham = $request->MaLoaiSanPham;
            $arrayLoaiSanPham = Loai::selectRaw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham')
                ->leftJoin('sanpham', 'sanpham.MaLoai', '=', 'loai.MaLoai')
                ->where('loai.MaLoai', '=', $request->MaLoaiSanPham)
                ->groupBy('loai.MaLoai')
                ->orderBy('loai.MaLoai')
                ->paginate($perPage);
            $totalLoaiSanPham = $arrayLoaiSanPham->total();
            $totalPage = ceil($totalLoaiSanPham / $perPage);
            return view('QuanLyKho.loaisanpham.product-type', compact('totalLoaiSanPham', 'arrayLoaiSanPham', 'valueSearchMaLoaiSanPham', 'totalPage'));
        } elseif (isset($request->TenLoaiSanPham)) {
            $perPage = 10;
            $valueSearchTenLoaiSanPham = $request->TenLoaiSanPham;
            $arrayLoaiSanPham = Loai::selectRaw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham')
                ->leftJoin('sanpham', 'sanpham.MaLoai', '=', 'loai.MaLoai')
                ->where('loai.TenLoai', 'like', '%' . $request->TenLoaiSanPham . '%')
                ->groupBy('loai.MaLoai')
                ->orderBy('loai.MaLoai')
                ->paginate($perPage);
            $totalLoaiSanPham = $arrayLoaiSanPham->total();
            $totalPage = ceil($totalLoaiSanPham / $perPage);
            return view('QuanLyKho.loaisanpham.product-type', compact('totalLoaiSanPham', 'arrayLoaiSanPham', 'valueSearchTenLoaiSanPham', 'totalPage'));
            // dd($arrayLoaiSanPham);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function edit(Loai $loai)
    {
        // dd($loai);
        return response()->json($loai, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoaiRequest  $request
     * @param  \App\Models\Loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoaiRequest $request, Loai $loai)
    {
        $loai->update($request->validated());
        return redirect()->route('loaisanpham.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loai  $loai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loai $loai)
    {
        //
    }

    public function export()
    {
        return Excel::download(new LoaiExport(), 'danhsachloaisanpham'.'.xlsx');
    }
}
