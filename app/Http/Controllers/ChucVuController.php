<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChucVuRequest;
use App\Http\Requests\UpdateChucVuRequest;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ChucVu $chucvu)
    {
        $search = $request->get('q');

        $chucvu = $chucvu->query()
        ->where('MaChucVu','like', '%'. $search. '%')
        ->paginate(6);

        return view('Qlcv.index',[
            'chucvu' => $chucvu,
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
       return view('Qlcv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChucVuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChucVuRequest $request, ChucVu $chucvu)
    {
         
    
        $chucvu->create($request->validated());
        return redirect()->route('chucvu.index')->with('success','Thêm thành công !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function show(ChucVu $chucVu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function edit(ChucVu $chucvu)
    {
        
        return view('Qlcv.edit',[
            'data' => $chucvu,
            'chucvu'=>$chucvu
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChucVuRequest  $request
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChucVuRequest $request, ChucVu $chucvu)
    {
        $chucvu->update($request->validated());
        return redirect()->route('chucvu.index')->with('success','Sửa thành công !');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChucVu $chucVu)
    {
        //
    }
}
