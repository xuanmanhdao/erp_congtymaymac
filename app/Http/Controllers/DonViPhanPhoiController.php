<?php

namespace App\Http\Controllers;

use App\Models\DonViPhanPhoi;
use App\Http\Requests\StoreDonViPhanPhoiRequest;
use App\Http\Requests\UpdateDonViPhanPhoiRequest;
use Yajra\DataTables\DataTables;

class DonViPhanPhoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('QuanLyKho.donviphanphoi.supplier');
    }

    public function ajaxDonViPhanPhoiIndex()
    {

        return DataTables::of(DonViPhanPhoi::get())
            ->addIndexColumn()
            ->addColumn('btnEditDonViPhanPhoi', function ($row) {
                return route('donviphanphoi.edit', $row->MaDonViPhanPhoi);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDonViPhanPhoiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonViPhanPhoiRequest $request, DonViPhanPhoi $donViPhanPhoi)
    {
        $donViPhanPhoi::create($request->validated());
        return response()->json(['message' => 'Đã thêm kiểu nguyên vật liệu thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonViPhanPhoi  $donViPhanPhoi
     * @return \Illuminate\Http\Response
     */
    public function show(DonViPhanPhoi $donViPhanPhoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonViPhanPhoi  $donViPhanPhoi
     * @return \Illuminate\Http\Response
     */
    public function edit(DonViPhanPhoi $donViPhanPhoi)
    {
        return response()->json($donViPhanPhoi, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDonViPhanPhoiRequest  $request
     * @param  \App\Models\DonViPhanPhoi  $donViPhanPhoi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonViPhanPhoiRequest $request, DonViPhanPhoi $donViPhanPhoi)
    {
        $donViPhanPhoi->update($request->validated());
        return response()->json(['message' => 'Đã sửa đơn vị cung cấp thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonViPhanPhoi  $donViPhanPhoi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonViPhanPhoi $donViPhanPhoi)
    {
        //
    }
}
