<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
   protected $table = 'datas';
   
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'upload_id',
      'variable_id',
      'region_id',
      'value'
  ];

    public function uploads()
    {
       return $this->belongsTo(Upload::class, 'id', 'upload_id');
    }

    public function variables()
    {
       return $this->hasOne(Variable::class, 'id', 'variable_id');
    }

    public function regions()
    {
       return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
