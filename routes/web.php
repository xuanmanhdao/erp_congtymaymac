<?php

use App\Http\Controllers\qlsx\KeHoachController;
use App\Http\Controllers\qlsx\QuanTriVienController;
use App\Models\KeHoach;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'quan-ly-ke-hoach'], function(){
    Route::get('/',[KeHoachController::class, 'index'])->name('kehoach.index');
    Route::get('/create',[KeHoachController::class,'create'])->name('kehoach.create');
    Route::post('/store',[KeHoachController::class,'store'])->name('kehoach.store');
    Route::get('/edit/{kehoach}', [KeHoachController::class, 'edit'])->name('kehoach.edit');
    Route::put('/update/{kehoach}', [KeHoachController::class, 'update'])->name('kehoach.update');
    Route::delete('/delete/{kehoach}', [KeHoachController::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'quan-ly-kho'], function(){
    Route::get('/', function () {
        return view('QuanLyKho.index');
    });
    Route::get('/product', function () {
        return view('QuanLyKho.product');
    });
});