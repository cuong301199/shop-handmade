<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id('id');
            $table->string('username');
            $table->string('password');
            $table->string('diachi_nd');
            $table->string('sdt_nd');
            $table->string('ten_nd')->nullable();
            $table->string('email_nd')->nullable();
            $table->string('gioitinh_nd')->nullable();
            $table->bigInteger('id_q')->unsigned()->default('2');
            $table->foreign('id_q')->references('id')->on('quyen')->onDelete('cascade');



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
        Schema::dropIfExists('nguoi_dung');
    }
}
