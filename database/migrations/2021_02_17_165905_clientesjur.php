<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientesjur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientesjur', function (Blueprint $table) {
            $table->bigIncrements('clijur_id');
            $table->string('clijur_nome');
            $table->string('clijur_cnpj')->unique();
            $table->string('clijur_cep')->nullable();
            $table->string('clijur_logradouro')->nullable();
            $table->string('clijur_num')->nullable();
            $table->string('clijur_complemento')->nullable();
            $table->string('clijur_bairro')->nullable();
            $table->string('clijur_cidade')->nullable();
            $table->string('clijur_uf');
            $table->string('clijur_tel1');
            $table->string('clijur_tel2')->nullable();
            $table->string('clijur_celular')->nullable();
            $table->string('clijur_email')->nullable();
            $table->string('clijur_inscest');
            $table->string('clijur_razaosocial')->nullable();
            $table->string('clijur_website')->nullable();
            $table->string('clijur_areaatuacao')->nullable();
            $table->string('clijur_nomerep');
            $table->string('clijur_emailrep')->nullable();
            $table->string('clijur_contatorep');
            $table->string('clijur_obs')->nullable();
            $table->string('clijur_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientesjur');
    }
}
