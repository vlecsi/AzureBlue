<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCititorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cititors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
//            $table->string('nr_permis')->unique();
            $table->string('nr_permis');
            $table->string('nume');
            $table->string('prenume');
      //      $table->string('email')->nullable()->unique();
       //     $table->string('cnp')->unique();
            $table->string('email')->nullable();
            $table->string('cnp')->nullable();
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
        Schema::dropIfExists('cititors');
    }
}
