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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nom_entreprise', 255);
            $table->string('poste', 255);
            $table->string('url_offre')->nullable(); 
            $table->enum('statut', [
                'a examiner', 
                'entretien programme', 
                'offre reçue', 
                'refusee', 
                'abandonnee'
            ])->default('a examiner');
            $table->enum('priorite', ['faible', 'moyenne', 'haute'])->default('moyenne');
            $table->text('notes')->nullable();
            $table->date('date_candidature');
            $table->softDeletes(); 
            $table->timestamps();
            // $table->string('document_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};