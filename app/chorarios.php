<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chorarios extends Model
{
   protected $primaryKey = 'idhc';  
   protected $fillable=['idhc','tipo'];
}
