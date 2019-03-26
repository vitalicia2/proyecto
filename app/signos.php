<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class signos extends Model
{
    use SoftDeletes;
    protected $primaryKey ='ids';
    protected $fillable = ['ids','ta','fc','fr','temp','spo2','glucosa','protesis','idturno'];
}
