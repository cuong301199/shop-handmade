<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuaHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cua_hang', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->bigInteger('id_qt')->unsigned()->nullable();
            $table->foreign('id_qt')->references('id')->on('quan_tri')->onDelete('cascade');
            $table->string('ten_ch');
            $table->string('sdt_ch');
            $table->string('diachi_ch');
            $table->integer('trangthai_ch')->default('0');

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
        Schema::dropIfExists('cua_hang');
    }
}
