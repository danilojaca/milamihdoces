<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('produtos');
            $table->string('data');
            $table->decimal('valor',15,2);
            $table->decimal('custo',15,2);
            $table->decimal('lucro',15,2);
            $table->decimal('desconto',15,2)->nullable();
            $table->integer('entrega')->nullable();
            $table->string('observacao')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
