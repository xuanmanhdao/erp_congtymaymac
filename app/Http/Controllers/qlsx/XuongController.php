<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use App\Models\Xuong;
use Illuminate\Http\Request;
use App\Http\Requests\Xuong\StoreXuongRequest;
use App\Http\Requests\Xuong\UpdateXuongRequest;

class XuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Xuong $xuong)
    {
        $search = $request->get('q');

        $xuong = $xuong->query()
        ->where('MaXuong','like', '%'. $search. '%')
        ->paginate(5);

        return view('Qlx.index',[
            'xuong' => $xuong,
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
        return view('Qlx.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreXuongRequest $request, Xuong $xuong)
    {
        $xuong->create($request->validated());
        return redirect()->route('xuong.index')->with('success','Thêm thành công !');
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
    public function edit(Xuong $xuong)
    {
        return view('Qlx.edit',[
            'data' => $xuong,
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateXuongRequest $request, Xuong $xuong)
    {
        $xuong->update($request->validated());
        return redirect()->route('xuong.index')->with('success','Sửa thành công !');   
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
        // Xuong::destroy($id);
        // return redirect()->route('xuong.index');  
    }
}
