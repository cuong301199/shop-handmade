<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PhuongThucThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phuongthuc=[
            [

                'ten_pttt'=>'thanh toán bằng thẻ ngân hàng'
            ],
            [

                'ten_pttt'=>'thanh toán khi nhận hàng'
            ],

        ];
        $insert = DB::table('phuong_thuc_thanh_toan')->insert($phuongthuc);
    }
}
