<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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




         ];

         $insert = DB::table('loai_san_pham')->insert($loaisanpham);
    }
}

