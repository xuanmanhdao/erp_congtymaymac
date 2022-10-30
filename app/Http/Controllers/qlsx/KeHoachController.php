<?php

namespace App\Http\Controllers\qlsx;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeHoach\KeHoachStoreRequest;
use App\Http\Requests\KeHoach\StoreKeHoachRequest;
use App\Http\Requests\KeHoach\UpdateKeHoachRequest;
use App\Models\KeHoach;
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
    public function store(StoreKeHoachRequest $request, KeHoach $kehoach)
    {
        $kehoach->create($request->validated());
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
    public function update(UpdateKeHoachRequest $request, KeHoach $kehoach)
    {
        $kehoach->update($request->validated());
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
