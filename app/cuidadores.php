<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class cuidadores extends Model
{
 
    protected $primaryKey ='idcuidador';
    protected $fillable = ['idcuidador','nombre','app','apm','cedula','idt'];
  
    
}
