<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NguoiDungController;

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
Route::get('/danhmuc/{id}/sua',[DanhMucController::class,'edit'])->name('danhmuc.edit');
Route::post('/danhmuc/{id}/sua-danh-muc',[DanhMucController::class,'update'] )->name('danhmuc.update');

Route::get('/loaisanpham', [LoaiSanPhamController::class, 'index'])->name('loaisanpham.index');
Route::get('/loaisanpham/them',[LoaiSanPhamController::class, 'create'])->name('loaisanpham.create');
Route::post('/them-loaisanpham',[LoaiSanPhamController::class, 'store'])->name('loaisanpham.store');
Route::get('/loaisanpham/{id}/xoa',[LoaiSanPhamController::class, 'delete'])->name('loaisanpham.delete');
Route::get('/loaisanpham/{id}/sua', [LoaiSanPhamController::class, 'edit'])->name('loaisanpham.edit');
Route::post('loaisanpham/{id}/sua-loaisp',[LoaiSanPhamController::class, 'update'] )->name('loaisanpham.update');

Route::get('/register/nguoidung',[NguoiDungController::class,'login'] )->name('nguoidung.login');
Route::post('/register/nguoi-dung', [NguoiDungController::class,'register'])->name('nguoi-dung.register');

















// Route::get('/thu1/{2}',[LoaiSanPhamController::class , 'edit']);
// Route::get('/thu', function(){
//     $danhsach = DB::table('loai_san_pham')
//     ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
//     ->select('loai_san_pham.*')
//     ->where('loai_san_pham.id','=','2')
//     ->get();

//         dd($danhsach);

// });



