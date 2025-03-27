<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecon_id')->nullable();
            $table->string('titre')->nullable();
            $table->integer('noteFinale')->nullable();
            $table->integer('dureeMaximale')->nullable();
            $table->timestamps();

            $table->foreign('lecon_id')->references('id')->on('lecons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
