<?php

namespace App\Http\Controllers;

use App\Models\LoaiQuyTrinh;
use App\Http\Requests\StoreLoaiQuyTrinhRequest;
use App\Http\Requests\UpdateLoaiQuyTrinhRequest;
use App\Models\NguyenVatLieu;
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
        ->where('MaLoaiQuyTrinh','like', '%'. $search. '%')
        ->paginate(10);
        $nguyenvatlieu = NguyenVatLieu::class;

        return view('Qlqt.index',[
            'quytrinh' => $quytrinh,
            'search'  => $search,
            'nguyenvatlieu' => $nguyenvatlieu,
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
        return view('Qlqt.create',[
            'nguyenvatlieu' => $nguyenvatlieu,
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
        $quytrinh->create($request->validated());
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
        return view('Qlqt.edit',[
            'data' => $quytrinh,
            'nguyenvatlieu' => $nguyenvatlieu,
        ]);
    }

    public function update(UpdateLoaiQuyTrinhRequest $request, LoaiQuyTrinh $quytrinh)
    {
        $quytrinh->update($request->validated());
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
