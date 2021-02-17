<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fornecedoresfis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedoresfis', function (Blueprint $table) {
            $table->bigIncrements('forfis_id');
            $table->string('forfis_nome');
            $table->string('forfis_cpf')->unique();
            $table->string('forfis_estadocivil');
            $table->string('forfis_sexo');
            $table->string('forfis_datanasc');
            $table->string('forfis_cep');
            $table->string('forfis_logradouro');
            $table->string('forfis_num');
            $table->string('forfis_complemento');
            $table->string('forfis_bairro');
            $table->string('forfis_cidade');
            $table->string('forfis_uf');
            $table->string('forfis_tel1');
            $table->string('forfis_tel2')->nullable();
            $table->string('forfis_celular')->nullable();
            $table->string('forfis_rg')->unique();
            $table->string('forfis_email');
            $table->string('forfis_razaosocial')->nullable();
            $table->string('forfis_website')->nullable();
            $table->string('forfis_areaatuacao')->nullable();
            $table->string('forfis_obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedoresfis');
    }
}
