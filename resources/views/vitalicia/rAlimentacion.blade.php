@extends('vitalicia.principal')
@section('encabezado')
<div align="center"><h3>Nuevo Menu</h3></div>
@stop
@section('contenido')
        <form action="{{route('guali')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave 
                <input type="text" name='idalimentacion' value="{{$idal}}" readonly= 'readonly' >
          

        
 
            
                
                    <div>

            @if($errors->first('nombre')) 
               <br>{!! $errors->first('nombre','<span class=error>:message</span>')!!}
          @endif 
        <label for="party-time"> Hora:</label>
        <input type="datetime-local" id="party-time"
               name="hora" value="2018-10-24T00:00"
               min="2018-06-07T00:00" max="2020-06-14T00:00" />
    </div>


            Menu
            @if($errors->first('indicacion')) 
            <br>{!! $errors->first('indicacion','<span class=error>:message</span>')!!}
            @endif  
                <input type="text" name="menu" value="{{old('menu')}}">
                
            Consumo
            @if($errors->first('presen')) 
            <br>{!! $errors->first('presen','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="consumo" value="{{old('consumo')}}">
                
            Observaciones
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="observaciones" value="{{old('observaciones')}}">

                Tipo de Alimento<select name = 'idalimentos'>
            @foreach($alimentos as $al)
            <option value = '{{$al->idalimentos}}'>{{$al->tipoalimento}}</option>
            @endforeach
                  </select>
<br>

            
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
