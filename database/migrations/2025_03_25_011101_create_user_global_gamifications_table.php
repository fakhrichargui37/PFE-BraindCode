<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_global_gamifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // L'utilisateur
            $table->integer('total_points')->default(0); // Total des points cumulés
            $table->string('global_level')->default('Débutant'); // Niveau global de l'utilisateur
            $table->integer('badges')->default(0); // Nombre de badges obtenus
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_global_gamifications');
    }
};
