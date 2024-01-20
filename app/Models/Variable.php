<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'label', 'user_id'];

    public function datas()
    {
       return $this->belongsTo(Data::class, 'id', 'variable_id');
    }

    public function users()
    {
       return $this->hasOne(User::class, 'id', 'user_id');
    }
}
