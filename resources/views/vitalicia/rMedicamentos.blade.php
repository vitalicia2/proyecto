@extends('vitalicia.principal')
@section('encabezado')
<h3>Nuevo Medicamento</h3>
@stop
@section('contenido')
        <form action="{{route('gume')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            <!--Clave--> 
                <input type="text" name='idmedicamento' value="{{$iddm}}" readonly= 'readonly' style='visibility:hidden'>
          
            Paciente
            <br>
                <select name = 'idu'>
                @foreach($usuarios as $usua)
                <option value ='{{$usua->idu}}'>{{$usua->usuario}}</option>
                @endforeach
                </select>
            
            Medicamento<select name = 'medicam'>
            @foreach($amedicamentos as $amed)
            <option value = '{{$amed->idamedicamento}}'>{{$amed->nmedica}}</option>
            @endforeach
                  </select>
                

            Indicación 
            @if($errors->first('indicacion')) 
            <br>{!! $errors->first('indicacion','<span class=error>:message</span>')!!}
            @endif  
                <input type="text" name="indicacion" value="{{old('indicacion')}}">
                
            Presentación
            @if($errors->first('presen')) 
            <br>{!! $errors->first('presen','<span class=error>:message</span>')!!}
            @endif
                <select name="presen">
                  <option value="Solida">Solida</option>
                  <option value="Polvos">Polvos</option>
                  <option value="Capsulas">Capsulas o Comprimidos</option>
                  <option value="Tabletas">Tabletas</option>
                  <option value="Pildoras">Pildoras</option>
                  <option value="Grageas">Grageas</option>
                  <option value="Supositorios">Supositorios</option>
                  <option value="Óvulos">Óvulos</option>
                  <option value="Pomada">Pomada</option>
                  <option value="Crema">Crema</option>
                  <option value="Líquida">Líquida</option>
                  <option value="Soluciones">Soluciones</option>
                  <option value="Jarabe">Jarabe</option>
                  <option value="Enemas">Enemas</option>
                </select>
                
            Terminotx
            @if($errors->first('terminotx')) 
            <br>{!! $errors->first('terminotx','<span class=error>:message</span>')!!}
            @endif
                <input type="text" name="terminotx" value="{{old('terminotx')}}">

            Horario<select name = 'idh'>
            @foreach($horarios as $hr)
            <option value = '{{$hr->idh}}'>{{$hr->tipohorario}}</option>
            @endforeach
                  </select>
<br>

            
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
