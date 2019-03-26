<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class horarios extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idh';
    protected $fillable = ['idh','tipohorario'];
}
