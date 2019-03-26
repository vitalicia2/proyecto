@extends('vitalicia.principal')
@section('encabezado')
<div align="center"><h3>Nuevo Geriatrico</h3></div>
@stop
@section('contenido')
        <form action="{{route('guager')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave 
                <input type="text" name='idgeriatricos' value="{{$idger}}" readonly= 'readonly' >

                 Valorg

              @if($errors->first('nombre')) 
          <br>{!! $errors->first('nombre','<span class=error>:message</span>')!!}
          @endif  
         <input type="text" name="valorg" value="{{old('valorg')}}">


             Valorg1
            @if($errors->first('indicacion')) 
            <br>{!! $errors->first('indicacion','<span class=error>:message</span>')!!}
            @endif  
                <input type="text" name="valorg1" value="{{old('valorg1')}}">
                
            Valorg2
            @if($errors->first('presen')) 
            <br>{!! $errors->first('presen','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="valorg2" value="{{old('valorg2')}}">
                
        

                Gvalor<select name = 'gvalores'>
            @foreach($gvalores as $gv)
            <option value = '{{$gv->idvg}}'>{{$gv->tipogvalor}}</option>
            @endforeach
                  </select>
<br>

            
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
