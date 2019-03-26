@extends('vitalicia.principal')
@section('encabezado')
<h1>Consulta de usuarios</h1>
@stop


@section('complete')

<table class="hover">

                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Tipo</th>
                    <th>Correo</th>
                    <th>Operaciones</th>
                </tr>
                @foreach($usuariosd as $usu)
                    <tr>
                        <td>{{$usu->idu}}</td>
                        <td>{{$usu->usuario}}</td>
                        <td>{{$usu->contrasena='********'}}</td>
                        <td>{{$usu->tip}}</td>
                        <td>{{$usu->correo}}</td>
                        @if($usu->deleted_at=="")
                                <td>
                                    <a href="{{URL::action('vitalicia@modificausua',['idu'=>$usu->idu])}}">
                                        <button type="button" class="button small success">Modificar</button>
                                    </a> 
                                    <a href="{{URL::action('vitalicia@eliminausu',['idu'=>$usu->idu])}}"> 
                                        <button type="button" class="button small secondary">Inhabilitar</button>
                                    </a>
                                </td>
                        @else
                                <td>    
                                    <a href="{{URL::action('vitalicia@restaurusu',['idu'=>$usu->idu])}}"> 
                                        <button type="button" class="button small primary">Restaurar</button> 
                                    </a> 
                                    <a href="{{URL::action('vitalicia@efisicausu',['idu'=>$usu->idu])}}"> 
                                        <button type="button" class="button small alert">Eliminar</button> 
                                    </a> 
                                </td>
                        @endif
                    </tr>           
                @endforeach
            </table>

<br><br><br><br><br><br>
@stop
