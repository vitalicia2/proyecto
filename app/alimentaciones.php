<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alimentaciones extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idalimentacion';
    protected $fillable = ['idalimentacion','hora','menu','consumo','observaciones','idalientos'];
    protected $date=['deleted_at'];
    
}
