<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class datosdetalles extends Model
{
   
    protected $primaryKey = 'iddd';
    protected $fillable=['iddd','ida','paciente','edad','sexo','talla','peso','ta','fc','fr','grupsan','aguvi','alergia','tipalergia','observaciones'];
  
}
