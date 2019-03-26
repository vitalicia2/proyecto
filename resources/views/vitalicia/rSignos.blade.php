@extends('vitalicia.principal')
@section('encabezado')
<div align="center"><h3>Nuevos Signos</h3></div>
@stop
@section('contenido')
        <form action="{{route('guasi')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave 
                <input type="text" name='ids' value="{{$idsi}}" readonly= 'readonly' >


            Ta 
            @if($errors->first('indicacion')) 
            <br>{!! $errors->first('indicacion','<span class=error>:message</span>')!!}
            @endif  
                <input type="text" name="ta" value="{{old('ta')}}">
                
            Fc
            @if($errors->first('presen')) 
            <br>{!! $errors->first('presen','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="fc" value="{{old('fc')}}">
                
            Fr
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="fr" value="{{old('fr')}}">
                             
            temp
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="temp" value="{{old('temp')}}">
                             
            Spo2
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="spo2" value="{{old('spo2')}}">

            Glucosa
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="glucosa" value="{{old('glucosa')}}">

            Protesis
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="protesis" value="{{old('protesis')}}">

            Turno<select name = 'idturno'>
            @foreach($turnos as $tur)
            <option value = '{{$tur->idturno}}'>{{$tur->tipoturno}}</option>
            @endforeach
                  </select>
<br>

            
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
