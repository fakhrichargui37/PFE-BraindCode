<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'contenu',   // Utilisez 'contenu' ici pour correspondre à la migration
        'est_correcte'  // Utilisez 'est_correcte' pour le booléen
    ];

    /**
     * Relation avec la question
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
