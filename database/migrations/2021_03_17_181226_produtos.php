<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('prod_id');
            $table->string('prod_nome')->unique();
            $table->string('prod_desc')->nullable();
            $table->string('prod_cate');
            $table->string('prod_tipo');
            $table->integer('prod_quant')->nullable();
            $table->integer('prod_estqmin')->nullable();
            $table->double('prod_valor')->nullable();
            $table->string('prod_serviitens')->nullable();
            $table->string('prod_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
