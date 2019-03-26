<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class amedicamentos extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idamedicamento';
    protected $fillable = ['idamedicamento','nmedica','mindicacion','mpresen'];
}
