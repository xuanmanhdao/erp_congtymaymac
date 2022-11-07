<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTietNhapKho;
use App\Http\Requests\ChiTietNhapKho\StoreChiTietNhapKhoRequest;
use App\Http\Requests\ChiTietNhapKho\UpdateChiTietNhapKhoRequest;
use Illuminate\Support\Facades\DB;

class ChiTietNhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ChiTietNhapKho $chitietnhapkho)
    {
        $search = $request->get('q');

        $chitietnhapkho = $chitietnhapkho->query()
        ->where('MaNhapKho','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlctnk.index',[
            'chitietnhapkho' => $chitietnhapkho,
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
        //

        $nhapkho = DB::table('nhapkho')->get('MaNhapKho');
        
        return view('Qlctnk.create',['nhapkho'=>$nhapkho]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChiTietNhapKhoRequest $request,ChiTietNhapKho $chitietnhapkho)
    {
        //
        $requestchitietnhapkho = $request->except('id');
         $chitietnhapkho->create($requestchitietnhapkho);
        return redirect()->route('chitietnhapkho.index')->with('success','Thêm thành công !');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
