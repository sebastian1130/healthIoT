<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takens', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valorPS', 6, 3); //Presión Sistólica
            $table->float('valorPD', 6, 3); //Presión Diastólica
            $table->float('valorT', 6, 3);
            $table->integer('sistema_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('sistema_id')->references('id')->on('CreateSistemasTable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('takens', function (Blueprint $table){
        $table->dropForeign(['sistema_id']);
      });
      Schema::dropIfExists('takens');
    }
}
