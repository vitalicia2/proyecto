@extends('vitalicia.principal')

@section('complete')      
<h2 class="subheader">CONSULTAS <small>Vitalicia</small></h2>
<hr>

<ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
  @if(Session::get('sesiontipo')=="1" or "2")
    <li class="tabs-title is-active"><a href="#datos" aria-selected="true">Datos</a></li>
  @endif
  @if(Session::get('sesiontipo')=="1")
    <li class="tabs-title"><a href="#usuarios">Usuarios</a></li>
  @endif

  @if(Session::get('sesiontipo')=="1")
    <li class="tabs-title"><a href="#medicamentos">Medicamentos</a></li>
  @endif
  @if(Session::get('sesiontipo')=="1")
    <li class="tabs-title"><a href="#Npacientes">Pacientes</a></li>
  @endif
  
</ul>

<div class="tabs-content" data-tabs-content="collapsing-tabs">
    
  <!--Contenido de la Tab 1-->
  <div class="tabs-panel is-active" id="datos">
        <div class="table-scroll">
            <table class="hover">
            <tr>
                <th>ID</th><th>Nombre</th>
                <th>Apellido Paterno</th><th>Apellido materno</th><th>Edad</th>
                <th>Telefono</th><th>Calle</th><th>Numero</th><th>Calle1</th>
                <th>Calle2</th><th>Colonia</th><th>Municipio</th><th>Ciudad</th>
                <th>Cp</th><th>Referencia</th><th>Foto</th><th>Operaciones</th>
            </tr>
                @foreach($datosd as $datt)
                <tr>
                    <td>{{$datt->idd}}</td>
                    <td>{{$datt->nombre}}</td>
                    <td>{{$datt->ap}}</td>
                    <td>{{$datt->am}}</td>
                    <td>{{$datt->edad}}</td>
                    <td>{{$datt->telefono}}</td>
                    <td>{{$datt->calle}}</td>
                    <td>{{$datt->numero}}</td>
                    <td>{{$datt->calle1}}</td>
                    <td>{{$datt->calle2}}</td>
                    <td>{{$datt->colonia}}</td>
                    <td>{{$datt->municipio}}</td>
                    <td>{{$datt->ciudad}}</td>
                    <td>{{$datt->cp}}</td>
                    <td>{{$datt->referencia}}</td>
                    <td><img src = "{{asset('archivos/'.$datt->archivo)}}" height =100 width=100></td>
                    @if($datt->deleted_at=="")
                        <td>
                            <a href="{{URL::action('vitalicia@eliminam',['idd'=>$datt->idd])}}"> 
                            <button type="button" class="button small secondary">Inhabilitar</button></a>
                            <a href="{{URL::action('vitalicia@modificadat',['idd'=>$datt->idd])}}"><button type="button" class="button small success">Modificar</button></a>
                        </td>
                    @else
                        <td>
                            <a href="{{URL::action('vitalicia@restauram',['idd'=>$datt->idd])}}"><button type="button" class="button small primary">Restaurar</button></a> 
                            <a href="{{URL::action('vitalicia@efisicam',['idd'=>$datt->idd])}}"><button type="button" class="button small alert">Eliminar</button></a> 
                        </td>
                    @endif
                </tr>
            @endforeach
            </table>
        </div>
  </div>

  <!--Contenido de la Tab 2-->
  <div class="tabs-panel" id="usuarios">
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
  </div>

    
  <!--Contenido de la Tab 4-->
  <div class="tabs-panel" id="medicamentos">
  <div class="table-scroll">
        <table class="hover">
            <tr>
            <th>ID</th>
            <th>Medicamento</th>
            <th>Indicacion</th>
            <th>Presentación</th>
            </tr>
            @foreach($medicam as $med)
                <tr>
                    <td>{{$med->idamedicamento}}</td>
                    <td>{{$med->nmedica}}</td>
                    <td>{{$med->mindicacion}}</td>
                    <td>{{$med->mpresen}}</td>
                    @if($med->deleted_at=="")
                            <td>
                            <a href="{{URL::action('vitalicia@modime',['idamedicamento'=>$med->idamedicamento])}}"> 
                                        <button type="button" class="button small success">Modificar</button>
                                </a>
                                <a href="{{URL::action('vitalicia@eliminamedi',['idamedicamento'=>$med->idamedicamento])}}"> 
                                   <button type="button" class="button small secondary">Inhabilitar</button> 
                                </a>
                            </td>
                    @else
                            <td>
                             <a href="{{URL::action('vitalicia@restauramedi',['idamedicamento'=>$med->idamedicamento])}}"> 
                                 <button type="button" class="button small primary">Restaurar</button>  
                            </a> 
                            <a href="{{URL::action('vitalicia@efisicamedi',['idamedicamento'=>$med->idamedicamento])}}"> 
                                <button type="button" class="button small alert">Eliminar</button> 
                            </a> 
                            </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    </div>

<!--Contenido de la Tab 5-->
<div class="tabs-panel" id="Npacientes">
  <div class="table-scroll">
        <table class="hover">
            <tr>
            <th>Clave</th>
            <th>Paciente</th>
          <th>Actividad 1</th>
            <th>Hora</th>
            <th>Actividad 2</th>
            <th>Hora2</th>
            <th>Actividad 3</th>
              <th>Hora3</th>
            <th>Men&uacute;</th>
            <th>Consumo</th>
            <th>Observaciones</th>
            <th>Hora de la comida</th>
            <th>Tipo de comida</th>  
            <th>Geri&aacute;trico 1</th>
            <th>Geri&aacute;trico 2</th>
            <th>Geri&aacute;trico 3</th>
            <th>TA</th>
            <th>FC</th>
            <th>FR</th>
            <th>Temperatura</th>
            <th>SPO2</th>
            <th>Glucosa</th>
            <th>Protesis</th>
            <th>Cuidador</th>
           <th>Fecha de Registro</th>
            <th>Medicamento</th>
           <th>Indicaci&oacute;n</th>
            <th>Presentaci&oacute;n</th>
            <th>Operaciones</th>
            </tr>
            @foreach($npacientes as $nm)
                <tr>
                    <td>{{$nm->idnp}}</td>
                    <td>{{$nm->paciente}}</td>
                    <td>{{$nm->actividad1}}</td>
                    <td>{{$nm->hora1}}</td>
                    <td>{{$nm->actividad2}}</td>
                    <td>{{$nm->hora2}}</td>
                    <td>{{$nm->actividad3}}</td>
                    <td>{{$nm->hora3}}</td>
                    <td>{{$nm->menu}}</td>
                    <td>{{$nm->consumo}}</td>
                    <td>{{$nm->observaciones}}</td>
                    <td>{{$nm->horacomida}}</td>
                    <td>{{$nm->tipocomida}}</td>
                    <td>{{$nm->tgeriatrico1}}</td>
                    <td>{{$nm->tgeriatrico2}}</td>
                    <td>{{$nm->tgeriatrico3}}</td>
                    <td>{{$nm->ta}}</td>
                    <td>{{$nm->fc}}</td>
                    <td>{{$nm->fr}}</td>
                    <td>{{$nm->temp}}</td>
                    <td>{{$nm->spo2}}</td>
                    <td>{{$nm->glucosa}}</td>
                    <td>{{$nm->protesis}}</td>
                    <td>{{$nm->cuidadornombre}}</td>
                    <td>{{$nm->fechacuidador}}</td>
                    <td>{{$nm->nmedica}}</td>
                    <td>{{$nm->amindicacion}}</td>
                    <td>{{$nm->ampresen}}</td>
                   
                    @if($nm->deleted_at=="")
                                <td>
                                    
                                <a href="{{URL::action('vitalicia@modifinpacientes',['idnp'=>$nm->idnp])}}">
                                        <button type="button" class="button small success">Modificar</button></a>

                                <a href="{{URL::action('vitalicia@efisicapasi',['idnp'=>$nm->idnp])}}"> 
                                <button type="button" class="button small secondary">Inhabilitar</button> 
                               </a>

                                       
                                
                                </td>
                        @else
                                <td> 

                                <a href="{{URL::action('vitalicia@restapaci',['idnp'=>$nm->idnp])}}"> 
                                 <button type="button" class="button small primary">Restaurar</button>  
                            </a>  
                                    <a href="{{URL::action('vitalicia@eliminpaci',['idnp'=>$nm->idnp])}}"> 
                                        <button type="button" class="button small alert">Eliminar</button> 
                                    </a> 
                                </td>
                        @endif
                </tr>
            @endforeach
        </table>
    </div>
    </div>

   

                    
@stop    
    
