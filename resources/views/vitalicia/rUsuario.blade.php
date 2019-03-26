@extends('vitalicia.principal')
@section('encabezado')
<h2 class="subheader">Datos Generales de Usuarios </h2>
<br>
@stop
@section('form1')
        <form action="{{route('gusu')}}" method = "POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            
            Usuario
            <br>
                <select name = 'idu'>
                @foreach($usuarios as $usua)
                <option value ='{{$usua->idu}}'>{{$usua->usuario}}</option>
                @endforeach
                </select>

            Nombre
            <br>{!! $errors->first('nombre','<span class=error>:message</span>')!!}
                <input type="text" name="nombre" value="{{old('nombre')}}">
                
            Apellido Paterno 
            <br>{!! $errors->first('ap','<span class=error>:message</span>')!!}
                <input type="text" name="ap" value="{{old('ap')}}">
                
            Apellido Materno
            <br>{!! $errors->first('am','<span class=error>:message</span>')!!}
                <input type="text" name="am" value="{{old('am')}}">
                
            Edad 
            <br>{!! $errors->first('edad','<span class=error>:message</span>')!!}
                <input type="text" name="edad" value="{{old('edad')}}">

            Tel&eacute;fono
            <br>{!! $errors->first('telefono','<span class=error>:message</span>')!!}
                <input type="text" name="telefono" value="{{old('telefono')}}">
            
            <input type="text" name='idd' value="{{$idds}}" readonly= 'readonly' style='visibility:hidden'>
@stop
@section('form2')               
            Sexo 
            <br>
                <input type="radio" name="sexo" value="H" checked>Hombre
                <input type="radio" name="sexo" value="M">Mujer
            <br>
            <br>
            Calle 
            <br>{!! $errors->first('calle','<span class=error>:message</span>')!!}
                <input type="text" name="calle" value="{{old('calle')}}">
                 
            N&uacute;mero 
            <br>{!! $errors->first('numero','<span class=error>:message</span>')!!}
                <input type="text" name="numero" value="{{old('numero')}}">
                
            Entre calle 
            <br>{!! $errors->first('calle1','<span class=error>:message</span>')!!}
                <input type="text" name="calle1" value="{{old('calle1')}}">
                
            y calle 
            <br>{!! $errors->first('calle2','<span class=error>:message</span>')!!}
                <input type="text" name="calle2" value="{{old('calle2')}}">
                
            Colonia
            <br>{!! $errors->first('colonia','<span class=error>:message</span>')!!}
                <input type="text" name="colonia" value="{{old('colonia')}}">
@stop
@section('form3')                
            Municipio
            <br>{!! $errors->first('municipio','<span class=error>:message</span>')!!}
                <input type="text" name="municipio" value="{{old('municipio')}}">
                
            Ciudad
            <br>{!! $errors->first('ciudad','<span class=error>:message</span>')!!}
                <input type="text" name="ciudad" value="{{old('ciudad')}}">
                
            C&oacute;digo Postal 
            <br>{!! $errors->first('cp','<span class=error>:message</span>')!!}
                <input type="text" name="cp" value="{{old('cp')}}">
                
            Referencia 
            <br>{!! $errors->first('referencia','<span class=error>:message</span>')!!}
                <input type="text" name="referencia" value="{{old('referencia')}}">
                
            Adjuntar Foto <input type = 'file' value='guardar' name='archivo'>
            <input type="submit" class="button" value="Guardar">
        </form>
@stop