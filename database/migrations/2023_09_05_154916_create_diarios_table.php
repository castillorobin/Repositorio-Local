<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('numero_diario');
            $table->string('tomo');
            $table->date('fecha');
            $table->year('anio');
            $table->text('descripcion');
            $table->string('archivo');
            $table->string('usuario'); // Agregar la columna 'usuario' aquí
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
        Schema::dropIfExists('diarios');
    }
}

