<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DanhmucSeeder extends Seeder
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
                'ten_dm'=> 'danhmuc1',
                'mota_dm'=>'1423434'
            ],
         ];

         $insert = DB::table('danh_muc')->insert($danhmuc);
    }


}
