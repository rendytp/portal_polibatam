<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password', 'nama', 'role'];
    protected $hidden = ['password', 'remember_token'];

    // Relasi ke Layanan Favorit
    public function favorits()
    {
        return $this->belongsToMany(Layanan::class, 'user_favorit', 'id_user', 'id_layanan');
    }

    // Relasi ke Custom Link
    public function customLinks()
    {
        return $this->hasMany(UserCustomLink::class, 'id_user');
    }
}