<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaisanpham = [
            [
                'ten_lsp'=> 'Ba lô',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],
            [
                'ten_lsp'=> 'Túi xách',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],
            [
                'ten_lsp'=> 'Mặt dây chuyền',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],
            [
                'ten_lsp'=> 'Nhẫn',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],
            [
                'ten_lsp'=> 'Khuyên tai',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],
            [
                'ten_lsp'=> 'Chuỗi và vòng tay',
                'mota_lsp'=>'1423434',
                'id_dm'=>'1'
            ],

            [
                'ten_lsp'=> 'Trang trí tường',
                'mota_lsp'=>'1423434',
                'id_dm'=>'2'
            ],
            [
                'ten_lsp'=> 'Khung và ảnh',
                'mota_lsp'=>'1423434',
                'id_dm'=>'2'
            ],
            [
                'ten_lsp'=> 'Đồng hồ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'2'
            ],
            [
                'ten_lsp'=> 'Tinh dầu',
                'mota_lsp'=>'1423434',
                'id_dm'=>'2'
            ],
            [
                'ten_lsp'=> 'Vật dụng cho thú cưng',
                'mota_lsp'=>'1423434',
                'id_dm'=>'2'
            ],
            [
                'ten_lsp'=> 'Đồ chơi trẻ em',
                'mota_lsp'=>'1423434',
                'id_dm'=>'3'
            ],
            [
                'ten_lsp'=> 'Thú nhồi bông',
                'mota_lsp'=>'1423434',
                'id_dm'=>'3'
            ],
            [
                'ten_lsp'=> 'Nhạc cụ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'3'
            ],
            [
                'ten_lsp'=> 'Học tập và giải trí',
                'mota_lsp'=>'1423434',
                'id_dm'=>'3'
            ],
            [
                'ten_lsp'=> 'Tranh vẽ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Tượng điêu khắc',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Quà lưu niệm thủy tinh',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Quà lưu niệm dệt từ len',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Mô hình thu nhỏ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Đồng xu và tiền cổ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'4'
            ],
            [
                'ten_lsp'=> 'Nguyên liệu và công cụ bằng gỗ',
                'mota_lsp'=>'1423434',
                'id_dm'=>'5'
            ],
            [
                'ten_lsp'=> 'May và dệt',
                'mota_lsp'=>'1423434',
                'id_dm'=>'5'
            ],
            [
                'ten_lsp'=> 'Trang sức',
                'mota_lsp'=>'1423434',
                'id_dm'=>'5'
            ],





         ];

         $insert = DB::table('loai_san_pham')->insert($loaisanpham);
    }
}

