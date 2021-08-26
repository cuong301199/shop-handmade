<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class QuanTriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantri =[
            [
                'username' =>'admin',
                'password'=>'$2a$12$Vu7guJ2T.N2HUZ9kt0foeObHnSMSvg48R7Sj6PhRda.oJF7YQ7AhW',
                'ten_qt'=>'Tien Cuong',
                'email_qt'=>'cuong@gmail.com',
            ],
        ];
        $insert = DB::table('quan_tri')->insert($quantri);
    }
}
