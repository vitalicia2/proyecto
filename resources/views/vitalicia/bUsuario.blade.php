@extends('vitalicia.principal')
@section('encabezado')
<h3>Baja de un Usuario</h3>
@stop
@section('contenido')
        <form action = "#" method= 'POST'>
            {{csrf_field()}}
            Clave <input type="text" name="idc">
            <br>
            Nombre <input type="text" name="nombre">
            <br>
            Apellido Paterno <input type="text" name="ap">
            <br>
            Apellido Materno <input type="text" name="am">
            <br>
            Edad <input type="text" name="edad">
            <br>
            Sexo 
            <br><input type="radio" name="sexo" value="hombre">Hombre
                <input type="radio" name="sexo" value="mujer">Mujer
            <br>
            Estado Civil 
                <select name="estado">
                    <option selected>Seleccionar</option>
                    <option>Soltero</option>
                    <option>Divorciado</option>
                    <option>Viudo</option>
                    <option>Otro</option>
                </select>
            <br>
            Grado de Estudios 
                <select name="profesion">
                    <option selected>Seleccionar</option>
                    <option>Primaria</option>
                    <option>Secundaria</option>
                    <option>Bachillerato</option>
                    <option>Licenciatura</option>
                    <option>Ingenier&iacute;a</option>
                </select>
            <br>
            N&uacute;mero de Licencia <input type="text" name="licencia">
            <br>
            Correo <input type="text" name="correo">
            <br>
            Tel&eacute;fono <input type="text" name="telefono">
            <br>
            Adjuntar Foto <input type="file" name="adjunto">
            <input type="submit" class="button" value="Guardar">
        </form>
@stop