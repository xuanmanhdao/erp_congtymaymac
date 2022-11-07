<?php

namespace App\Http\Controllers;

use App\Models\NguyenVatLieu;
use App\Http\Requests\StoreNguyenVatLieuRequest;
use App\Http\Requests\UpdateNguyenVatLieuRequest;
use App\Models\DonViPhanPhoi;
use App\Models\Xuong;
use Illuminate\Http\Request;

class NguyenVatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, NguyenVatLieu $nguyenvatlieu)
    {
        $search = $request->get('q');

        $nguyenvatlieu = $nguyenvatlieu->query()
        ->where('MaNguyenVatLieu','like', '%'. $search. '%')
        ->paginate(10);
        $xuong = Xuong::get();
        $donviphanphoi = DonViPhanPhoi::get();

        return view('qlnvl.index',[
            'donviphanphoi' => $donviphanphoi,
            'xuong' => $xuong,
            'search'  => $search,
            'nguyenvatlieu' => $nguyenvatlieu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xuong = Xuong::get();
        $donviphanphoi = DonViPhanPhoi::get();
        return view('Qlnvl.create',[
            'xuong' => $xuong,
            'donviphanphoi' => $donviphanphoi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNguyenVatLieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNguyenVatLieuRequest $request, NguyenVatLieu $nguyenvatlieu)
    {
        $nguyenvatlieu->create($request->validated());
        return redirect()->route('nguyenvatlieu.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguyenVatLieu  $nguyenVatLieu
     * @return \Illuminate\Http\Response
     */
    public function show(NguyenVatLieu $nguyenVatLieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguyenVatLieu  $nguyenVatLieu
     * @return \Illuminate\Http\Response
     */
    public function edit(NguyenVatLieu $nguyenvatlieu)
    {
        $xuong = Xuong::get();
        $donviphanphoi = DonViPhanPhoi::get();
        return view('Qlnvl.edit',[
            'xuong' => $xuong,
            'donviphanphoi' => $donviphanphoi,
            'data' => $nguyenvatlieu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNguyenVatLieuRequest  $request
     * @param  \App\Models\NguyenVatLieu  $nguyenVatLieu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNguyenVatLieuRequest $request, NguyenVatLieu $nguyenvatlieu)
    {
        $nguyenvatlieu->update($request->validated());
        return redirect()->route('nguyenvatlieu.index')->with('edited', 'Sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NguyenVatLieu  $nguyenVatLieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguyenVatLieu $nguyenVatLieu)
    {
        //
    }
}
