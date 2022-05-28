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
        Schema::create('canejos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarjetas_de_regalo_id')->constrained('tarjetas_de_regalo');
            $table->foreignId('clientes_id')->constrained('clientes');
            $table->foreignId('ventas_id')->constrained('ventas');
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
        Schema::dropIfExists('canejos');
    }
};
