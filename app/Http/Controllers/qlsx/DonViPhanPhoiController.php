<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonViPhanPhoi;
use App\Http\Requests\DonViPhanPhoi\StoreDonViPhanPhoiRequest;
use App\Http\Requests\DonViPhanPhoi\UpdateDonViPhanPhoiRequest;

class DonViPhanPhoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DonViPhanPhoi $donviphanphoi)
    {
        $search = $request->get('q');

        $donviphanphoi = $donviphanphoi->query()
        ->where('MaDonViPhanPhoi','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qldvpp.index',[
            'donviphanphoi' => $donviphanphoi,
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
        return view('Qldvpp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(StoreDonViPhanPhoiRequest $request, DonViPhanPhoi $donviphanphoi)
    {
        $donviphanphoi->create($request->validated());
        return redirect()->route('donviphanphoi.index')->with('success','Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DonViPhanPhoi $donviphanphoi)
    {
        return view('Qldvpp.edit',[
            'data' => $donviphanphoi,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateDonViPhanPhoiRequest $request, DonViPhanPhoi $donviphanphoi)
    {
        $donviphanphoi->update($request->validated());
        return redirect()->route('donviphanphoi.index')->with('success','Sửa thành công !');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
