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
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('prix');
            $table->unsignedBigInteger('agence_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('trajet_id');
            // $table->string('billet_code')->nullable;
            // $table->text('barcode')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billets');
    }
};
