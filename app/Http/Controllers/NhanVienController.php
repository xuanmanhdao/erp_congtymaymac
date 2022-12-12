<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\ChucVu;
use App\Models\Xuong;
use App\Http\Requests\StoreNhanVienRequest;
use App\Http\Requests\UpdateNhanVienRequest;
use App\Models\TaiKhoan;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, NhanVien $nhanvien)
    {
        $search = $request->get('q');

        $nhanvien = $nhanvien->query()
        ->where('MaNhanVien','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlnv.index',[
            'nhanvien' => $nhanvien,
            'search'  => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $chucvu = ChucVu::get();
         $xuong = Xuong::get();
        return view('Qlnv.create',['chucvu'=>$chucvu,'xuong'=>$xuong]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhanVienRequest  $request
     * @return \Illuminate\Http\Response
     */
   public function store(StoreNhanVienRequest $request, NhanVien $nhanvien)
    {
        
        $nhanvien->create($request->validated());
        $maNhanVien = $request->MaNhanVien;
        $matKhauMacDinh = '123456';
        TaiKhoan::create([
            'MaNhanVien' => $maNhanVien,
            'MatKhau' => $matKhauMacDinh,
            'Quyen' => $request->Quyen,
        ]);
        return redirect()->route('nhanvien.index')->with('success','Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function show(NhanVien $nhanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function edit(NhanVien $nhanvien)
    {
        //
       
          $chucvu = ChucVu::get();
         $xuong = Xuong::get();
        return view('Qlnv.edit',[
            'data' => $nhanvien,
            'nhanvien'=>$nhanvien,
            'chucvu'=>$chucvu,
            'xuong'=>$xuong,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhanVienRequest  $request
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhanVienRequest $request, NhanVien $nhanvien)
    {
        //
         $nhanvien->update($request->validated());
        return redirect()->route('nhanvien.index')->with('success','Sửa thành công !');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(NhanVien $nhanVien)
    {
        //
    }
}
