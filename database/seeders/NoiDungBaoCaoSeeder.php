<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NoiDungBaoCaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noidung=[
            [

                'noidung_bc'=>'Sản phẩm bị cấm',
                'thangdiem_bc'=>'4'
            ],
            [

                'noidung_bc'=>'Sản phẩm có hình ảnh phản cảm',
                'thangdiem_bc'=>'3'
            ],

            [

                'noidung_bc'=>'Sản phẩm có dấu hiệu lừa đảo',
                'thangdiem_bc'=>'2'
            ],

            [

                'noidung_bc'=>'Sản phẩm có hình ảnh không rõ ràng',
                'thangdiem_bc'=>'1'
            ],


        ];
        $insert = DB::table('noi_dung_bao_cao')->insert($noidung);
    }
}
