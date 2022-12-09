<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TinhTrangNhapKho;
use App\Models\NhapKho;
use App\Http\Requests\StoreTinhTrangNhapKho;
use App\Http\Requests\UpdateTinhTrangNhapKho;

class TinhTrangNhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, TinhTrangNhapKho $tinhtrangnhapkho)
    {
        $search = $request->get('q');

        $tinhtrangnhapkho = $tinhtrangnhapkho->query()
        ->where('MaNhapKho','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlttnk.index',[
            'tinhtrangnhapkho' => $tinhtrangnhapkho,
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
        $nhapkho = NhapKho::whereNotIn('MaNhapKho',function($query){
            $query->select('MaNhapKho')->from('tinh_trang_nhap_kho');
        })->get();
        return view('Qlttnk.create',['nhapkho'=>$nhapkho]); //,
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(StoreTinhTrangNhapKho $request,TinhTrangNhapKho $tinhtrangnhapkho)
    {
       
       
         $tinhtrangnhapkho->create($request->validated());
        return redirect()->route('tinhtrangnhapkho.index')->with('success','Thêm thành công !');
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
    public function edit(TinhTrangNhapKho $tinhtrangnhapkho)
    {
        //
        $nhapkho = NhapKho::get();
        
        return view('Qlttnk.edit',[
            'data' => $tinhtrangnhapkho,
            'nhapkho'=>$nhapkho,
            'tinhtrangnhapkho'=>$tinhtrangnhapkho]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTinhTrangNhapKho $request, TinhTrangNhapKho $tinhtrangnhapkho)
    {
        //
        $tinhtrangnhapkho->update($request->validated());
        return redirect()->route('tinhtrangnhapkho.index')->with('success','Sửa thành công !'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TinhTrangNhapKho::destroy($id);
        return redirect()->route('tinhtrangnhapkho.index')->with('deleted', "Đã xoá thành công");  
    }
}
