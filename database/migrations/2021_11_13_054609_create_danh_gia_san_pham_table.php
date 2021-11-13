<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia_san_pham', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id')->on('san_pham')->onDelete('cascade');

            $table->string('noidung_dg');

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
        Schema::dropIfExists('danh_gia_san_pham');
    }
}
