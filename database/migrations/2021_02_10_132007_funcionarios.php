<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Funcionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('func_id');
            $table->string('func_nome');
            $table->string('func_cpf')->unique();
            $table->string('func_rg')->unique();
            $table->string('func_estadocivil');
            $table->string('func_cep');
            $table->string('func_logradouro');
            $table->string('func_num');
            $table->string('func_complemento');
            $table->string('func_bairro');
            $table->string('func_cidade');
            $table->string('func_uf');
            $table->string('func_datanasc');
            $table->string('func_tel1');
            $table->string('func_tel2')->nullable();
            $table->string('func_celular')->nullable();
            $table->string('func_sexo');
            $table->string('func_email')->nullable();
            $table->string('func_dep');
            $table->string('func_setor');
            $table->string('func_func');
            $table->string('func_ctps');
            $table->string('func_serie');
            $table->string('func_ufctps');
            $table->string('func_pis');
            $table->string('func_salario');
            $table->string('func_conjugue')->nullable(); 
            $table->string('func_nomemae')->nullable();
            $table->string('func_nomepai')->nullable();
            $table->string('func_dataadm');
            $table->string('func_datadem')->nullable();
            $table->string('func_obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
