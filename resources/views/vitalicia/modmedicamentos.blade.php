@extends('vitalicia.principal')
@section('encabezado')
<h3>Modifcar Medicamentos</h3>
@stop
@section('contenido')
        <form action="{{route('guardamodime')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            Clave 
                <input type="text" name='idamedicamento' value="{{$amedi->idamedicamento}}" readonly= 'readonly' >
            
            Nmedica
            <br>{!! $errors->first('nmedica','<span class=error>:message</span>')!!}
                <input type="text" name="nmedica" value="{{$amedi->nmedica}}">

                
           Mindicacion
            <br>{!! $errors->first('mindicacion','<span class=error>:message</span>')!!}
                <input type="text" name="mindicacion" value="{{$amedi->mindicacion}}">
                
           
            Presentacion<select name = 'mpresen'>
              <option value = '{{$idamedicamento}}'>{{$idame}}</option>
              
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

            


    

           
       
<br>

                
                <input type="submit" class="button" value="Guardar">
           
@stop
