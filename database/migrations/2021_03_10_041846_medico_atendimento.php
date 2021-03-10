<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicoAtendimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_atendimento', function (Blueprint $table) {
            $table->bigIncrements('medat_id');
            $table->integer('med_id');
            $table->string('medat_domingo');
            $table->string('medat_segunda');
            $table->string('medat_terca');
            $table->string('medat_quarta');
            $table->string('medat_quinta');
            $table->string('medat_sexta');
            $table->string('medat_sabado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico_atendimento');
    }
}
