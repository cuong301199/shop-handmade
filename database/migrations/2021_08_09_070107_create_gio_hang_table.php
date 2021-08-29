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
            $table->string('ten_gh')->nullable();
            $table->integer('so_luong')->nullable();
            $table->float('tong_tien')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->string('phi_van_chuyen')->nullable();
            $table->string('dia_diem_giao_hang')->nullable();
            $table->string('hinh_thuc_thanh_toan')->nullable();
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
