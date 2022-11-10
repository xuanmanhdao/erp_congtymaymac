<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTietNhapKho;
use App\Models\NguyenVatLieu;
use App\Models\DonViPhanPhoi;
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
        $nguyenvatlieu = NguyenVatLieu::get();
        $donviphanphoi = DonViPhanPhoi::get();
        return view('Qlctnk.create',['nhapkho'=>$nhapkho,'nguyenvatlieu'=>$nguyenvatlieu,'donviphanphoi'=>$donviphanphoi]); //,
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
   public function edit(ChiTietNhapKho $chitietnhapkho)
    {
        //
       $nhapkho = DB::table('nhapkho')->get('MaNhapKho');
         $nguyenvatlieu = NguyenVatLieu::get();
           $donviphanphoi = DonViPhanPhoi::get();
        return view('Qlctnk.edit',[
            'data' => $chitietnhapkho,
            'nhapkho'=>$nhapkho,
            'nguyenvatlieu'=>$nguyenvatlieu,
            'donviphanphoi'=>$donviphanphoi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChiTietNhapKhoRequest $request, ChiTietNhapKho $chitietnhapkho)
    {
        //
         $chitietnhapkho->update($request->validated());
        return redirect()->route('chitietnhapkho.index')->with('success','Sửa thành công !');   
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
