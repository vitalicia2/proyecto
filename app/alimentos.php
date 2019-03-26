<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alimentos extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idalimentos';
    protected $fillable = ['idalimentos','tipoalimento'];
    protected $date=['deleted_at'];
  
}
