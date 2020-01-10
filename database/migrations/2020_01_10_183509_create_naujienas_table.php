<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaujienasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naujienas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naujienospavadinimas');
            $table->string('naujienosnuotrauka');
            $table->text('naujienostekstas');
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
        Schema::dropIfExists('naujienas');
    }
}
