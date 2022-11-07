<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeHoach\KeHoachStoreRequest;
use App\Http\Requests\KeHoach\StoreKeHoachRequest;
use App\Http\Requests\KeHoach\UpdateKeHoachRequest;
use App\Models\KeHoach;
use App\Models\LoaiQuyTrinh;
use App\Models\Xuong;
use Illuminate\Http\Request;

class KeHoachController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KeHoach $kehoach)
    {
        $search = $request->get('q');

        $kehoach = $kehoach->query()
        ->where('MaKeHoach','like', '%'. $search. '%')
        ->paginate(10);
        
        $xuong = Xuong::class;
        $quytrinh = LoaiQuyTrinh::class;

        return view('Qlkh.index',[
            'kehoach' => $kehoach,
            'search'  => $search,
            'xuong' => $xuong,
            'quytrinh' => $quytrinh,
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
        $quytrinh = LoaiQuyTrinh::get();
        return view('qlkh.create',[
            'xuong' => $xuong,
            'quytrinh' => $quytrinh,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeHoachRequest $request, KeHoach $kehoach)
    {
        $kehoach->create($request->validated());
        return redirect()->route('kehoach.index')->with('success', "Đã thêm thành công");
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
    public function edit(KeHoach $kehoach)
    {
        $xuong = Xuong::get();
        $quytrinh = LoaiQuyTrinh::get();
        return view('Qlkh.edit',[
            'data' => $kehoach,
            'xuong' => $xuong,
            'quytrinh' => $quytrinh,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeHoachRequest $request, KeHoach $kehoach)
    {
        $kehoach->update($request->validated());
        return redirect()->route('kehoach.index')->with('edited', 'Sửa thành công');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KeHoach::destroy($id);
        return redirect()->route('kehoach.index')->with('deleted', "Đã xoá thành công");   

    }
}
