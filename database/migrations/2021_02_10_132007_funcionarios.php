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
            $table->string('func_estadocivil');
            $table->string('func_cep');
            $table->string('func_endereco');
            $table->string('func_bairro');
            $table->string('func_cidade');
            $table->string('func_estado');
            $table->string('func_datanasc');
            $table->string('func_tel1');
            $table->string('func_tel2');
            $table->string('func_celular');
            $table->string('func_sexo');
            $table->string('func_rg')->unique();
            $table->string('func_email');
            $table->string('func_nomemae');
            $table->string('func_datamae');
            $table->string('func_nomepai');
            $table->string('func_datapai');
            $table->string('func_endpais');
            $table->string('func_espec');
            $table->string('func_dataadm');
            $table->string('func_datadem');
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
