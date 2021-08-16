<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\AuthController;

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
    return view('client.index');
});


Route::get('/admin', [AuthController::class, 'index'])->name('admin.index');

//danh muc
Route::get('/danhmuc', [DanhMucController::class, 'index'])->name('danhmuc.index');
Route::get('/danhmuc/them', [DanhMucController::class, 'create'])->name('danhmuc.create');
Route::post('/them-danh-muc', [DanhMucController::class, 'store'])->name('danhmuc.store');
Route::get('/danhmuc/{id}/xoa',[DanhMucController::class,'delete'])->name('danhmuc.delete');



Route::get('/loaisanpham', [LoaiSanPhamController::class, 'index'])->name('loaisanpham.index');
Route::get('/loaisanpham/them',[LoaiSanPhamController::class, 'create'])->name('loaisanpham.create');
Route::post('/them-loaisanpham',[LoaiSanPhamController::class, 'store'])->name('loaisanpham.store');
Route::get('/loaisanpham/{id}/xoa',[LoaiSanPhamController::class, 'delete'])->name('loaisanpham.delete');






















// Route::get('/thu', function(){
//     $danhsach = DB::table('loai_san_pham')
//     ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
//     ->select('ten_dm','ten_lsp','id_dm')
//     ->get();
//         dd($danhsach);

// });



