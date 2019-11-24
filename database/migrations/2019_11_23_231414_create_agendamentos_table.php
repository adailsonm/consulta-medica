<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned()->nullable();
            $table->integer('medico_id')->unsigned()->nullable();
            $table->integer('especialidade_id')->unsigned()->nullable();
            $table->string('descricao');
            $table->datetime('data');
            $table->timestamps();
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('medico_id')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
