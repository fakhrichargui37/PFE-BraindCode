<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'contenu'
    ];

    /**
     * Relation avec le quiz
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Relation avec les réponses
     */
    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
