<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\Loai;
use App\Models\LoaiQuyTrinh;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('QuanLyKho.sanpham.product');
    }

    public function ajaxSanPhamIndex()
    {
        // $arrayXuatKho=XuatKho::query()->with('nhanVien', 'xuong');

        return DataTables::of(SanPham::get())
            ->addIndexColumn()
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $arrayLastSanPham = SanPham::orderBy('MaSanPham', 'DESC')->first();
        // $lastID = $arrayLastSanPham->MaSanPham;

        //     $numberLastID=substr($lastID, 3,10);
        //     dd($numberLastID);

        $arrayLoaiSanPhamEloquent = Loai::get();
        $subsetLoaiSanPham = $arrayLoaiSanPhamEloquent->map(function ($arrayLoaiSanPham) {
            return $arrayLoaiSanPham->only(['MaLoai', 'TenLoai']);
        });

        $arrayLoaiQuyTrinhEloquent = LoaiQuyTrinh::get();
        $subsetLoaiQuyTrinh = $arrayLoaiQuyTrinhEloquent->map(function ($arrayLoaiQuyTrinh) {
            return $arrayLoaiQuyTrinh->only(['MaLoaiQuyTrinh', 'TenQuyTrinh']);
        });

        // dd();
        // return response()->json(['arrayLoaiSanPham' => $subsetLoaiSanPham, 'arrayLoaiQuyTrinh' => $subsetLoaiQuyTrinh, 'lastIDSanPham' => $lastID], 200);
        return response()->json(['arrayLoaiSanPham' => $subsetLoaiSanPham, 'arrayLoaiQuyTrinh' => $subsetLoaiQuyTrinh], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSanPhamRequest $request)
    {
        // dd($request);
        $images = array();
        if ($files = $request->file('HinhAnh')) {
            foreach ($files as $file) {
                $request->validate([
                    'HinhAnh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                ]);
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $file->getClientOriginalName();

                // $file->move(base_path() . '/uploads/file/image', $imageName); // Cách này không khả thi vì không thể truy cập file từ ổ đĩa cứng trên máy được

                $file->storeAs('public/images/', $imageName);
                $images[] = $imageName;
            }
        }
        // dd($request);

        SanPham::insert([
            'MaSanPham' => $request->MaSanPham,
            'TenSanPham' => $request->TenSanPham,
            'MoTaSanPham' => $request->MoTaSanPham,
            'MaLoai' => $request->MaLoai,
            'MaLoaiQuyTrinh' => $request->MaLoaiQuyTrinh,
            'HinhAnh' =>  implode("|", $images)
        ]);


        return response()->json(['message' => 'Đã thêm hóa đơn nhập sản phẩm thành công'], 200);

        // return redirect()->route('nhapsanpham.index')->with('success', 'Đã thêm thành công');

        // return redirect()->route('chitietnhapsanpham.create')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanPhamRequest  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSanPhamRequest $request, SanPham $sanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham)
    {
        //
    }

    public function test()
    {
        $arraySanPhamEloquent=SanPham::get();
        $subsetSanPham = $arraySanPhamEloquent->map(function ($arraySanPham) {
            return $arraySanPham->only(['HinhAnh']);
        });

        dd($subsetSanPham[2]);


        $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
        $pieces = explode(" ", $pizza);
        echo $pieces[0]; // piece1
        echo $pieces[1]; // piece2
        dd(base_path() . '/uploads/file/image');
    }
}
