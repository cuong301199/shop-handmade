<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuahangDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuahang_danhmuc', function (Blueprint $table) {

            $table->bigInteger('id_nb')->unsigned();
            $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_dm')->unsigned();
            $table->foreign('id_dm')->references('id')->on('danh_muc')->onDelete('cascade');

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
        Schema::dropIfExists('cuahang_danhmuc');
    }
}
