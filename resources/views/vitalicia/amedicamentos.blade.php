@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Nuevo Medicamento <small>Vitalicia</small></h2>

@stop
@section('contenido')
        <form action="{{route('gamedi')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            <!--Clave--> 
                <input type="text" name='idamedicamento' value="{{$idamedica}}" readonly= 'readonly' style='visibility:hidden' >
            Nombre de Medicamento

            @if($errors->first('nmedica')) 
               <br>{!! $errors->first('nmedica','<span class=error>:message</span>')!!}
          @endif  
                <input type="text" name="nmedica" value="{{old('nmedica')}}">       

            Tipo de indicación 
            @if($errors->first('mindicacion')) 
            <br>{!! $errors->first('mindicacion','<span class=error>:message</span>')!!}
            @endif  
                <input type="text" name="mindicacion" value="{{old('mindicacion')}}">
            
            Presentación
            @if($errors->first('mpresen')) 
            <br>{!! $errors->first('mpresen','<span class=error>:message</span>')!!}
            @endif
                <select name="mpresen">
                  <option value="default"></option>
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
                
            <input type="submit" class="button" value="Guardar">
            </form>
@stop
