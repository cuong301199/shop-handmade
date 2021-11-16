<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viet', function (Blueprint $table) {
            $table->id('id');
            $table->string('tieude_bv')->nullable();
            $table->bigInteger('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->longText('noidung_bv')->nullable();
            $table->longText('tomtat_bv')->nullable();
            $table->string('hinhanh_bv')->nullable();

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
        Schema::dropIfExists('bai_viet');
    }
}
