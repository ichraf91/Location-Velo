<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balade', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")-> nullable();
            $table->integer('categorie_balade_id')->unsigned()->nullable();
            $table->foreign('categorie_balade_id')->references('id')->on('categorie_balades')->onDelete('cascade');
            $table->string("name")-> nullable();
            $table->string("address")-> nullable();
            $table->string("mobile")-> nullable();
            $table->string("description")-> nullable();
            $table->string("image")->default("http://lorempixel.com/200/200");
            $table->string("quantity")-> nullable();
            $table->string("discount_price")-> nullable();          
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
        Schema::dropIfExists('balade');
    }
}
