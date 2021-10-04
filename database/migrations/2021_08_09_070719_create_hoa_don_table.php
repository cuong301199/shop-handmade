<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_ch')->unsigned();
            $table->foreign('id_ch')->references('id')->on('cua_hang')->onDelete('cascade');


            $table->string('ghi_chu')->nullable();
            $table->string('phuong_thuc_thanh_toan')->nullable();
            $table->string('tong_sp')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('tong_tien')->nullable();

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
        Schema::dropIfExists('hoa_don');
    }
}
