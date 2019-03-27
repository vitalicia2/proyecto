<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datotes extends Model
{
    protected $primaryKey = 'iddd';
    protected $fillable=['iddd','ida','licenciada','fecha','hora','paciente','edad','sexo','talla',
    'peso','ta','fc','fr','gruposanguineo','agudezavisual','alergia','tipalergia','observaciones'];
  
}
