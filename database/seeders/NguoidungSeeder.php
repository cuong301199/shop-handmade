<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NguoidungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nguoidung = [
            [
                'ten_nd'=> 'cuong'
            ],
         ];
 
         $insert = DB::table('nguoi_dung')->insert($nguoidung);
    }
}
