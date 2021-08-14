<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id('id');
            $table->string('ten_gh');
            $table->integer('so_luong');
            $table->float('tong_tien');
            $table->string('ghi_chu');
            $table->string('phi_van_chuyen');
            $table->string('dia_diem_giao_hang');
            $table->string('hinh_thuc_thanh_toan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
