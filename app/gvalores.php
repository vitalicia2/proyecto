<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gvalores extends Model
{
    use SoftDeletes;
    protected $primarykey ='idvg';
    protected $fillable = ['idvg','tipogvalor'];
    protected $date=['deleted_at'];
}
