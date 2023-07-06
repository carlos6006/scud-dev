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
        Schema::create('changelogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('version');
            $table->unsignedBigInteger('type_id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('categori_id');
            $table->string('ruta')->nullable();
            $table->date('fecha_actualizacion');
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categori_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('changelogs', function (Blueprint $table){
        $table->dropForeign(['type_id']);
        $table->dropColumn('type_id');
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        $table->dropForeign(['categori_id']);
        $table->dropColumn('categori_id');
        });
    }
};
