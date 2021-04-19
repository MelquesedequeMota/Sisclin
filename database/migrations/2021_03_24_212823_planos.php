<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Planos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->bigIncrements('plan_id');
            $table->string('plan_nome');
            $table->string('plan_desc')->nullable();
            $table->integer('plan_qtddep')->nullable();
            $table->double('plan_valor')->nullable();
            $table->string('plan_servicos')->nullable();
            $table->string('plan_itens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planos');
    }
}
