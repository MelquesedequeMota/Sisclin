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
            $table->integer('med_id')->unique();
            $table->string('medat_domingo')->nullable();
            $table->string('medat_segunda')->nullable();
            $table->string('medat_terca')->nullable();
            $table->string('medat_quarta')->nullable();
            $table->string('medat_quinta')->nullable();
            $table->string('medat_sexta')->nullable();
            $table->string('medat_sabado')->nullable();
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
