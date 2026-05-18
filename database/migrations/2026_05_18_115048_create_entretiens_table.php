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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['telephonique', 'RH','technique', 'final']);
            $table->dateTime('date_heure');
            $table->text('notes_prepa')->nullable();
            $table->enum('resultat', ['positif', 'negatif', 'en attente'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretiens');
    }
};
