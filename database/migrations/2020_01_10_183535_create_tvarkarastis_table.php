<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvarkarastisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvarkarastis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('treniruotespavadinimas');
            $table->date('data');
            $table->time('laikas_nuo');
            $table->time('laikas_iki');
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
        Schema::dropIfExists('tvarkarastis');
    }
}
