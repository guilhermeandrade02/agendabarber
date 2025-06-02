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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' com auto-incremento
            $table->string('name'); // Cria uma coluna 'name' para armazenar o nome do empregado
            $table->string('value'); // Cria uma coluna 'name' para armazenar o nome do empregado
            $table->bigInteger('category_id');
            $table->enum('status', ['enabled', 'disabled']); // Cria uma coluna 'status' com os valores possíveis 'enabled' e 'disabled'
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
