<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
   protected $primaryKey = 'idcitas';  
   protected $fillable=['idcitas','fecha','hora','horaturno','persona','parentesco','appotro','apmotro','nombreotro','direotro','cpotro','cuidadotro','municipiootro','telotro','correootro','atencion','folio','trato','app','apm','nombrepaciente','direccion','ciudad','estado','cp','tlpaciente','sexo','fnacimiento','motivo'];
}

