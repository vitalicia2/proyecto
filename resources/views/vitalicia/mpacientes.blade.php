@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Modificar mis Pacientes</h2>
<br>
@stop
@section('form1')
        <form action="{{route('guardamodifimispa')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            
         
<!--Clave--><input type = 'text' name = 'idpaciente' value="{{$pacientesb->idpaciente}}" readonly ='readonly' style='visibility:hidden'>


Pacientes<input type="text" name="pacientes" value="{{$pacientesb->pacientes}}">

Fecha<input type="text" name="fechapaciente" value="{{$pacientesb->fechapaciente}}">

    

Actividad1 Hora1 &nbsp;&nbsp;&nbsp;Actividad2 &nbsp;&nbsp;&nbsp;Hora2<select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$otrod}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ahora1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$act2}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ahora2}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->act1}}&nbsp;&nbsp;&nbsp;{{$oc->hora1}}&nbsp;&nbsp;&nbsp;{{$oc->act2}}&nbsp;&nbsp;&nbsp;{{$oc->hora2}}</option>
	  @endforeach
      </select>
      
     <!-- Hora1 <select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$ahora1}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->hora1}}</option>
	  @endforeach
      </select>


      Actividad2 <select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$act2}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->act2}}</option>
	  @endforeach
      </select>

      Hora2 <select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$ahora2}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->hora2}}</option>
	  @endforeach
      </select>

       Actividad3 <select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$act3}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->act3}}</option>
	  @endforeach
      </select>


      Hora3 <select name = 'idactividades'>
      <option value = '{{$idactividades}}'>{{$ahora3}}</option>
	  @foreach($otrodato as $oc)
	   <option value = '{{$oc->idactividades}}'>{{$oc->hora3}}</option>
	  @endforeach
      </select>
-->
      @stop

      @section('form2')

      Menu <select name = 'idalimentacion'>
      <option value = '{{$idalimentacion}}'>{{$alim}}</option>
	  @foreach($otral as $ome)
	   <option value = '{{$ome->idalimentacion}}'>{{$ome->menu}}</option>
	  @endforeach
      </select>

      Consumo <select name = 'idalimentacion'>
      <option value = '{{$idalimentacion}}'>{{$cons}}</option>
	  @foreach($otral as $ome)
	   <option value = '{{$ome->idalimentacion}}'>{{$ome->consumo}}</option>
	  @endforeach
      </select>

      Observaciones <select name = 'idalimentacion'>
      <option value = '{{$idalimentacion}}'>{{$obsr}}</option>
	  @foreach($otral as $ome)
	   <option value = '{{$ome->idalimentacion}}'>{{$ome->Observaciones}}</option>
	  @endforeach
      </select>

        <input type="submit" class="button" value="Guardar">
        <input type="reset" class="button alert" value="Borrar">
        </form>
@stop