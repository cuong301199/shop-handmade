<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaGiamGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ma_giam_gia', function (Blueprint $table) {
            $table->id('id');
            $table->string('ten_mgg')->nullable();
            $table->string('ma_mgg')->nullable();
            $table->integer('dieukien_mgg')->nullable();
            $table->integer('giatri_mgg')->nullable();
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
        Schema::dropIfExists('ma_giam_gia');
    }
}
