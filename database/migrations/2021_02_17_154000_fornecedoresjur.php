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
            $table->string('forjur_cep')->nullable();
            $table->string('forjur_logradouro')->nullable();
            $table->string('forjur_num')->nullable();
            $table->string('forjur_complemento')->nullable();
            $table->string('forjur_bairro')->nullable();
            $table->string('forjur_cidade')->nullable();
            $table->string('forjur_uf');
            $table->string('forjur_tel1');
            $table->string('forjur_tel2')->nullable();
            $table->string('forjur_celular')->nullable();
            $table->string('forjur_email')->nullable();
            $table->string('forjur_inscest');
            $table->string('forjur_razaosocial')->nullable();
            $table->string('forjur_website')->nullable();
            $table->string('forjur_areaatuacao')->nullable();
            $table->string('forjur_nomerep');
            $table->string('forjur_emailrep')->nullable();
            $table->string('forjur_contatorep');
            $table->string('forjur_obs')->nullable();
            $table->string('forjur_status');
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
