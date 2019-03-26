@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Modificar el seguimineto de Pacientes</h2>
<br>
@stop
@section('form1')
        <form action="{{route('guardamodifinpacientes')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            
          
<!--Clave--><input type = 'text' name = 'idnp' value="{{$mnpacientes->idnp}}" readonly ='readonly' style='visibility:hidden'>


        Paciente<select name = 'idu'>
        <option value = '{{$idu}}'>{{$otrousario}}</option>
        @foreach($ursu as $otu)
        <option value = '{{$otu->idu}}'>{{$otu->usuario}}</option>
      @endforeach
      </select>

      

Actividad1
<br>{!! $errors->first('actividad1','<span class=error>:message</span>')!!}
<input type = 'text' name = 'actividad1' value="{{$mnpacientes->actividad1}}">

Hora1
<br>{!! $errors->first('hora1','<span class=error>:message</span>')!!}
<input type = 'time' name = 'hora1' value="{{$mnpacientes->hora1}}">

Actividad2
<br>{!! $errors->first('actividad1','<span class=error>:message</span>')!!}
<input type = 'text' name = 'actividad2' value="{{$mnpacientes->actividad2}}">

Hora2
<br>{!! $errors->first('hora2','<span class=error>:message</span>')!!}
<input type = 'time' name = 'hora2' value="{{$mnpacientes->hora2}}">

Actividad3
<br>{!! $errors->first('actividad3','<span class=error>:message</span>')!!}
<input type = 'text' name = 'actividad3' value="{{$mnpacientes->actividad3}}">

Hora3
<br>{!! $errors->first('hora3','<span class=error>:message</span>')!!}
<input type = 'time' name = 'hora3' value="{{$mnpacientes->hora3}}">

Menu
<br>{!! $errors->first('menu','<span class=error>:message</span>')!!}
<input type = 'text' name = 'menu' value="{{$mnpacientes->menu}}">

Consumo
<br>{!! $errors->first('consumo','<span class=error>:message</span>')!!}
<input type = 'text' name = 'consumo' value="{{$mnpacientes->consumo}}">

@stop
@section('form2')

Observaciones
<br>{!! $errors->first('consumo','<span class=error>:message</span>')!!}
<input type = 'text' name = 'observaciones' value="{{$mnpacientes->observaciones}}">

Hora de Comida
<br>{!! $errors->first('horacomida','<span class=error>:message</span>')!!}
<input type = 'time' name = 'horacomida' value="{{$mnpacientes->horacomida}}">

Tipo de Comida
<br>{!! $errors->first('tipocomida','<span class=error>:message</span>')!!}
<input type = 'text' name = 'tipocomida' value="{{$mnpacientes->tipocomida}}">

Geriatrico 1
<br>{!! $errors->first('tgeriatrico1','<span class=error>:message</span>')!!}
<input type = 'text' name = 'tgeriatrico1' value="{{$mnpacientes->tgeriatrico1}}">

Geriatrico 2
<br>{!! $errors->first('tgeriatrico2','<span class=error>:message</span>')!!}
<input type = 'text' name = 'tgeriatrico2' value="{{$mnpacientes->tgeriatrico2}}">

Geriatrico 3
<br>{!! $errors->first('tgeriatrico3','<span class=error>:message</span>')!!}
<input type = 'text' name = 'tgeriatrico3' value="{{$mnpacientes->tgeriatrico3}}">

TA
<br>{!! $errors->first('ta','<span class=error>:message</span>')!!}
<input type = 'text' name = 'ta' value="{{$mnpacientes->ta}}">

FC
<br>{!! $errors->first('fc','<span class=error>:message</span>')!!}
<input type = 'text' name = 'fc' value="{{$mnpacientes->fc}}">

FR
<br>{!! $errors->first('fr','<span class=error>:message</span>')!!}
<input type = 'text' name = 'fr' value="{{$mnpacientes->fr}}">

Temp
<br>{!! $errors->first('temp','<span class=error>:message</span>')!!}
<input type = 'text' name = 'temp' value="{{$mnpacientes->temp}}">

@stop

@section('form3')

Spo2
<br>{!! $errors->first('spo2','<span class=error>:message</span>')!!}
<input type = 'text' name = 'spo2' value="{{$mnpacientes->spo2}}">

Glucosa
<br>{!! $errors->first('glucosa','<span class=error>:message</span>')!!}
<input type = 'text' name = 'glucosa' value="{{$mnpacientes->glucosa}}">

Protesis
<br>{!! $errors->first('protesis','<span class=error>:message</span>')!!}
<input type = 'text' name = 'protesis' value="{{$mnpacientes->protesis}}">

Cuidador
<br>{!! $errors->first('cuidadornombre','<span class=error>:message</span>')!!}
<input type = 'text' name = 'cuidadornombre' value="{{$mnpacientes->cuidadornombre}}">

Fecha Cuidador
<br>{!! $errors->first('fechacuidador','<span class=error>:message</span>')!!}
<input type = 'date' name = 'fechacuidador' value="{{$mnpacientes->fechacuidador}}">




Medicamento<select name = 'idamedicamento'>
        <option value = '{{$idamedicamento}}'>{{$medi}}</option>
        @foreach($otromedic as $otme)
        <option value = '{{$otme->idamedicamento}}'>{{$otme->nmedica}}</option>
      @endforeach
</select>

      Indicacion
      <br>{!! $errors->first('amindicacion','<span class=error>:message</span>')!!}
      <input type = 'text' name = 'amindicacion' value="{{$mnpacientes->amindicacion}}">


      Presentacion
      <br>{!! $errors->first('ampresen','<span class=error>:message</span>')!!}
      <input type = 'text' name = 'ampresen' value="{{$mnpacientes->ampresen}}">

        <input type="submit" class="button" value="Guardar">
        <input type="reset" class="button alert" value="Borrar">
        </form>
@stop