<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkelbimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skelbimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('skelbimopavadinimas');
            $table->string('skelbimonuotrauka');
            $table->text('skelbimotekstas');
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
        Schema::dropIfExists('skelbimas');
    }
}
