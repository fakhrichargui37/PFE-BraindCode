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
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id')->nullable(); // Clé étrangère vers la table questions
            $table->text('contenu')->nullable(); // Texte de la réponse
            $table->boolean('est_correcte')->default(false)->nullable(); // Indique si la réponse est correcte ou non
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};

