<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('id_nm')->unsigned();
            $table->foreign('id_nm')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id')->on('san_pham')->onDelete('cascade');

            $table->bigInteger('id_nb')->unsigned();
            $table->foreign('id_nb')->references('id')->on('nguoi_dung')->onDelete('cascade');

            $table->string('noidung_bl');
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
        Schema::dropIfExists('binh_luan');
    }
}
