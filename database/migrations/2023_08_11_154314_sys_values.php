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
        Schema::dropIfExists('sys_values');

        Schema::create('sys_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('setting_name'); // Nombre del valor del sistema
            $table->string('value'); // Valor real del sistema
            $table->text('description')->nullable(); // Descripción opcional
            $table->dateTime('last_updated'); // Fecha y hora de última modificación
            $table->timestamps();

            // Agregar más columnas según tus necesidades, como created_by, updated_by, is_active, etc.

            $table->index('setting_name'); // Índice para acelerar búsquedas por nombre de configuración
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_values');
    }
};
