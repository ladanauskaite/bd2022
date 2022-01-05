<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportoklubasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sportoklubas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('sportoklubopavadinimas');
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
        Schema::dropIfExists('sportoklubas');
    }
}
