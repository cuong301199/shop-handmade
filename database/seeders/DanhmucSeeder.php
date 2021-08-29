<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danhmuc = [
            [
                'ten_dm'=> 'Trang sức phụ kiện',
                'mota_dm'=>'1423434'
            ],
            [
                'ten_dm'=> 'Nhà cửa đời sống',
                'mota_dm'=>'1423434'
            ],

            [
                'ten_dm'=> 'Đồ chơi và giải trí',
                'mota_dm'=>'1423434'
            ],
            [
                'ten_dm'=> 'Nghệ thuật và lưu niệm',
                'mota_dm'=>'1423434'
            ],

            [
                'ten_dm'=> 'Nguyên liệu và công cụ thủ công',
                'mota_dm'=>'1423434'
            ],

         ];

         $insert = DB::table('danh_muc')->insert($danhmuc);
    }


}
