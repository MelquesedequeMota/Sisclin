<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fornecedoresjur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedoresjur', function (Blueprint $table) {
            $table->bigIncrements('forjur_id');
            $table->string('forjur_nome');
            $table->string('forjur_cnpj')->unique();
            $table->string('forjur_cep');
            $table->string('forjur_logradouro');
            $table->string('forjur_num');
            $table->string('forjur_complemento');
            $table->string('forjur_bairro');
            $table->string('forjur_cidade');
            $table->string('forjur_uf');
            $table->string('forjur_tel1');
            $table->string('forjur_tel2')->nullable();
            $table->string('forjur_celular')->nullable();
            $table->string('forjur_email');
            $table->string('forjur_razaosocial')->nullable();
            $table->string('forjur_website')->nullable();
            $table->string('forjur_areaatuacao')->nullable();
            $table->string('forjur_nomerep')->nullable();
            $table->string('forjur_emailrep')->nullable();
            $table->string('forjur_contatorep')->nullable();
            $table->string('forjur_obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedoresjur');
    }
}
