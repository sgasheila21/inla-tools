<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'year',
        'upload_date',
        'title'
    ];

    public function user()
    {
       return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function datas()
    {
       return $this->hasMany(Data::class, 'upload_id', 'id');
    }
}
