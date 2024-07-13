<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_out', function (Blueprint $table) {
            $table->id('id_cash_out');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_bank');
            $table->foreign('id_bank')->references('id_bank')->on('bank');
            $table->char('no_rekening');
            $table->string('nama_rekening');
            $table->integer('nominal');
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
        Schema::dropIfExists('cash_out');
    }
}
