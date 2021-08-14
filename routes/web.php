<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiSanPhamController;

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

// Route::get('/', function () {
//     return view('admin\loaisanpham\show_loaisanpham');
// });

Route::get('/admin', function(){
    return view('admin\template\master');
});






Route::get('/danhmuc', [DanhMucController::class, 'index'])->name('danh-muc.index');
Route::post('/danhmuc-add', [DanhMucController::class, 'add_danhmuc'])->name('danh-muc.add');
Route::get('/danhmuc-show', [DanhMucController::class, 'show_danhmuc'])->name('danh-muc.danh_sach');


Route::get('/loaisanpham', [LoaiSanPhamController::class, 'index'])->name('loaisanpham.index');
Route::post('/loaisanpham-add', [LoaiSanPhamController::class, 'add_loaisanpham'])->name('loaisanpham.add');
Route::get('/loaisanpham-show', [LoaiSanPhamController::class, 'show_loaisanpham'])->name('loaisanpham.danh_sach');


// Route::get('/thu', function(){
//     $danhsach = DB::table('loai_san_pham')
//     ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
//     ->select('ten_dm','ten_lsp','id_dm')
//     ->get();
//         dd($danhsach);

// });



