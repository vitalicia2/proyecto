<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipos extends Model
{
    protected $primaryKey ='idt';
    protected $fillable = ['idt','tipo','activo'];
}
