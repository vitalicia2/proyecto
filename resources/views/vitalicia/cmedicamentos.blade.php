@extends('vitalicia.principal')
@section('encabezado')
<h1>Consulta Pacientes</h1>
@stop
@section('complete')
{{csrf_field()}}


<div class="table-scroll">
<table class="hover">
<tr>
<th>ID</th>
<th>Medicamento</th>
<th>Indicacion</th>
<th>Presentación</th>
<th>Terminotx</th>
<th>Horario</th>
<th>Nmedica</th>


@foreach($medicamentosm as $medi)
</tr>

<tr>
<td>{{$medi->idpaciente}}</td>
<td>{{$medi->fechapaciente}}</td>
<td>{{$medi->nombre}}</td>
<td>{{$medi->medicamento}}</td>
<td>{{$medi->alimentacion}}</td>
<td>{{$medi->signos}}</td>
<td>{{$medi->valorg}}</td>


@endforeach
</tr>
</table>
</div>
@stop