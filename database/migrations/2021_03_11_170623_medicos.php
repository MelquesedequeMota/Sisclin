<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->bigIncrements('med_id');
            $table->string('med_nome');
            $table->string('med_cpf')->unique();
            $table->string('med_estadocivil');
            $table->string('med_sexo');
            $table->string('med_datanasc');
            $table->string('med_cep')->nullable();
            $table->string('med_logradouro')->nullable();
            $table->string('med_num')->nullable();
            $table->string('med_complemento')->nullable();
            $table->string('med_bairro')->nullable();
            $table->string('med_cidade')->nullable();
            $table->string('med_uf');
            $table->string('med_tel1');
            $table->string('med_tel2')->nullable();
            $table->string('med_celular')->nullable();
            $table->string('med_rg')->unique()->nullable();
            $table->string('med_email')->nullable();
            $table->integer('med_espec');
            $table->string('med_especi')->nullable();
            $table->integer('med_comissao');
            $table->integer('med_diapag');
            $table->string('med_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
