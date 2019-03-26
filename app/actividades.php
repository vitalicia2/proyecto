<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actividades extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idactividades';
    protected $fillable = ['idactividades','hora1','act1','hora2','act2','hora3','act3','hora4',
    'act4','hora5','act5','hora6','act6'];
    protected $date=['deleted_at'];
  
}
