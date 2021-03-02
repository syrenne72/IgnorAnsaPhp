<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'username',
        'password',
        'bio',
        'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Restituisce le notizie associate all'utente
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news() {
        return $this->hasMany(News::class)->orderBy('created_at', 'DESC');
    }

    public function profileImage() {
        $imagePath = ($this->foto) ? $this->foto : '/profile/KIuQgQJjUVb3o8T5g9pcbZ8mubWDPieBkbJSIaWA.jpg';
        return '/storage/' . $imagePath;
    }
}
