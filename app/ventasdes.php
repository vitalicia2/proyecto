<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventasdes extends Model
{
   protected $primaryKey = 'idv';  
   protected $fillable=['idv','idcl','fecha'];
}
