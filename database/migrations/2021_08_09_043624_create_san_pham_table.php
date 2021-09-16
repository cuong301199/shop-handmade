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

            $table->bigInteger('id_ch')->unsigned();
            $table->foreign('id_ch')->references('id')->on('cua_hang')->onDelete('cascade');

            $table->bigInteger('id_dm')->unsigned();
            $table->foreign('id_dm')->references('id')->on('danh_muc')->onDelete('cascade');

            $table->bigInteger('id_lsp')->unsigned();
            $table->foreign('id_lsp')->references('id')->on('loai_san_pham')->onDelete('cascade');

            $table->string('ten_sp');
            $table->text('mota_sp')->nullable();
            $table->float('gia_sp')->nullable();
            $table->string('hinhanh_sp')->nullable();
            $table->integer('soluong_sp')->nullable();

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
