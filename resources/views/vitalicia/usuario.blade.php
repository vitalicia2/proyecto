@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Nuevo Usuario</h2>
@stop
@section('contenido2')
        <form action="{{route('gusua')}}" method = "POST" enctype="multipart/form-data"  >
            {{csrf_field()}}
             
                <input type="text" name='idu' value="{{$idus}}" readonly= 'readonly' style='visibility:hidden'>
            Nombre de usuario
            <br>{!! $errors->first('usuario','<span class=error>:message</span>')!!}
                <input type="text" name="usuario" value="{{old('usuario')}}">
                
            Contrase&ntilde;a 
            <br>{!! $errors->first('contrasena','<span class=error>:message</span>')!!}
                <input type="password" name="contrasena">
                <p class="help-text" id="passwordHelpText">Tu contrase&ntilde;a debe contener como m&iacute;nimo 10 caracteres.</p>
            
            Correo Electr&oacute;nico
            <br>{!! $errors->first('correo','<span class=error>:message</span>')!!}
                <input type="text" name="correo" value="{{old('correo')}}">
                
            Tipo de usuario <select name = 'idt'>
                                    @foreach($tipos as $tp)
                                    <option value ='{{$tp->idt}}'>{{$tp->tipo}}</option>
                                    @endforeach
                                    </select>

            <input type="submit" class="button" value="Guardar">
        </form>
@stop
@section('espacio')
<br>

@stop

