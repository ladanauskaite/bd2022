<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervacijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezervacijas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sportoklubo_id');
            $table->foreign('sportoklubo_id')->references('id')->on('sportoklubas');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('sales_id');
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->unsignedBigInteger('treniruotes_id');
            $table->foreign('treniruotes_id')->references('id')->on('treniruotes');
            $table->date('treniruotes_data');
            $table->time('laikas_nuo');
            $table->time('laikas_iki');
            $table->integer('kiekis');
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
        Schema::dropIfExists('rezervacijas');
    }
}
