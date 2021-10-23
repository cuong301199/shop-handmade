<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\QuanTriController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\TaoCuaHangController;
use App\Http\Controllers\QuanLyCuaHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ChonDanhMucController;
use App\Http\Controllers\ThongTinCaNhanController;
use App\Http\Controllers\ChiTietSanPhamController;
use App\Http\Controllers\HienThiSanPhamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\PhiVanChuyenController;





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

Route::get('',[HomeController::class,'index'])->name('client.index');

Route::prefix('/client')->group(function () {

    Route::get('/tim-kiem/hienthi',[HomeController::class,'searchProduct'])->name('search.index');

    Route::get('/register/nguoidung',[NguoiDungController::class,'login'] )->name('nguoidung.login');
    Route::post('/register/nguoi-dung', [NguoiDungController::class,'register'])->name('nguoi-dung.register');
    Route::post('/login',[NguoiDungController::class,'postLogin'])->name('nguoi-dung.login');
    Route::get('/logout',[NguoiDungController::class,'logOut'] )->name('nguoidung.logout');

    // Route::get('/tao-cua-hang',[TaoCuaHangController::class,'RegisterStore'])->name('register.store');
    // Route::post('/tao-cuahang',[TaoCuaHangController::class,'handleCreate'])->name('post.store');

    Route::get('/quanlycuahang', [QuanLyCuaHangController::class,'index'])->name('quanlycuahang.index');

    Route::get('/sanpham',[SanPhamController::class,'index'])->name('sanpham.index');
    Route::get('/sanpham/them', [SanPhamController::class , 'create'])->name('sanpham.create');
    Route::post('/sanpham/them-post',[SanPhamController::class,'store'])->name('sanpham-post.create');
    Route::get('/sanpham/{id}/xoa',[SanPhamController::class,'delete'])->name('sanpham.delete');
    Route::get('/sanpham/{id}/sua', [SanPhamController::class,'edit'])->name('sanpham.edit');
    Route::post('/sanpham/{id}/sua-sp',[SanPhamController::class, 'update'] )->name('sanpham.update');
    Route::get('/get-product-type/{idCat}',[SanPhamController::class,'getProductTypeByCat'])->name('sanpham.get-product-type');
    Route::get('/delete-image/{id}',[SanPhamController::class,'deleteImage'])->name('image-edit.delete');
    // Route::get('/add-image-edit/{id}',[SanPhamController::class,'addImage'])->name('image-eidt.add');
    // Route::get('/load-image',[SanPhamController::class,'loadImageData'])->name('image.load');


    ///// phi van chuyen
    Route::get('/phivanchuyen',[PhiVanChuyenController::class,'index'])->name('phivanchuyen.index');
    Route::get('/phivanchuyen-add',[PhiVanChuyenController::class,'create'])->name('phivanchuyen.create');
    Route::get('get-province/{idCity}',[PhiVanChuyenController::class,'getProvinceByCity'])->name('feeship.get-province');
    Route::get('get-wards/{idProvince}',[PhiVanChuyenController::class,'getWardsByProvince'])->name('feeship.get-wards');
    Route::post('/phivanchuyen-store',[PhiVanChuyenController::class,'store'])->name('phivanchuyen.store');


    Route::get('/quanlydanhmuc',[ChonDanhMucController::class,'index'] )->name('quanlydanhmuc.index');
    Route::get('/quanlydanhmuc/them',[ChonDanhMucController::class,'create'] )->name('quanlydanhmuc.create');
    Route::post('/quanlydanhmuc/them-post',[ChonDanhMucController::class,'choose_category'] )->name('quanlydanhmuc.post');
    Route::get('/quanlydanhmuc/{id_nb}{id_dm}/xoa',[ChonDanhMucController::class,'delete'])->name('quanlydanhmuc.delete');
    Route::get('/quanlydanhmuc/sua',[ChonDanhMucController::class,'edit'])->name('quanlydanhmuc.edit');
    Route::post('/quanlydanhmuc/sua-post',[ChonDanhMucController::class,'update'])->name('quanlydanhmuc.update');


    Route::get('/thongtincanhan/{id}/',[ThongTinCaNhanController::class,'edit'])->name('profile.edit');
    Route::post('/thongtincanhan/{id}/update',[ThongTinCaNhanController::class,'update'])->name('profile.update');
    Route::get('/matkhau/{id}/edit',[ThongTinCaNhanController::class,'editpassword'])->name('password.edit');
    Route::post('/matkhau/{id}/update',[ThongTinCaNhanController::class,'updatepassword'])->name('password.update');
    Route::get('donhang/',[ThongTinCaNhanController::class,'order'])->name('order.index');
    Route::get('chitietdonhang/{id}',[ThongTinCaNhanController::class,'oder_detail'])->name('oderuser.detail');

    Route::get('/sanpham/hienthi/{id}',[SanPhamController::class,'getProductByCat'])->name('hienthisp.index');
    Route::get('/cuahang/hienthi/{id}',[CuaHangController::class,'showStore'])->name('hienthich.showStore');

    Route::get('/chitietsanpham/{id}/',[ChiTietSanPhamController::class,'index'])->name('chitietsanpham.index');

    //CART
    Route::get('/Add-cart/{id}',[CartController::class,'AddCart'])->name('Add.cart');
    Route::get('/Delete-cart/{rowId}',[CartController::class,'DeleteItemCart'])->name('Delete.cart');
    Route::get('/cart-list',[CartController::class,'index'])->name('cart.list');
    Route::get('/Delete-list-cart/{id}',[CartController::class,'DeleteListItemCart'])->name('Delete-list.cart');
    Route::get('client/cart-list-update/{id}/{qty}',[CartController::class,'UpdateCart'])->name('cart.update');

    // Route::get('/thanh-toan',[thanhtoanController::class,'thanhToan'])->name('thanhtoan.index');
    Route::get('/sanpham/hienthi/danhmuc/{id}',[SanPhamController::class,'productCat'])->name('sanpham.danhmuc');
    //Quan ly don hang ------------------------------------------------------
    Route::get('quanly-donhang',[QuanLyCuaHangController::class, 'manage_oder'] )->name('manage_oder.index');
    Route::get('chitiet-donhang/{id}',[QuanLyCuaHangController::class, 'oder_detail'] )->name('oder.detail');
    Route::get('accep-oder/{id}',[QuanLyCuaHangController::class, 'accepOder'] )->name('accepOder');




});
Route::middleware(['checkNguoiDung'])->group(function () {

    // Route::get('/checkout',[ThanhToanController::class,'index'])->name('checkout.index');
    // Route::get('/checkout/{id}',[ThanhToanController::class,'checkout'])->name('checkout');
    // Route::post('/checkout-shipping',[ThanhToanController::class,'createShipping'])->name('shipping.create');
    Route::get('/thanhtoan/{id}',[ThanhToanController::class,'thanhToan'])->name('thanhtoan.index');
    Route::post('/checkout/post/{id}',[ThanhToanController::class,'store'])->name('checkout.store');

    Route::post('/check-coupon',[ThanhToanController::class,'check_coupon'])->name('check.coupon');
    Route::get('/unset-coupon',[ThanhToanController::class,'unset_coupon'])->name('unset.coupon');


});



Route::get('/admin/login', [QuanTriController::class,'login'])->name('admin.login');
Route::post('/admin-login',[QuanTriController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/logout/admin',[QuanTriController::class,'logOut'])->name('admin.logout');




Route::middleware(['checkQuanTri'])->group(function () {
    Route::prefix('')->group(function () {


        Route::get('/cuahang', [CuaHangController::class,'getStore'])->name('cuahang.index');
        Route::get('/cuahang{id}', [CuaHangController::class,'accepStore'])->name('cuahang.eccep');
        Route::get('/cuahang{id}/stop', [CuaHangController::class,'stopStore'])->name('cuahang.stop');


        Route::get('/admin', [AuthController::class, 'index'])->name('admin.index');

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

        // mã giảm giá

        Route::get('/coupon', [MaGiamGiaController::class, 'index'])->name('coupon.index');
        Route::get('/coupon-add', [MaGiamGiaController::class, 'create'])->name('coupon.create');
        Route::post('/coupon-add-post', [MaGiamGiaController::class, 'store'])->name('coupon.store');


    });

});








// Route::get('/thu1/{2}',[LoaiSanPhamController::class , 'edit']);
// Route::get('/1/{id}', function(){
//     $avatar_sp = DB::table('san_pham')->where('id',5)->get();
//     dd($avatar_sp);

// });


Route::get('/1', function () {
    return view('client.loaisanpham');
});
