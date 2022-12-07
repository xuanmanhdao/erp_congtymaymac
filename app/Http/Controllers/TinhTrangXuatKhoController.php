<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TinhTrangXuatKho;
use App\Models\XuatKho;
use App\Http\Requests\StoreTinhTrangXuatKho;
use App\Http\Requests\UpdateTinhTrangXuatKho;

class TinhTrangXuatKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TinhTrangXuatKho $tinhtrangxuatkho)
    {
        $search = $request->get('q');

        $tinhtrangxuatkho = $tinhtrangxuatkho->query()
        ->where('MaXuatKho','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlttxk.index',[
            'tinhtrangxuatkho' => $tinhtrangxuatkho,
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
       
       // SELECT * FROM `xuatkho` WHERE MaXuatKho NOT IN(SELECT MaXuatKho FROM tinh_trang_xuat_kho)
        $xuatkho = XuatKho::whereNotIn('MaXuatKho',function($query){
            $query->select('MaXuatKho')->from('tinh_trang_xuat_kho');
        })->get();
        return view('Qlttxk.create',['xuatkho'=>$xuatkho]); //,
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTinhTrangXuatKho $request,TinhTrangXuatKho $tinhtrangxuatkho)
    {
        //
       
         $tinhtrangxuatkho->create($request->validated());
        return redirect()->route('tinhtrangxuatkho.index')->with('success','Thêm thành công !');
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
    public function edit(TinhTrangXuatKho $tinhtrangxuatkho)
    {
        $xuatkho = XuatKho::get();
        
        return view('Qlttxk.edit',[
            'data' => $tinhtrangxuatkho,
            'xuatkho'=>$xuatkho,
            'tinhtrangxuatkho'=>$tinhtrangxuatkho]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTinhTrangXuatKho $request, TinhTrangXuatKho $tinhtrangxuatkho)
    {
        $tinhtrangxuatkho->update($request->validated());
        return redirect()->route('tinhtrangxuatkho.index')->with('success','Sửa thành công !');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TinhTrangXuatKho::destroy($id);
        return redirect()->route('tinhtrangxuatkho.index')->with('deleted', "Đã xoá thành công"); 
    }
}
