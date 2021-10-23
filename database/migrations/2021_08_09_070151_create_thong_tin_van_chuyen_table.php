<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinVanChuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_tin_van_chuyen', function (Blueprint $table) {
            $table->id('id');
            $table->string('ten_ttvc');
            $table->bigInteger('id_nm')->unsigned();
            $table->foreign('id_nm')->references('id')->on('nguoi_dung')->onDelete('cascade');
            $table->string('sdt_ttvc');
            $table->string('diachi_ttvc');
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
        Schema::dropIfExists('thong_tin_van_chuyen');
    }
}
