<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('velos', function (Blueprint $table) {
            $table->bigIncrements('id');
            #$table->unsignedBigInteger('Category_id');
            $table->String('marque');
           # $table->String('slug');
            $table->string('description');
            $table->string('photo');
           # $table->foreign('Category_id')->references('id')->on('categorie')->onDelete('cascade');
           $table->foreignId("category_id")
           ->references("id")
           ->on("categories")
           ->onDelete("cascade")
           ->onUpdate("cascade");
            $table->timestamps();});}
          

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('velos');
    }
}
