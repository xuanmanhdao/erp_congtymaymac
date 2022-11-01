<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lo;
use App\Http\Requests\Lo\StoreLoRequest;
use App\Http\Requests\Lo\UpdateLoRequest;



class LoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Lo $lo)
    {
        $search = $request->get('q');

        $lo = Lo::query()
        ->where('MaLo', 'like', '%'. $search. '%')
        ->paginate(6);

       
        return view('Qll.index',[
            'lo' => $lo,
            'search'  => $search,
        ]);
    }

    public function __construct()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Qll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoRequest $request, Lo $lo)
    {
        $lo->create($request->validated());
        return redirect()->route('lo.index')->with('success', 'Đã thêm thành công');;
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
    public function edit(Lo $lo)
    {
        //
        return view('Qll.edit',[
            'data' => $lo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoRequest $request ,Lo $lo)
    {
        //
        $lo->update($request->validated());
        return redirect()->route('lo.index')->with('success', 'Đã sửa thành công');;
         
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
        Lo::destroy($id);
        return redirect()->route('lo.index')->with('success', 'Đã xoá thành công');;  
        // return Redirect::action([LoController::class,'lo.index']);
    }
}
