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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('last_access')->nullable();
            $table->time('two_steps')->nullable();
            $table->boolean('activo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Desactivar las restricciones de clave externa
DB::statement('SET FOREIGN_KEY_CHECKS=0;');

// Ejecutar la migración para eliminar la tabla 'users'
Schema::dropIfExists('users');

// Reactivar las restricciones de clave externa
DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
};
