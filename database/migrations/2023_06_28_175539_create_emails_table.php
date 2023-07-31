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
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('rfc', 13)->nullable();
            $table->string('email_address', 50)->unique();
            $table->string('status')->default('active'); // Agrega la columna "status" con valor predeterminado "active"
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
        Schema::dropIfExists('emails');
    }
};
