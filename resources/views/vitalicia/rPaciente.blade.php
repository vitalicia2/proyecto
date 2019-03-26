@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Registro de Nuevo Paciente</h2>
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
            M&eacute;todo de preferido 
                <select name="profesion">
                    <option selected>Seleccionar</option>
                    <option>Tarjeta</option>
                    <option>Paypal</option>
                    <option>Efectivo</option>
                </select>
            <br>
            Correo <input type="text" name="correo">
            <br>
            Tel&eacute;fono <input type="text" name="telefono">
            <br>
            <input type="submit" class="button" value="Guardar">
        </form>
@stop