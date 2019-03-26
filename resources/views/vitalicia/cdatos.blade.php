@extends('vitalicia.principal')
@section('encabezado')
<h1>Consulta de datos</h1>
@stop
@section('complete')

<div class="table-scroll">
<table class="hover">
<tr>
<th>ID</th><th>Nombre</th>
<th>Apellido Paterno</th><th>Apellido materno</th><th>Edad</th>
<th>Telefono</th><th>Calle</th><th>Numero</th><th>Calle1</th>
<th>Calle2</th><th>Colonia</th><th>Municipio</th><th>Ciudad</th>
<th>Cp</th><th>Referencia</th><th>Foto</th><th>Operaciones</th>

@foreach($datosd as $datt)
</tr>

<tr><td>{{$datt->idd}}</td>
<td>{{$datt->nombre}}</td>
<td>{{$datt->ap}}</td>
<td>{{$datt->am}}</td>
<td>{{$datt->edad}}</td>
<td>{{$datt->telefono}}</td>
<td>{{$datt->calle}}</td>
<td>{{$datt->numero}}</td>
<td>{{$datt->calle1}}</td>
<td>{{$datt->calle2}}</td>
<td>{{$datt->colonia}}</td>
<td>{{$datt->municipio}}</td>
<td>{{$datt->ciudad}}</td>
<td>{{$datt->cp}}</td>
<td>{{$datt->referencia}}</td>

<td><img src = "{{asset('archivos/'.$datt->archivo)}}" height =100 width=100></td>
<td>
@if($datt->deleted_at=="")
   <a href="{{URL::action('vitalicia@eliminam',['idd'=>$datt->idd])}}"> 
	Inhabilitar 
	</a> 
<a href="{{URL::action('vitalicia@modificadat',['idd'=>$datt->idd])}}">
    Modificar</a></td>
    @else
	 <a href="{{URL::action('vitalicia@restauram',['idd'=>$datt->idd])}}"> 
	Restaurar  
	</a> 
    <a href="{{URL::action('vitalicia@efisicam',['idd'=>$datt->idd])}}"> 
	Eliminar 
	</a> 

@endif

@endforeach
</tr>
</table>
</div>
@stop
