<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventadetallesdes extends Model
{
      protected $primaryKey = 'idvd';  
   protected $fillable=['idvd','idv','cantidad','costo','decuento','idp'];
}
