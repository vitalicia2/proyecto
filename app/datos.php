<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class datos extends Model
{
	use SoftDeletes;
    protected $primaryKey ='idd';
    protected $fillable = ['idd','idu','nombre','ap','am','edad','telefono','calle','numero','calle1','calle2','colonia','municipio','ciudad','cp','referencia','archivo'];
    protected $date=['deleted_at'];

}

