<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quyen=[
            [

                'ten_q'=>'quản trị'
            ],
            [

                'ten_q'=>'khách hàng'
            ],
            [

                'ten_q'=>'người bán hàng'
            ]


        ];
        $insert = DB::table('quyen')->insert($quyen);
    }
}
