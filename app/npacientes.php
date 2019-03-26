<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class npacientes extends Model
{
	use SoftDeletes;
    protected $primaryKey ='idnp';
    protected $fillable = ['idnp','actividad1','hora1','actividad2','hora2','actividad3','hora3','menu','consumo','observaciones','horacomida','tipocomida','tgeriatrico1','tgeriatrico2','tgeriatrico3','ta','fc','fr','temp','spo2','glucosa','protesis','cuidadornombre','fechacuidador','idu','idamedicamento','amindicacion','ampresen','deleted_at'];
    protected $date=['deleted_at'];

}

