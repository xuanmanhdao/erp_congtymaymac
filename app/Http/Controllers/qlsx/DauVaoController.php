<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DauVao\StoreDauVaoRequest;
use App\Http\Requests\DauVao\UpdateDauVaoRequest;
use App\Models\DauVao;
class DauVaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DauVao $dauvao)
    {
        $search = $request->get('q');

        $dauvao = DauVao::query()
        ->where('MaDauVao', 'like', '%'. $search. '%')
        ->paginate(6);

       
        return view('Qldv.index',[
            'dauvao' => $dauvao,
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
        return view('Qldv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDauVaoRequest $request, DauVao $dauvao)
    {
        $dauvao->create($request->validated());
        return redirect()->route('dauvao.index')->with('success', 'Đã thêm thành công');;
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
    public function edit(DauVao $dauvao)
    {
        //
        return view('Qldv.edit',[
            'data' => $dauvao, // để im t làm ssắp xong
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDauVaoRequest $request ,DauVao $dauvao)
    {
        //
        $dauvao->update($request->validated());
        return redirect()->route('dauvao.index')->with('success', 'Đã sửa thành công');;
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DauVao::destroy($id);
        return redirect()->route('dauvao.index')->with('success', 'Đã xoá thành công');; 
    }
}
