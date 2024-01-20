<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $primaryKey = 'id'; // Ubah primary key menjadi 'id'
    public $incrementing = false; // Non-incrementing key
    protected $keyType = 'string'; // Tipe kunci adalah string

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'reset_password_token',
        'reset_token_expires_at'
    ];

    protected $hidden = [
        'password'
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function uploads()
    {
       return $this->hasMany(Upload::class, 'upload_id', 'id');
    }

    public function variables()
    {
       return $this->hasMany(Variable::class, 'variable_id', 'id');
    }

    // public function hasVerifiedEmail()
    // {
    //     return !is_null($this->email_verified_at);
    // }
}
