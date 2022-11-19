<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatLieu\StoreChatLieuRequest;
use App\Http\Requests\ChatLieu\UpdateChatLieuRequest;
use App\Models\ChatLieu;
use App\Models\NguyenVatLieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ChatLieu $chatlieu)
    {
        // $search = $request->get('q');

        $chatlieu = ChatLieu::all();
        $nguyenvatlieu = NguyenVatLieu::all();
        
        return view('Qlcl.index',[
            'chatlieu' => $chatlieu,
            'nguyenvatlieu' => $nguyenvatlieu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nguyenvatlieu = NguyenVatLieu::get();
        return view('Qlcl.create', [
            'nguyenvatlieu' => $nguyenvatlieu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatLieuRequest $request, ChatLieu $chatlieu)
    {
        $chatlieu->create($request->validated());
        return redirect()->route('chatlieu.index');
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
    public function edit(ChatLieu $chatlieu)
    {
        return view('Qlcl.edit',[
           'data' => $chatlieu, 
        ]);
    }

    public function update(UpdateChatLieuRequest $request, ChatLieu $chatlieu)
    {
        $chatlieu->update($request->validated());
        return redirect()->route('chatlieu.index');
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
    }
}
