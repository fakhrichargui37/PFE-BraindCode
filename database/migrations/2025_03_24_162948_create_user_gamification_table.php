<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_gamifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable(); // L'utilisateur
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade')->nullable(); // Le quiz
            $table->integer('score')->nullable(); // Score obtenu
            $table->string('level')->default('Débutant')->nullable(); // Niveau de l'utilisateur
            $table->integer('badges')->default(0); // Nombre de badges obtenus
            $table->boolean('is_valid')->default(false); // Validation spécifique pour chaque utilisateur
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('user_gamifications', function (Blueprint $table) {
            $table->dropColumn('is_valid'); // Suppression du champ is_valid si la migration est annulée
        });
    }
};
