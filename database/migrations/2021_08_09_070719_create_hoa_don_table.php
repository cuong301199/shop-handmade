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

            $table->bigInteger('id_nm')->unsigned();
            $table->foreign('id_nm')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_nb')->unsigned();
            $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_tt')->unsigned()->default('2');
            $table->foreign('id_tt')->references('id')->on('trang_thai_don_hang')->onDelete('cascade');

            $table->bigInteger('id_pttt')->unsigned();
            $table->foreign('id_pttt')->references('id')->on('phuong_thuc_thanh_toan')->onDelete('cascade');

            $table->bigInteger('id_ttvc')->unsigned();
            $table->foreign('id_ttvc')->references('id')->on('thong_tin_van_chuyen')->onDelete('cascade');

            $table->string('ghi_chu')->nullable();

            $table->string('phuong_thuc_thanh_toan')->nullable();

            $table->string('tong_sp')->nullable();

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
