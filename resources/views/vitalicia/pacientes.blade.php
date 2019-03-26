@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Seguimiento de Pacientes</h2>
@stop
@section('contenido')

@stop

@section('complete')
<br>
<br>
<br>
<br>
<div align="center">
<a href="{{route('rusu')}}"><input class="button" value="Datos Generales"></a> 
<a href="{{route('rmed')}}"><input class="button" value="Medicamentos"></a> 
<a href="{{route('rali')}}"><input class="button" value="Alimentos"></a> 
<a href="{{route('rger')}}"><input class="button" value="Geriatricos"></a>
<a href="{{route('rcui')}}"><input class="button" value="Cuidador"></a>
<a href="{{route('rsig')}}"><input class="button" value="Signos"></a>
</div>


<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


@stop