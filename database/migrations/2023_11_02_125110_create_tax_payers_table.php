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
        Schema::create('tax_payers', function (Blueprint $table) {
            $table->id(); // Campo de ID autoincremental
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tax_id_number', 20)->unique();
            $table->string('legal_name_or_business_name');
            $table->string('address_street');
            $table->string('address_number');
            $table->string('address_neighborhood');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('postal_code', 10);
            $table->string('taxpayer_type');
           // $table->string('fiscal_regimes');
            $table->unsignedBigInteger('tax_regimes_id');
            $table->foreign('tax_regimes_id')->references('id')->on('tax_regimes')->onDelete('cascade');
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->date('start_of_operations');
            $table->string('tax_registration');
            $table->string('economic_activity');
            $table->timestamps(); // Campos de fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_payers');
    }
};
