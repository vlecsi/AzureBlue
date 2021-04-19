<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirculatiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulaties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_cititor')->unsigned();
            $table->integer('id_carte')->unsigned();
            $table->integer('zile')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->boolean('prelungire');
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circulaties');
    }
}
