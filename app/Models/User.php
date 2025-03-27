<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Les attributs pouvant être remplis en masse.
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'startup_name',
        'code_fiscal',
        'startup_email',
        'startup_phone',
        'speciality',
        'description',
        'role', // ✅ Ajout du champ rôle
        'status', // ✅ Ajout du champ status
    ];
    public function globalGamification()
    {
        return $this->hasOne(UserGlobalGamification::class);
    }
    public function quizGamifications()
    {
        return $this->hasMany(UserGamification::class);
    }
    /**
     * Les attributs cachés pour la sérialisation.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Vérifie si l'utilisateur a confirmé son email.
     * Les formateurs sont exemptés de cette vérification.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        // ✅ Si l'utilisateur est un formateur, on considère l'email comme vérifié
        if ($this->role === 'formateur') {
            return true;
        }

        // ✅ Pour les autres rôles, utiliser le comportement normal
        return !is_null($this->email_verified_at);
    }
}
