<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nb')->unsigned();
            $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');


            $table->bigInteger('id_lsp')->unsigned();
            $table->foreign('id_lsp')->references('id')->on('loai_san_pham')->onDelete('cascade');

            $table->bigInteger('id_tp')->unsigned();
            $table->foreign('id_tp')->references('matp')->on('tbl_tinhthanhpho')->onDelete('cascade');

            $table->bigInteger('id_qh')->unsigned();
            $table->foreign('id_qh')->references('maqh')->on('tbl_quanhuyen')->onDelete('cascade');

            $table->bigInteger('id_xa')->unsigned();
            $table->foreign('id_xa')->references('maxa')->on('tbl_xaphuongthitran')->onDelete('cascade');

            $table->bigInteger('id_trangthai')->unsigned();
            $table->foreign('id_trangthai')->references('id')->on('trang_thai_san_pham')->onDelete('cascade');

            $table->integer('soluong_sp')->nullable();
            $table->integer('soluong_daban')->nullable();
            $table->string('ten_sp');

            $table->text('mota_sp')->nullable();
            $table->float('gia_sp')->nullable();
            $table->string('hinhanh_sp')->nullable();


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
        Schema::dropIfExists('san_pham');
    }
}
