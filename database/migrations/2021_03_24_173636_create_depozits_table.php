<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepozitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depozits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('carte_id');
            $table->integer('nr_inventar');
            $table->string('depozit');
            $table->softDeletes(); 
            $table->foreign('carte_id')->references('id')->on('cartes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depozits');
    }
}
