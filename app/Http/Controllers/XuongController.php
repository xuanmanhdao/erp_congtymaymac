<?php

namespace App\Http\Controllers;

use App\Models\Xuong;
use App\Http\Requests\StoreXuongRequest;
use App\Http\Requests\UpdateXuongRequest;

class XuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreXuongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreXuongRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Xuong  $xuong
     * @return \Illuminate\Http\Response
     */
    public function show(Xuong $xuong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Xuong  $xuong
     * @return \Illuminate\Http\Response
     */
    public function edit(Xuong $xuong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateXuongRequest  $request
     * @param  \App\Models\Xuong  $xuong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateXuongRequest $request, Xuong $xuong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Xuong  $xuong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Xuong $xuong)
    {
        //
    }
}
