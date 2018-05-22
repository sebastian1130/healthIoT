<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->string('identificacion', 10)->unique();
            $table->string('descripcion');
            $table->integer('prioridad');
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('sistemas', function (Blueprint $table){
        $table->dropForeign(['user_id']);
      });
        Schema::dropIfExists('sistemas');
        ////// EN RELACIONES 1-N, LA TABLA QUE TIENE LA N ES LA QUE LLEVA ESTE CÓDIGO NUEVO
    }
}
