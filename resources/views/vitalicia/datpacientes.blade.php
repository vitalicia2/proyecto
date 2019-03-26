@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Seguimiento de Pacientes</h2>
<br>
@stop
@section('form1')
        <form action="{{route('gnpaci')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            
            <b>Paciente</b>
            <br>
                <select name = 'idu'>
                @foreach($pausu as $usup)
                <option value ='{{$usup->idu}}'>{{$usup->usuario}}</option>
                @endforeach
                </select>
            
            <b>Medicamento</b> <select name = 'medicam'>
                            @foreach($amedicamentos as $amed)
                            <option value = '{{$amed->idamedicamento}}'>{{$amed->nmedica}}</option>
                            @endforeach
                        </select>
            
            <b>Indicaci&oacute;n</b>
            @if($errors->first('amindicacion')) 
            <br>{!! $errors->first('amindicacion','<span class=error>:message</span>')!!}
            @endif
                <select name="amindicacion">
                  <option value="default">Elige una opci&oacute;n</option>
                  <option value="1 Dosis">1 Dosis</option>
                  <option value="2 Dosis">2 Dosis</option>
                  <option value="3 Dosis">3 Dosis</option>
                  <option value="Otra">Otra</option>
                </select>
            
            
                <b>Presentación</b>
            @if($errors->first('ampresen')) 
            <br>{!! $errors->first('ampresen','<span class=error>:message</span>')!!}
            @endif
                <select name="ampresen">
                  <option value="default">Elige una opci&oacute;n</option>
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
            
                <b>Actividad 1</b>
            <br>{!! $errors->first('actividad1','<span class=error>:message</span>')!!}
                <input type="text" name="actividad1" value="{{old('actividad1')}}">

                <b>Hora de la Actividad 1</b>
            <br>{!! $errors->first('hora1','<span class=error>:message</span>')!!}
                <input type="time" name="hora1" value="{{old('hora1')}}">

                <b>Actividad 2</b>
            <br>{!! $errors->first('actividad2','<span class=error>:message</span>')!!}
                <input type="text" name="actividad2" value="{{old('actividad2')}}">

                <b>Hora de la Actividad 2</b>
            <br>{!! $errors->first('hora2','<span class=error>:message</span>')!!}
                <input type="time" name="hora2" value="{{old('hora2')}}">

                <b>Actividad 3</b>
            <br>{!! $errors->first('actividad3','<span class=error>:message</span>')!!}
                <input type="text" name="actividad3" value="{{old('actividad3')}}">

                <b>Hora de la Actividad 3</b>
            <br>{!! $errors->first('hora3hora3','<span class=error>:message</span>')!!}
                <input type="time" name="hora3" value="{{old('hora3')}}">

            
                

            
            <input type="text" name='idnp' value="" readonly= 'readonly' style='visibility:hidden'>
@stop
@section('form2')               
                <b>Comida (Men&uacute;) </b>
            <br>{!! $errors->first('menu','<span class=error>:message</span>')!!}
                <input type="text" name="menu" value="{{old('menu')}}">
            
                <b>Consumo</b>
            <br>{!! $errors->first('consumo','<span class=error>:message</span>')!!}
                <input type="text" name="consumo" value="{{old('consumo')}}">
                
                <b>Observaciones</b> 
            <br>{!! $errors->first('observaciones','<span class=error>:message</span>')!!}
                <input type="text" name="observaciones" value="{{old('observaciones')}}">

                <b>Hora de Comida</b>
            <br>{!! $errors->first('horacomida','<span class=error>:message</span>')!!}
                <input type="time" name="horacomida" value="{{old('horacomida')}}">
            
                <b>Tipo de Comida</b> 
             
            <br>{!! $errors->first('tipocomida','<span class=error>:message</span>')!!}
           
                <select name="tipocomida">
                  <option value="default">Elige una opci&oacute;n</option>
                  <option value="Desayuno">Desayuno</option>
                  <option value="Almuerzo">Almuerzo</option>
                  <option value="Comida">Comida</option>
                </select>
                 
                <b>Geri&aacute;trico 1</b> 
            
            <br>{!! $errors->first('tgeriatrico1','<span class=error>:message</span>')!!}
           
                <select name="tgeriatrico1">
                  <option value="default">Elige una opci&oacute;n</option>
                  <option value="Miccion">Micci&oacute;n</option>
                  <option value="Evacuacion">Evacuaci&oacute;n</option>
                  <option value="Ninguna">Ninguna</option>
                </select>
                
                <b>Geri&aacute;trico 2</b> 
            
            <br>{!! $errors->first('tgeriatrico2','<span class=error>:message</span>')!!}
            
                <select name="tgeriatrico2">
                  <option value="default">Elige una opci&oacute;n</option>
                  <option value="Miccion">Micci&oacute;n</option>
                  <option value="Evacuacion">Evacuaci&oacute;n</option>
                  <option value="Ninguna">Ninguna</option>
                </select>
                
                <b>Geri&aacute;trico 3</b> 
           
            <br>{!! $errors->first('tgeriatrico3','<span class=error>:message</span>')!!}
            
                <select name="tgeriatrico3">
                  <option value="default">Elige una opci&oacute;n</option>
                  <option value="Miccion">Micci&oacute;n</option>
                  <option value="Evacuacion">Evacuaci&oacute;n</option>
                  <option value="Ninguna">Ninguna</option>
                </select>
                
                <b>ta</b>
            <br>{!! $errors->first('ta','<span class=error>:message</span>')!!}
                <input type="text" name="ta" value="{{old('ta')}}">
            
                <b>fc</b>
            <br>{!! $errors->first('fc','<span class=error>:message</span>')!!}
                <input type="text" name="fc" value="{{old('fc')}}">
@stop
@section('form3')                
                        
                <b>fr</b>
            <br>{!! $errors->first('fr','<span class=error>:message</span>')!!}
                <input type="text" name="fr" value="{{old('fr')}}">
                
                <b>Temp</b>
            <br>{!! $errors->first('temp','<span class=error>:message</span>')!!}
                <input type="text" name="temp" value="{{old('temp')}}">
                
                <b>Spo2</b> 
            <br>{!! $errors->first('spo2','<span class=error>:message</span>')!!}
                <input type="text" name="spo2" value="{{old('spo2')}}">
            
                <b>Glucosa</b>
            <br>{!! $errors->first('glucosa','<span class=error>:message</span>')!!}
                <input type="text" name="glucosa" value="{{old('glucosa')}}">

                <b>Pr&oacute;tesis</b>
            <br>{!! $errors->first('protesis','<span class=error>:message</span>')!!}
                <input type="text" name="protesis" value="{{old('protesis')}}">
                
                <b>Nombre del Cuidador</b>
            <br>{!! $errors->first('cuidadornombre','<span class=error>:message</span>')!!}
                <input type="text" name="cuidadornombre" value="{{old('cuidadornombre')}}">
                
                <b>Fecha de Registro </b>
            <br>{!! $errors->first('fechacuidador','<span class=error>:message</span>')!!}
                <input type="date" name="fechacuidador" value="{{old('fechacuidador')}}">

        <input type="submit" class="button" value="Guardar">
        <input type="reset" class="button alert" value="Borrar">
        </form>
@stop