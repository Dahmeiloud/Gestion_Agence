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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_departe');
            $table->string('lieu_arivee');
            $table->bigInteger('prix');
            $table->string('adresse');
            $table->unsignedBigInteger('agence_id');
            // $table->foreign('agence_id')->references('id')->on('agences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
