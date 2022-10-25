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
            $table->integer('categorie_balade_id')->unsigned()->nullable();
            $table->foreign('categorie_balade_id')->references('id')->on('categorie_balades')->onDelete('cascade');
            $table->date("date")-> nullable();
            $table->string("name")-> nullable();
            $table->string("address")-> nullable();
            $table->string("mobile")-> nullable();
            $table->string("description")-> nullable();
            $table->string("image")->default("https://www.allibert-trekking.com/iconographie/17/CA1_vtt-baroque-en-haute-maurienne.jpg");
            $table->string("quantity")-> nullable();
            $table->string("discount_price")-> nullable();   
            $table->Enums('status', ['Started', 'Finished','Pending'])->default('Pending');   
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
