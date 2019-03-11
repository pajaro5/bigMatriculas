<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('malla_id');
            $table->foreign('malla_id')->references('id')->on('mallas');
            $table->integer('periodo_academico_id');
            $table->foreign('periodo_academico_id')->references('id')->on('periodo_academicos');
            $table->integer('unidad_curricular_id');
            $table->foreign('unidad_curricular_id')->references('id')->on('unidad_curriculares');
            $table->integer('campo_formacion_id');
            $table->foreign('campo_formacion_id')->references('id')->on('campo_formaciones');
            $table->integer('codigo_padre_prerequisito');
            $table->foreign('codigo_padre_prerequisito')->references('id')->on('asignaturas');
            $table->integer('codigo_padre_corequisito');
            $table->foreign('codigo_padre_corequisito')->references('id')->on('asignaturas');
            $table->string('codigo', 50);
            $table->string('nombre', 50);
            $table->integer('horas_practica');
            $table->integer('horas_docente');
            $table->integer('horas_autonoma');
            $table->string('tipo', 50);
            $table->string('estado', 20)->default('ACTIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
