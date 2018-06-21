<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyProchentStoikostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_prochent_stoikosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idSecurite');
            $table->integer('idTreats');
            $table->double('Prochent');
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
        Schema::dropIfExists('my_prochent_stoikosts');
    }
}
