<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('numero','100')->unique();
            $table->string('acao','255');
            $table->string('requerente','300');
            $table->string('adv_requerente','300');
            $table->string('requerido','300');
            $table->string('adv_requerido','300');
            $table->string('juiz','300');
            $table->string('promotor','300');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processos');
    }
}
