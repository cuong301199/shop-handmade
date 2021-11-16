<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TrangThaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trangthai=[
            [

                'trangthai_sp'=>'Còn hàng'
            ],
            [

                'trangthai_sp'=>'hết hàng'
            ],
            [

                'trangthai_sp'=>'Bị ẩn do vi phạm'
            ],

        ];
        $insert = DB::table('trang_thai_san_pham')->insert($trangthai);
    }
}
