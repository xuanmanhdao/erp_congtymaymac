<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use App\Models\KeHoach;
use Illuminate\Http\Request;

class KeHoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KeHoach $keHoach)
    {
        $search = $request->get('q');

        $kehoach = KeHoach::query()
        ->where('MaKeHoach', 'like', '%'. $search. '%')
        ->paginate(10);

        $kehoach = KeHoach::query()->get();
        return view('Qlkh.index',[
            'kehoach' => $kehoach,
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
        return view('qlkh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, KeHoach $kehoach)
    {
        $kehoach->create($request->all());
        return redirect()->route('kehoach.index');
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
        return view('Qlkh.edit',[
            'data' => $kehoach,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KeHoach $kehoach)
    {
        $kehoach->update($request->all());
        return redirect()->route('kehoach.index');   
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
        return redirect()->route('kehoach.index');   

    }
}
