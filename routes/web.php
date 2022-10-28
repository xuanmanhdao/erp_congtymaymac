<?php

use App\Http\Controllers\qlsx\QuanTriVienController;
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

Route::group(['prefix' => 'quan-ly-san-xuat'], function(){
    Route::get('/',[QuanTriVienController::class, 'index'])->name('qtv.index');
});

Route::group(['prefix' => 'quan-ly-kho'], function(){
    Route::get('/', function () {
        return view('QuanLyKho.index');
    });
    Route::get('/product', function () {
        return view('QuanLyKho.product');
    });
});