<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TrangThaiDonHangSeeder extends Seeder
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

                'ten_tt'=>'Chờ xác nhận'
            ],
            [

                'ten_tt'=>'Đã xác nhận'
            ],
            [

                'ten_tt'=>'Đang giao hàng'
            ],
            [

                'ten_tt'=>'Đã nhận hàng'
            ],
            [

                'ten_tt'=>'Đã bị hủy'
            ],
        ];
        $insert = DB::table('trang_thai_don_hang')->insert($trangthai);
    }
}
