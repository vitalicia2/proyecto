<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class geriatricos extends Model
{
    use SoftDeletes;
    protected $primarykey ='idgeriatricos';
    protected $fillable = ['idgeriatricos','valorg','valorg1','valorg2','idvg'];
    protected $date=['deleted_at'];
}
