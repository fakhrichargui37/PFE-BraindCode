<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGamification extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = ['user_id', 'quiz_id', 'score', 'level', 'badges', 'is_valid'];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
