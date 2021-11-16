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
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\PhiVanChuyenController;
use App\Http\Controllers\ThongTinLienHeController;
use App\Http\Controllers\ChatController;

use Carbon\Carbon;



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
    //tai them san pham
    Route::get('/load-more-product',[HomeController::class,'get_more_product'])->name('getMoreProduct.home');
    //dang nhap facebook
    Route::get('/getInfor-facebook',[NguoiDungController::class,'getInfor'])->name('facebook.getInfor');
    Route::get('/check-infor-facebook',[NguoiDungController::class,'getInfor'])->name('facebook.checkInfor');
    //Tim kiem
    Route::get('/tim-kiem',[HomeController::class,'searchProduct'])->name('search.index');

    //thong tin lien he
    Route::get('/thong-tin-lien-he',[ThongTinLienHeController::class,'index'])->name('thongtinlienhe.index');
    Route::post('them/thong-tin-lien-he',[ThongTinLienHeController::class,'store'])->name('thongtinlienhe.store');
    Route::post('sua/thong-tin-lien-he/{id}',[ThongTinLienHeController::class,'update'])->name('thongtinlienhe.update');
    //Dang ki dang nhap
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
    Route::get('/sanpham-report-manager',[SanPhamController::class,'product_report_index'])->name('product_report.index');
    Route::get('/product-report-detail/{id}',[SanPhamController::class,'product_report_detail'])->name('product_report.detail');
    // Route::get('/add-image-edit/{id}',[SanPhamController::class,'addImage'])->name('image-eidt.add');
    // Route::get('/load-image',[SanPhamController::class,'loadImageData'])->name('image.load');

    //bai viet
    Route::get('/baiviet',[BaiVietController::class,'index'])->name('baiviet.index');
    Route::get('/baiviet/them',[BaiVietController::class,'create'])->name('baiviet.create');
    Route::post('/baiviet/them-post',[BaiVietController::class,'store'])->name('baiviet-post.create');
    Route::get('/baiviet/{id}/sua', [BaiVietController::class,'edit'])->name('baiviet.edit');
    Route::post('/baiviet/{id}/sua-sp',[BaiVietController::class, 'update'] )->name('baiviet.update');
    Route::get('/baiviet/{id}/xoa',[BaiVietController::class,'delete'])->name('baiviet.delete');

    //chi tiet bai viet
    Route::get('/chitiet-baiviet/{id}',[HomeController::class,'index_post'])->name('baiviet.detail');

    //binh luan
    Route::get('/load-comment/{id_bv}',[BaiVietController::class,'load_comment'])->name('comment.load');
    Route::get('/comment/{id_bv}',[BaiVietController::class,'comment'])->name('comment.add');



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

    //doi mạt khau
    Route::get('/thongtincanhan/{id}/',[ThongTinCaNhanController::class,'edit'])->name('profile.edit');
    Route::post('/thongtincanhan/{id}/update',[ThongTinCaNhanController::class,'update'])->name('profile.update');
    Route::get('/matkhau/{id}/edit',[ThongTinCaNhanController::class,'editpassword'])->name('password.edit');
    Route::post('/matkhau/{id}/update',[ThongTinCaNhanController::class,'updatepassword'])->name('password.update');

    //don hang da dat
    Route::get('donhang/',[QuanLyCuaHangController::class,'order'])->name('order.index');
    Route::get('chitietdonhang/{id}',[QuanLyCuaHangController::class,'oder_detail'])->name('oder.detail');

    Route::get('/sanpham/hienthi/{id}',[SanPhamController::class,'getProductByCat'])->name('sanpham.danhmuc');
    // Route::get('/sanpham/hienthi/lsp/{id_dm}/{id_lsp}',[SanPhamController::class,'getProductByProductType'])->name('sanpham.loaisanpham');


    //trang ca nhan
    Route::get('/trang-ca-nhan/{id}',[CuaHangController::class,'index'])->name('cuahang.index');
     //danh gia nguoi dung
     Route::get('/load-moreo-rate',[CuaHangController::class,'load_rate'])->name('rate.load');
     Route::get('/rate-user',[CuaHangController::class,'rate_user'])->name('rate.user');

    //chat
    Route::get('/chat',[ChatController::class,'index'])->name('chat.index');


    //chi tiet san pham
    Route::get('/chitietsanpham/{id}/',[ChiTietSanPhamController::class,'index'])->name('chitietsanpham.index');

    //CART
    Route::get('/Add-cart/{id}',[CartController::class,'AddCart'])->name('Add.cart');
    Route::get('/Delete-cart/{rowId}',[CartController::class,'DeleteItemCart'])->name('Delete.cart');
    Route::get('/cart-list',[CartController::class,'index'])->name('cart.list');
    Route::get('/Delete-list-cart/{id}',[CartController::class,'DeleteListItemCart'])->name('Delete-list.cart');
    Route::get('/cart-list-update',[CartController::class,'UpdateCart'])->name('cart.update');

    // Route::get('/thanh-toan',[thanhtoanController::class,'thanhToan'])->name('thanhtoan.index');

    //Quan ly don hang ------------------------------------------------------
    Route::get('quanly-donhang',[QuanLyCuaHangController::class, 'manage_oder'] )->name('manage_oder.index');
    Route::get('chitiet-donhang/{id}',[QuanLyCuaHangController::class, 'manage_oder_detail'] )->name('manage_oder.detail');
    Route::get('accep-oder/{id}',[QuanLyCuaHangController::class, 'accepOder'] )->name('accepOder');

    //thong ke danh thu

    Route::get('/thong-ke-danh-thu',[QuanLyCuaHangController::class, 'manage_chars_oder'] )->name('manage_chars_oder.index');
    Route::get('/thong-ke-danh-thu/30day',[QuanLyCuaHangController::class, 'manage_chars_oder_30day'] );
    Route::get('/filter-by-date',[QuanLyCuaHangController::class, 'filter_by_date'] )->name('filter-by-date.index');
    Route::get('/filter-dashboard',[QuanLyCuaHangController::class, 'filter_dashboard'] )->name('filter-dashboard.index');
    // thong ke tong san pham và don hang

    Route::get('/thong-ke-don-hang',[QuanLyCuaHangController::class, 'manage_chars_product'] )->name('manage_chars_product.index');
    Route::get('/thong-ke-don-hang/30day',[QuanLyCuaHangController::class, 'manage_chars_product_30day'] );
    Route::get('/filter-by-date-product',[QuanLyCuaHangController::class, 'filter_by_date_product'] )->name('filter-by-date-product.index');
    Route::get('/filter-dashboard-product',[QuanLyCuaHangController::class, 'filter_dashboard_product'] )->name('filter-dashboard-product.index');

    //binh luan san pham
    Route::get('/load-more-comment',[ChiTietSanPhamController::class,'get_more_comment'])->name('getMoreComment.home');
    Route::get('/comment-product',[ChiTietSanPhamController::class,'comment_product'])->name('comment.product');

});
Route::middleware(['checkNguoiDung'])->group(function () {

    // Route::get('/checkout',[ThanhToanController::class,'index'])->name('checkout.index');
    // Route::get('/checkout/{id}',[ThanhToanController::class,'checkout'])->name('checkout');
    // Route::post('/checkout-shipping',[ThanhToanController::class,'createShipping'])->name('shipping.create');
    Route::get('/thanhtoan/{id}',[ThanhToanController::class,'thanhToan'])->name('thanhtoan.index');
    Route::post('/checkout/post/{id}',[ThanhToanController::class,'store'])->name('checkout.store');

    // Route::post('/check-coupon',[ThanhToanController::class,'check_coupon'])->name('check.coupon');
    // Route::get('/unset-coupon',[ThanhToanController::class,'unset_coupon'])->name('unset.coupon');
    Route::get('/check-feeship',[ThanhToanController::class,'check_feeship'])->name('feeship.check');

    //report-san pham



});
Route::post('/report-product',[SanPhamController::class,'report_product'])->name('report.product');


Route::get('/admin/login', [QuanTriController::class,'login'])->name('admin.login');
Route::post('/admin-login',[QuanTriController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/logout/admin',[QuanTriController::class,'logOut'])->name('admin.logout');




Route::middleware(['checkQuanTri'])->group(function () {
    Route::prefix('')->group(function () {


        // Route::get('/cuahang', [CuaHangController::class,'getStore'])->name('cuahang.index');
        // Route::get('/cuahang{id}', [CuaHangController::class,'accepStore'])->name('cuahang.eccep');
        // Route::get('/cuahang{id}/stop', [CuaHangController::class,'stopStore'])->name('cuahang.stop');

        Route::get('/nguoidung', [QuanTriController::class, 'user'])->name('user.index');

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

        // Route::get('/coupon', [MaGiamGiaController::class, 'index'])->name('coupon.index');
        // Route::get('/coupon-add', [MaGiamGiaController::class, 'create'])->name('coupon.create');
        // Route::post('/coupon-add-post', [MaGiamGiaController::class, 'store'])->name('coupon.store');

        //thong ke nguoi dung
        Route::get('/thong-ke-nguoi-dung',[QuanTriController::class, 'manage_chars_user'] )->name('manage_chars_user.index');
        Route::get('/thong-ke-nguoi-dung/30day',[QuanTriController::class, 'manage_chars_user_30day'] );
        Route::get('/filter-by-date-user',[QuanTriController::class, 'filter_by_date_user'] )->name('filter-by-date-user.index');
        Route::get('/filter-dashboard-user',[QuanTriController::class, 'filter_dashboard_user'] )->name('filter-dashboard-user.index');

        Route::get('/san-pham-vi-pham',[QuanTriController::class, 'product_report'] )->name('product-report.index');
        Route::get('/san-pham-vi-pham-chi-tiet/{id}',[QuanTriController::class, 'product_report_detail'] )->name('product-report-detail.index');


    });

});








// Route::get('/thu1/{2}',[LoaiSanPhamController::class , 'edit']);
// Route::get('/1/{id}', function(){
//     $avatar_sp = DB::table('san_pham')->where('id',5)->get();
//     dd($avatar_sp);

// });


Route::get('/1', function () {

    // $comments = DB::table('danh_gia_nguoi_dung')
    // ->join('nguoi_dung','nguoi_dung.id','danh_gia_nguoi_dung.id_nm')
    // ->where('danh_gia_nguoi_dung.id_nb',2)
    // ->orderBy('danh_gia_nguoi_dung.id','desc')
    // ->select('nguoi_dung.*','danh_gia_nguoi_dung.*')
    // ->take(2)
    // ->get();
$comments = 'HN'.rand(0,999).'HM'.rand();
    dd($comments);
});
