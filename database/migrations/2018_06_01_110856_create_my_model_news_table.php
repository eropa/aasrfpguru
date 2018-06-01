<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyModelNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_model_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameNew');
            $table->integer('CatNew');
            $table->text('TextStartNew');
            $table->text('TextAboutNew');
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
        Schema::dropIfExists('my_model_news');
    }
}
