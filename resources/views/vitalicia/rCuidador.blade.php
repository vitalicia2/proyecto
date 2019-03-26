@extends('vitalicia.principal')
@section('encabezado')
<div align="center"><h3>Nuevo Cuidador</h3></div>
@stop
@section('contenido')
        <form action="{{route('guacui')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave 
                <input type="text" name='idcuidador' value="{{$idcu}}" readonly= 'readonly' >
          
                    <div>

            @if($errors->first('nombre')) 
               <br>{!! $errors->first('nombre','<span class=error>:message</span>')!!}
          @endif 
        <label for="party-time"> Hora entrada:</label>
        <input type="datetime-local" id="party-time"
               name="horaentrada" value="2018-10-24T00:00"
               min="2018-06-07T00:00" max="2020-06-14T00:00" />
    </div>

    <div>
    @if($errors->first('nombre')) 
               <br>{!! $errors->first('nombre','<span class=error>:message</span>')!!}
          @endif 
        <label for="party-time"> Hora Salida:</label>
        <input type="datetime-local" id="party-time"
               name="horasalida" value="2018-10-24T00:00"
               min="2018-06-07T00:00" max="2020-06-14T00:00" />
    </div>

                Idd<select name = 'idd'>
            @foreach($datoss as $das)
            <option value = '{{$das->idd}}'>{{$das->nombre}}</option>
            @endforeach
                  </select>
<br>

            
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
