<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $primaryKey ='idp';
    protected $fillable = ['idp','producto','precio'];
}
