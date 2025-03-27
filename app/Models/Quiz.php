<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecon_id',
        'titre',
        'noteFinale',
        'dureeMaximale'
    ];

    /**
     * Relation avec la leçon
     */
    public function lecon()
    {
        return $this->belongsTo(Lecon::class);
    }

    /**
     * Relation avec les questions
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
