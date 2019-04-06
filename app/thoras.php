<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thoras extends Model
{
   protected $primaryKey = 'idhora';  
   protected $fillable=['idhora','hora','disponibilidad','idhc'];
}
