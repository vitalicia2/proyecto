<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pacientes extends Model
{
    use SoftDeletes;
    protected $primaryKey ='idpaciente';
    protected $fillable = ['idpaciente','fechapaciente','pacientes','idd','idmedicamento','idalimentacion','ids','idgeriatricos','idactividades',];
    protected $date=['deleted_at'];
}
