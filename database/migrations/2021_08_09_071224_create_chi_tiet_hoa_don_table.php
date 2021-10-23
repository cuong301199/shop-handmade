<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id('id');
            // $table->bigInteger('id_nm')->unsigned();
            // $table->foreign('id_nm')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->bigInteger('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id')->on('san_pham')->onDelete('cascade');
            // $table->bigInteger('id_nb')->unsigned();
            // $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->bigInteger('id_hd')->unsigned();
            $table->foreign('id_hd')->references('id')->on('hoa_don')->onDelete('cascade');

            $table->integer('so_luong');

            $table->integer('gia_sp');

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
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
}
