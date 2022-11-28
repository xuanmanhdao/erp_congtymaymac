<?php

namespace App\Http\Controllers;

use App\Models\NguyenVatLieu;
use App\Http\Requests\StoreNguyenVatLieuRequest;
use App\Http\Requests\UpdateNguyenVatLieuRequest;
use App\Models\ChatLieu;
use App\Models\DonViPhanPhoi;
use App\Models\Xuong;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NguyenVatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('QuanLyKho.nguyenvatlieu.ingredient');
    }

    public function ajaxNguyenVatLieuIndex()
    {
        $arrayNguyenVatLieu = NguyenVatLieu::selectRaw('nguyenvatlieu.*, chatlieu.TenChatLieu AS TenChatLieu')
            ->join('chatlieu', 'chatlieu.MaChatLieu', '=', 'nguyenvatlieu.MaChatLieu')
            ->get();

        return DataTables::of($arrayNguyenVatLieu)
            ->addIndexColumn()
            ->addColumn('TenChatLieu', function ($row) {
                return $row->TenChatLieu;
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
        $arrayKieuNguyenLieu = ChatLieu::get();
        $subsetKieuNguyenLieu = $arrayKieuNguyenLieu->map(function ($arrayKieuNguyenLieu) {
            return $arrayKieuNguyenLieu->only(['MaChatLieu', 'TenChatLieu']);
        });

        return response()->json(['arrayKieuNguyenLieu' => $subsetKieuNguyenLieu], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNguyenVatLieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNguyenVatLieuRequest $request, NguyenVatLieu $nguyenVatLieu)
    {
        // dd("Alo");
        $nguyenVatLieu->create($request->validated());
        return response()->json(['message' => 'Đã thêm nguyên vật liệu thành công'], 200);
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
        // $xuong = Xuong::get();
        // $donviphanphoi = DonViPhanPhoi::get();
        // return view('Qlnvl.edit', [
        //     'xuong' => $xuong,
        //     'donviphanphoi' => $donviphanphoi,
        //     'data' => $nguyenvatlieu,
        // ]);
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
        // $nguyenvatlieu->update($request->validated());
        // return redirect()->route('nguyenvatlieu.index')->with('edited', 'Sửa thành công');
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
