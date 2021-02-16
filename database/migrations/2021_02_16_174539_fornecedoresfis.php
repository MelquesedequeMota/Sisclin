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
            $table->string('forfis_cep')->nullable();
            $table->string('forfis_endereco')->nullable();
            $table->string('forfis_bairro')->nullable();
            $table->string('forfis_cidade')->nullable();
            $table->string('forfis_estado')->nullable();
            $table->string('forfis_tel1')->nullable();
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
