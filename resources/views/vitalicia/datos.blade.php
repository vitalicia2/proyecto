
@extends('vitalicia.machote')
@section('encabezado')
<hr>
<font color="D133FF"><h1>Datos Generales</h1></font>
<hr>
@stop
@section('contenido')
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Modulo DG</title>
  <script src="{{asset('jquery/jquery-3.3.1.min.js')}}"></script>



<body>

<?php

$hora=date("h:i:s");
$fecha=date("Y/n/j");

?>

<script type="text/javascript">
$(document).ready(function(){
 
    function trunc (x, posiciones = 0) {
  var s = x.toString()
  var l = s.length
  var decimalLength = s.indexOf('.') + 1
  var numStr = s.substr(0, decimalLength + posiciones)
  return Number(numStr)
}
    
$('#idpapi').hide();
$('#idpa').hide();
$('#idpa1').hide();
$('#idpa2').hide();
$('#idpa3').hide();
$('#idpa4').hide();
$('#tipa').hide();
$('.obser').hide();
       
    
      
      
       $("#idc").click(function() {
       $('#idpapi').show(); 
       
      
       
       
      
       });


       $("#paciente").keyup(function() {

       $("#idpa").show();

       });

      $("#peso").keyup(function() {
  
      $("#idpa1").show();
      $('#tipa').hide();
      $('.obser').hide(); 
      
       });

      $("#fr").keyup(function() {

      $('#idpa2').show();
      $('#idpa3').show();
  
       });

      $("#visual").keyup(function() {

      $('#idpa4').show();

      });

     

    
      $("input[name=alergia]").click(function () {
      switch ($('input:radio[name=alergia]:checked').val()) { 

      case 'Si': 
        
        $('#tipa').show();
        $('.obser').show();
      //  $('#ob').remove();

      break;
      case 'No': 

       $('#tipa').hide();
       $('.obser').show();
     //$('#al').remove();
      break;

          }
        });


        
        $("#agrega").click(function() {
        $("#guard").load('{{url('guardatosdel')}}' + '?' + $(this).closest('form').serialize());
        var id;
            id= parseInt($("#ida").val()); //
            $('#ida').val(id + 1);
            $("#visual").val("");
            $("#paciente").val("");
            $("#edad").val("");
            $("#sexo").val("");
            $("#peso").val("");
            $("#talla").val("");
            $("#ta").val("");
            $("#fc").val("");
            $("#fr").val("");
            $("#sang").val("");
            $('#ale').val("");
            $('#obs').val("");

            $('#idpapi').hide();
            $('#idpa').hide();
            $('#idpa1').hide();
            $('#idpa2').hide();
            $('#idpa3').hide();
            $('#idpa4').hide();
            $('#tipa').hide();
            $('.obser').hide();
 
       });
         
  

        
      });
        
        
        
</script>
    
<form>
              
        
  <div class="grid-container">
  <div></div>
  <div>Hora 
          <br>{!! $errors->first('','<span class=error>:message</span>')!!}
          <input type = 'time' name = 'hora' id="hora" value="{{$hora }}" readonly = 'readonly'>
  </div>

  <div> Fecha 
          <br>{!! $errors->first('','<span class=error>:message</span>')!!}
          <input type = 'text' name = 'fecha' id="fecha" value="{{$fecha}}" readonly = 'readonly'>
  </div>  
  </div>
            
            

  <div class="grid-2">
  <div></div>
  <div> Clave de datos
          <input type="text" name="ida" id="ida" value='{{$ida}}'readonly = 'readonly'> 
  </div>

  <div> Licenciado(a)
  <select name = 'idc' id= 'idc'> 
            @foreach($cuida as $cui)
            <option value = '{{$cui->idcuidador}}'>{{$cui->nombre}}</option>
            @endforeach
            </select>
          
  </div>  
  </div>   

  <div class="grid-3">
  <div></div>
  <div id="idpapi">
  <b>* Paciente: <input type='text' name='paciente' id='paciente' value='' ></b>
  </div>
  </div> 
  
  <div id="idpa">
  <div class="grid-4">
  <div class="item1"></div>
  <div class="item2"><b>* Edad: <input type='text' name='edad' id='edad'></b> </div>
  <div class="item3"><b>* Sexo: <input type='text' name='sexo' id='sexo'></b> </div>  
  <div class="item4"><b>* Talla: <input type='text' name='talla' id='talla'></b></div>
  <div class="item5"><b>* Peso: <input type='text' name='peso' id='peso'></b> </div>
  <div class="item6"></div>
  
  </div>
  </div>

  <div id="idpa1">
  <div class="grid-5">
  <div class="item1"></div>
  <div class="item2"><b>* TA: <input type='text' name='ta' id='ta'></b></div>
  <div class="item3"><b>* FC: <input type='text' name='fc' id='fc'></b></div>  
  <div class="item4"><b>* FR: <input type='text' name='fr' id='fr'></b></div>
  <div class="item5"></div>
  <div class="item6"></div>
  
  </div>
  </div>

  <div class="grid-6">
  <div></div>
  <div id="idpa2"> Grupo Sanguineo
              
              @if($errors->first('')) 
  
              <br>{!! $errors->first('','<span class=error>:message</span>')!!}
              @endif
                
                    <select name="sang" id="sang">
                    
                    <option value="default"></option>
                    <option value="A+">A+</option>
                    <option value="O+">O+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="A-">A-</option>
                    <option value="O-">O-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                   
                  </select>
  </div>

  <div id="idpa3">Agudez visual
      <br>{!! $errors->first('','<span class=error>:message</span>')!!}
      <input type="text" name="visual" id="visual" value="">  
          
  </div>  
  </div>
    
  <div align="center">

  <div id="idpa4">          
  Alergia
  &nbsp;&nbsp;
  <input type="radio" name="alergia" value="Si" id="aler1" >Si
  &nbsp;&nbsp;&nbsp;&nbsp;    
  <input type="radio" name="alergia" value="No" id="aler2" >No
  </div>                         
   
  <div class="grid-7">
  <div></div>
  <div id="tipa">
  <div id='al'><b>Tipo de Alergia:<input type= 'text' name='alerg' id="ale"></b></div>           
  </div>  
  </div>

  <div class="grid-8">
  <div></div>
  <div class="obser">
  <div id='ob'><b>Observaciones:<textarea name='comentarios'  id="obs" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea></b></div>          
  </div>  
  </div>  
        
  <br>
  <h3> Imprimir certificado  <input type=image src="../public/pdf.png" width="70" height="70"> </h3>
  
  <br>
      <button type="button" class="button"  name = "agrega" id="agrega" >Guardar</button>
  <br>
  </div>
            <div id="guard">

            </div>
</form>
@stop
       


      