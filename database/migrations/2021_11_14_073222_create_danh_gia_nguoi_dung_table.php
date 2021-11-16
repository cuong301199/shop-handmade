<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia_nguoi_dung', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nm')->unsigned();
            $table->foreign('id_nm')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_nb')->unsigned();
            $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');

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
        Schema::dropIfExists('danh_gia_nguoi_dung');
    }
}
