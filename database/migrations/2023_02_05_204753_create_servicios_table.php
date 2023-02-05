<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("imagen");
            $table->unsignedBigInteger('tipo');
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->text("observaciones");
            $table->timestamps();
            $table->foreign('tipo')->references('id')->on('genericas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
