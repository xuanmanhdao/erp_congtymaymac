<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatLieu\StoreChatLieuRequest;
use App\Http\Requests\ChatLieu\UpdateChatLieuRequest;
use App\Models\ChatLieu;
use App\Models\NguyenVatLieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ChatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ChatLieu $chatlieu)
    {
        // // $search = $request->get('q');

        // $chatlieu = ChatLieu::all();
        // $nguyenvatlieu = NguyenVatLieu::all();

        // return view('Qlcl.index',[
        //     'chatlieu' => $chatlieu,
        //     'nguyenvatlieu' => $nguyenvatlieu,
        // ]);

        return view('QuanLyKho.loainguyenvatlieu.ingredient-type');
    }

    public function ajaxLoaiNguyenVatLieuIndex()
    {
        $arrayLoaiNguyenVatLieu = ChatLieu::selectRaw('chatlieu.*, COALESCE(SUM(nguyenvatlieu.SoLuong), 0) AS SoLuongNguyenVatLieu')
            ->leftJoin('nguyenvatlieu', 'nguyenvatlieu.MaChatLieu', '=', 'chatlieu.MaChatLieu')
            ->groupBy('chatlieu.MaChatLieu')
            ->get();

        return DataTables::of($arrayLoaiNguyenVatLieu)
            ->addIndexColumn()
            ->addColumn('SoLuongNguyenVatLieu', function ($row) {
                return $row->SoLuongNguyenVatLieu;
            })
            ->addColumn('btnEditNguyenVatLieu', function ($row) {
                return route('loainguyenvatlieu.edit', $row->MaChatLieu);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $nguyenvatlieu = NguyenVatLieu::get();
        // return view('Qlcl.create', [
        //     'nguyenvatlieu' => $nguyenvatlieu,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatLieuRequest $request, ChatLieu $chatlieu)
    {
        // $chatlieu->create($request->validated());
        // return redirect()->route('chatlieu.index');

        $chatlieu::create($request->validated());
        return response()->json(['message' => 'Đã thêm kiểu nguyên vật liệu thành công'], 200);
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
    public function edit(ChatLieu $chatLieu)
    {
        // return view('Qlcl.edit',[
        //    'data' => $chatlieu, 
        // ]);

        return response()->json(['arrayChatLieu' => $chatLieu], 200);
    }

    public function update(UpdateChatLieuRequest $request, ChatLieu $chatLieu)
    {
        // $chatlieu->update($request->validated());
        // return redirect()->route('chatlieu.index');

        $chatLieu->update($request->validated());
        return response()->json(['message' => 'Đã sửa kiểu nguyên liệu thành công'], 200);
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
