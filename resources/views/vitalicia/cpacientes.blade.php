@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Consulta de Pacientes</h2>
<br>
@stop
@section('complete')
{{csrf_field()}}


<div class="table-scroll">
<table class="hover">
<tr>
<th>ID</th>
<th>Fecha Pacientes</th>
<th>Datos</th>
<th>Medicamentos</th>
<th>Alimentacion</th>
<th>Signos</th>
<th>Geriatricos</th>
<th>Actividades</th>

@foreach($pacientesd as $patt)
</tr>

<tr>
<td>{{$patt->idpaciente}}</td>
<td>{{$patt->fechapaciente}}</td>
<td>{{$patt->nombre}}</td>
<td>{{$patt->medicamento}}</td>
<td>{{$patt->alimentacion}}</td>
<td>{{$patt->signos}}</td>
<td>{{$patt->valorg}}</td>
<td>{{$patt->act1}}</td>

@endforeach
</tr>
</table>
</div>
@stop