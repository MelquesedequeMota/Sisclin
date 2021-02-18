<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('pac_id');
            $table->string('pac_nome');
            $table->string('pac_cpf')->unique();
            $table->string('pac_estadocivil');
            $table->string('pac_sexo');
            $table->string('pac_datanasc');
            $table->string('pac_profissao')->nullable();
            $table->string('pac_cep');
            $table->string('pac_logradouro');
            $table->string('pac_num');
            $table->string('pac_complemento');
            $table->string('pac_bairro');
            $table->string('pac_cidade');
            $table->string('pac_uf');
            $table->string('pac_tel1');
            $table->string('pac_tel2')->nullable();
            $table->string('pac_celular')->nullable();
            $table->string('pac_rg')->unique();
            $table->string('pac_email')->nullable();
            $table->string('pac_nomeres')->nullable();
            $table->string('pac_telres')->nullable();
            $table->string('pac_obseti')->nullable();
            $table->string('pac_situ')->nullable();
            $table->string('pac_obj')->nullable();
            $table->string('pac_obs')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
