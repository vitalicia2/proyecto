<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class detalles extends Model
{

    protected $primaryKey = 'ida';
    protected $fillable=['ida','idcuidador','fecha','hora'];

}

