<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyTreatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_treats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameTreats')->unique();
            $table->string('TypeIstochnik');
            $table->string('Posledctvies');
            $table->integer('userCreate');
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
        Schema::dropIfExists('my_treats');
    }
}
