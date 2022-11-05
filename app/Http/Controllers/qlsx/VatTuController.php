<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use App\Models\VatTu;
use Illuminate\Http\Request;
use App\Http\Requests\VatTu\StoreVatTuRequest;
use App\Http\Requests\VatTu\UpdateVatTuRequest;
use Illuminate\Support\Facades\DB;

class VatTuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, VatTu $vattu)
    {
        $search = $request->get('q');

        $vattu = $vattu->query()
        ->where('MaVatTu','like', '%'. $search. '%')
        ->paginate(5);

        return view('Qlvt.index',[
            'vattu' => $vattu,
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
        $xuong = DB::table('xuong')->get('MaXuong');
        return view('Qlvt.create',['xuong'=>$xuong]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVatTuRequest $request, VatTu $vattu)
    {
        $vattu->create($request->validated());
        return redirect()->route('vattu.index')->with('success','Thêm thành công !');
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
    public function edit(VatTu $vattu)
    {
        $xuong = DB::table('xuong')->get('MaXuong');
        return view('Qlvt.edit',[
            'data' => $vattu,
            'xuong'=>$xuong
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVatTuRequest $request, VatTu $vattu)
    {
        $vattu->update($request->validated());
        return redirect()->route('vattu.index')->with('success','Sửa thành công !');   
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
        // VatTu::destroy($id);
        // return redirect()->route('vattu.index');  
    }
}
