<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Planoobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planoobs', function (Blueprint $table) {
            $table->bigIncrements('planobs_id');
            $table->string('planobs_plano');
            $table->string('planobs_produto');
            $table->string('planobs_quantidade')->nullable();
            $table->string('planobs_valor')->nullable();
            $table->string('planobs_incluso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planoobs');
    }
}
