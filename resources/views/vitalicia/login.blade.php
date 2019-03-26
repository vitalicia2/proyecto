@extends('vitalicia.principal2')
@section('encabezado')
<h2 class="subheader">Iniciar de sesi&oacute;n <small>Vitalicia</small></h2>
@stop
@section('contenido2')
        <form action="{{route('iniciasesion')}}" method = "POST" enctype="multipart/form-data"  >
            {{csrf_field()}}
             
            Nombre de usuario
            <br>{!! $errors->first('usuario','<span class=error>:message</span>')!!}
                <input type="text" name="usuario" value="{{old('usuario')}}">
                
            Contrase&ntilde;a 
            <br>{!! $errors->first('contrasena','<span class=error>:message</span>')!!}
                <input type="password" name="contrasena">

            <input type="submit" class="button" value="Iniciar Sesión">
        </form>

        @if (Session::has('error'))
            <div>
                    {{ Session::get('error') }}
            </div>
            <script>
                    alert("{{Session::get('error')}}");
            </script>
        @endif
@stop
@section('espacio')
<br>
<br>
<br>
<br>
<br><br><br>

@stop

