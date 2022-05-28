<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas_de_regalo', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 30);
            $table->string('descripcion', 45);
            $table->float('valor');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('estatus_tarjetas_id')->constrained('estatus_tarjetas');
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
        Schema::dropIfExists('tarjetas_de_regalo');
    }
};
