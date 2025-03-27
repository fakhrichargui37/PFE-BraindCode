<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'module_id',
        'type',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function quiz()
{
    return $this->hasOne(Quiz::class);
}
}
