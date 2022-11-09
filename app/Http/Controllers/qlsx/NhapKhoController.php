<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhapKho;
use App\Models\NhanVien;
use App\Models\DonViPhanPhoi;

use App\Http\Requests\NhapKho\StoreNhapKhoRequest;
use App\Http\Requests\NhapKho\UpdateNhapKhoRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class NhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, NhapKho $nhapkho)
    {
        $search = $request->get('q');

        $nhapkho = $nhapkho->query()
        ->where('MaNhapKho','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlnk.index',[
            'nhapkho' => $nhapkho,
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
         // $nhanvien = session()->get('MaNhanVien'); 
        $nhanvien =NhanVien::get();
      
        $donviphanphoi = DonViPhanPhoi::get();
        
        return view('Qlnk.create',['donviphanphoi'=>$donviphanphoi,'nhanvien'=>$nhanvien]);

        // ->with('nhanvien',$nhanvien)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNhapKhoRequest $request, NhapKho $nhapkho)
    {
         
        $requestnhapkho = $request->except('MaNhapKho');
       
        $nhapkho->create($requestnhapkho);
        // dd($requestnhapkho);
 
        
        return redirect()->route('nhapkho.index');

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
    public function edit(NhapKho $nhapkho)
    {
        //
        $nhanvien =NhanVien::get();
      
        $donviphanphoi = DonViPhanPhoi::get();
        return view('Qlnk.edit',[
            'data' => $nhapkho,
            'donviphanphoi'=>$donviphanphoi,
            'nhanvien'=>$nhanvien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhapKhoRequest $request, NhapKho $nhapkho)
    {
        $nhapkho->update($request->validated());
        return redirect()->route('nhapkho.index')->with('success','Sửa thành công !');   
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
