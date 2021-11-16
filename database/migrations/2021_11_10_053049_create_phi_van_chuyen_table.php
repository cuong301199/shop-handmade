<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhiVanChuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phi_van_chuyen', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_tp')->unsigned();
            $table->foreign('id_tp')->references('matp')->on('tbl_tinhthanhpho')->onDelete('cascade');

            $table->bigInteger('id_qh')->unsigned();
            $table->foreign('id_qh')->references('maqh')->on('tbl_quanhuyen')->onDelete('cascade');

            $table->bigInteger('id_xa')->unsigned();
            $table->foreign('id_xa')->references('maxa')->on('tbl_xaphuongthitran')->onDelete('cascade');

            $table->float('phi_pvc')->nullable();

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
        Schema::dropIfExists('phi_van_chuyen');
    }
}
