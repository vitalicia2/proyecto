@extends('vitalicia.principal')
@section('encabezado')
<h3>Modifcar Pacientes</h3>
@stop
@section('form1')
        <form action="{{route('guardamodificapac')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave
                <input type="text" name='idpaciente' value="{{$paci->idpaciente}}" readonly= 'readonly' >
            
            Fecha
            <br>{!! $errors->first('paci','<span class=error>:message</span>')!!}
                <input type="text" name="fechapaciente" value="{{$paci->fechapaciente}}">
                
            Nombre
            @foreach($otrodato as $dat)
            <br>{!! $errors->first('contrasena','<span class=error>:message</span>')!!}
                <input type="text" name="idd" value="{{$dat->idd}}">{{$dat->nombre}}
                @endforeach

            
                <input type="submit" class="button" value="Guardar">
           
@stop
