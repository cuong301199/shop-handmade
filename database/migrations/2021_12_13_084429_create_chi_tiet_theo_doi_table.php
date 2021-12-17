<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietTheoDoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_theo_doi', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_td')->unsigned();
            $table->foreign('id_td')->references('id')->on('theo_doi')->onDelete('cascade');
            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');



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
        Schema::dropIfExists('chi_tiet_theo_doi');
    }
}
