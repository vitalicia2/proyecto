<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class medicamentos extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idmedicamento';
    protected $fillable = ['idmedicamento','indicacion','presen','terminotx','idh','idamedicamento'];
}
