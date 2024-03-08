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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('code')->unique();
            $table->unsignedBigInteger('agence_id');
        //   $table->foreign('agence_id')->references('id')->on('agences');
           $table->unsignedBigInteger('chauffeur_id');
        //    $table->foreign('chauffeur_id')->references('id')->on('chauffeurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
