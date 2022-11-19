<?php

namespace App\Http\Controllers;

use App\Models\LoaiQuyTrinh;
use App\Http\Requests\StoreLoaiQuyTrinhRequest;
use App\Http\Requests\UpdateLoaiQuyTrinhRequest;
use App\Models\ChatLieu;
use App\Models\NguyenVatLieu;
use App\Models\NguyenVatLieuLoaiQuyTrinh;
use Illuminate\Http\Request;

class LoaiQuyTrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, LoaiQuyTrinh $quytrinh)
    {
        

        $search = $request->get('q');
        $quytrinh = $quytrinh->query()
            ->where('MaLoaiQuyTrinh', 'like', '%' . $search . '%')
            ->paginate(10);

        /* foreach($quytrinh as $quytrinh){
            echo $quytrinh->MaLoaiQuyTrinh;
            echo '<br>';
            foreach($quytrinh->nguyenVatLieu as $nguyenvatlieu){
                echo $nguyenvatlieu->TenNguyenVatLieu.',';
            }
            echo '<hr>';
        }
        dd(); */
        return view('Qlqt.index', [
            'quytrinh' => $quytrinh,
            'search'  => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, LoaiQuyTrinh $quytrinh)
    {
        $nguyenvatlieu = NguyenVatLieu::get();
        $chatlieu = ChatLieu::get();
        return view('Qlqt.create', [
            'nguyenvatlieu' => $nguyenvatlieu,
            'chatlieu' => $chatlieu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoaiQuyTrinhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoaiQuyTrinhRequest $request, LoaiQuyTrinh $quytrinh)
    {
        // $quytrinh->create($request->validated());
        // return redirect()->route('quytrinh.index')->with('success', 'Đã thêm thành công');

        $quytrinh->fill($request->all()); // Lấy hết dữ liệu
        $quytrinh->fill($request->except('_token')); // Lấy hết dữ liệu ngoại trừ thuộc tính _token
        $quytrinh->save();

        foreach ($request->NguyenVatLieu as $value) {
            $nguyenVatLieuLoaiQuyTrinh = new NguyenVatLieuLoaiQuyTrinh();
            $nguyenVatLieuLoaiQuyTrinh->setLoaiQuyTrinh($request->MaLoaiQuyTrinh);
            $nguyenVatLieuLoaiQuyTrinh->setNguyenVatLieu($value);
            $nguyenVatLieuLoaiQuyTrinh->save();
        }

        return redirect()->route('quytrinh.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiQuyTrinh  $loaiQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiQuyTrinh $loaiQuyTrinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiQuyTrinh  $loaiQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiQuyTrinh $quytrinh)
    {
        $nguyenvatlieu = NguyenVatLieu::get();
        return view('Qlqt.edit', [
            'data' => $quytrinh,
            'nguyenvatlieu' => $nguyenvatlieu,
        ]);
    }

    public function update(UpdateLoaiQuyTrinhRequest $request, LoaiQuyTrinh $quytrinh)
    {
        // dd($request);
        $quytrinh->update($request->validated());
        $deleteValueCu = NguyenVatLieuLoaiQuyTrinh::where('MaLoaiQuyTrinh', $request->MaLoaiQuyTrinh)->delete();
        foreach ($request->NguyenVatLieu as $value) {
            $nguyenVatLieuLoaiQuyTrinh = new NguyenVatLieuLoaiQuyTrinh();
            $nguyenVatLieuLoaiQuyTrinh->setLoaiQuyTrinh($request->MaLoaiQuyTrinh);
            $nguyenVatLieuLoaiQuyTrinh->setNguyenVatLieu($value);
            $nguyenVatLieuLoaiQuyTrinh->save();
        }
        return redirect()->route('quytrinh.index')->with('edited', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiQuyTrinh  $loaiQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiQuyTrinh $loaiQuyTrinh)
    {
        //
    }
}
