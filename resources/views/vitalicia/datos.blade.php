
@extends('vitalicia.machote')
@section('encabezado')
<hr>
<h2 class="subheader">Datos Generales <small>Vitalicia</small></h2>


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
    // Ocultar los inputs antes de dar clic en en un cuidador

$('#idpapi').hide();
$('#idpa').hide();
$('#idpa1').hide();
$('#idpa2').hide();
$('#idpa3').hide();
$('#idpa4').hide();
$('#tipa').hide();
$('.obser').hide();
$('#capa').hide();
       
    
      
      // al dar click mostrar los primeros elementos a llenar

       $("#idc").click(function() {
       $('#idpapi').show(); 
       
      
       
       
      
       });

      //al teclear se haca una validacion y te muestra o no los siguientes campos

          $("#paciente").keyup(function() {  
          
        if ($("#paciente").val().match(/^[A-ZÀÈÌÒÙÁÉÍÓÚñÑÜ_\s]+$/))
        {
          $("#idpa").show(); 
          $("#va1").hide();    
        }
        else
        {
          $("#idpa").hide();
          $("#va1").show(); 
          $('#va1').html('<small style="color:red;">El campo debe ser solo "letras" </small>')      
        }
        if ($("#paciente").val() =="")
        {
          $("#idpa").hide(); 
          $("#va1").hide();
          $('#va3').hide();
          $('#va5').hide();      
        }
        

        });

       

       
       //al teclear mostrar los siguientes campos a llenar

       

      //al teclear mostrar los siguientes campos a llenar

      $("#peso").keyup(function() {
  
      $("#idpa1").show();
      $('#tipa').hide();
      $('.obser').hide(); 
      
       });

      //al teclear mostrar los siguientes campos a llenar

      $("#fr").keyup(function() {

      $('#idpa2').show();
      $('#idpa3').show();
  
       });

      //al teclear mostrar los siguientes campos a llenar

      $("#visual").keyup(function() {

      $('#idpa4').show();

      });

      

      //al teclear se haca una validacion y te muestra o no los siguientes campos

        $("#edad").keyup(function() {

        var va2;
            va2= parseInt($("#edad").val());
        
        if(va2 >14 && va2 <= 100 )
        {
          $('#sexo').prop("disabled",false);
          $('#talla').prop("disabled",false);
          $('#peso').prop("disabled",false);
          $('#va3').hide(); 
        }
        else
        {
          $('#sexo').prop("disabled",true);
          $('#talla').prop("disabled",true);
          $('#peso').prop("disabled",true);
          $('#va3').show();
          $('#va3').html('<small style="color:red;">El campo debe ser solo numeros! y el rango de "Edad" permitido </small>')         
        }
        
         
        });

      //al teclear se haca una validacion y te muestra o no los siguientes campos  

      $("#sexo").keyup(function() {

      var va3;
          va3= $("#sexo").val();

       
      if(  va3 == "" )
      {
        $('#talla').prop("disabled",true);
        $('#peso').prop("disabled",true);
        $('#va3').hide();
      }
      else
      {
        $('#talla').prop("disabled",true);
        $('#peso').prop("disabled",true);
        $('#va3').show();
        $('#va3').html('<small style="color:red;">El campo debe ser F "o" M solamente!</small>')
      } 
      if(va3 == "F" ||  va3 == "M" )
      {
        $('#talla').prop("disabled",false);
        $('#peso').prop("disabled",false);
        $('#va3').hide();  
      }
       
      });

      //al teclear se haca una validacion y te muestra o no los siguientes campos

      $("#talla").keyup(function() {  
          
          if ($("#talla").val().match(/^[0-3][.][0-9]{2}$/))
          {
            $('#peso').prop("disabled",false);
            $('#va3').hide();     
          }
          else
          {
            $('#peso').prop("disabled",true);
            $('#va3').show();
            $('#va3').html('<small style="color:red;">El valor debe de ser una "Estatura real" </small>')     
          }
          if ($("#talla").val() == "")
          {
            $('#peso').prop("disabled",true);
            $('#va3').hide();    
          }
          
      }); 

      //al teclear se haca una validacion y te muestra o no los siguientes campos

      $("#peso").keyup(function() {  
          
          if ($("#peso").val().match(/^[0-9]{2,3}$/))
          {
            
            $('#idpa1').show(); 
            $('#va3').hide();     
          }
          else
          {
            $('#idpa1').hide();
            $('#va3').show();  
            $('#va3').html('<small style="color:red;">El valor debe ser "Dos o Tres  cifras Maximo" </small>')     
          }
          if ($("#peso").val() =="")
          {
            
            $('#idpa1').hide(); 
            $('#va3').hide();     
          }
          
          
      });

      //al teclear se haca una validacion y te muestra o no los siguientes campos

      $("#visual").keyup(function() {  
          
          if ($("#visual").val().match(/^[A-ZÀÈÌÒÙÁÉÍÓÚñÑÜ_\s]+$/))
          {
            
            $('#idpa4').show(); 
            $('#va4').hide();     
          }
          else
          {
            $('#idpa4').hide();
            $('#va4').show();  
            $('#va4').html('<small style="color:red;">El campo solo acepta letras </small>')     
          }
          if ($("#visual").val() =="")
          {
            
            $('#idpa4').hide(); 
            $('#va4').hide();
                 
          }
          
          
      });

      



     //al selecionar uno se valida si selecionas si o np en el radio button y te muestra alergias u observaciones  
    
      $("input[name=alergia]").click(function () {
      switch ($('input:radio[name=alergia]:checked').val()) { 

      case 'Si': 
        
        $('#tipa').show();
        $('.obser').show();
        $('#ale').val("");
        $('#obs').val("");   
        
      //  $('#ob').remove();

      break;
      case 'No': 

       $('#tipa').hide();
       $('.obser').show();
       $('#obs').val(""); 
     //$('#al').remove();
      break;

          }
        });

        //al teclear se haca una validacion y te muestra o no los siguientes campos

        $("#ale").keyup(function() {  
          
          if ($("#ale").val() !="")
          {
            $('#va5').show();  
            $('#va5').html('<small style="color:red;">debes llenar todos los campos </small>')   
          }
          else
          {
            $('#agrega').prop("disabled",true);
            $('#va5').show();     
            $('#va5').html('<small style="color:red;">debes llenar todos los campos </small>')     
          }
          if ($("#obs").val() !="")
          {
            $('#va5').hide();
            $('#agrega').prop("disabled",false);  
              
          }
          if ($("#ale").val() =="")
          {
            $('#va5').show();
            $('#agrega').prop("disabled",true);
            $('#va5').html('<small style="color:red;">debes llenar todos los campos </small>')   
              
          }
          
          
          
          
      });


          //al teclear se haca una validacion y te muestra o no los siguientes campos

        $("#obs").keyup(function() {  
          
          if ($("#obs").val() !="")
          {
            $('#agrega').prop("disabled",false); 
            $('#va5').hide();  
          }
          else
          {
            $('#agrega').prop("disabled",true);
            $('#va5').show();   
            $('#va5').html('<small style="color:red;">debes llenar todos los campos </small>')     
          }
          
          
          
      });

        

     //al dar click se carga la funcion de guardar los datos y te muestra el boton pdf
    
        $("#agrega").click(function() {
        $("#guard").load('{{url('guardatosdel')}}' + '?' + $(this).closest('form').serialize());
     //   $("#capa").load('{{url('imprimir')}}');
         
        $('#capa').show("");

        
 
       });

       //al dar click al boton pdf se limpian los campos llenados anteriormente y s eincrementa un id

       $("#limpia").click(function() {

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
            $('#capa').hide("");
            $('#agrega').prop("disabled",true);

        
         
      

    });

  });

        
        
        
</script>
    
<form>
              
        
  <div class="grid-container">
  <div></div>
  <div>Hora 
          
          <input type = 'text' name = 'hora' id="hora" value="{{$time}}" readonly = 'readonly'>
  </div>
  
  <div> Fecha 
         
          <input type = 'date' name = 'fecha' id="fecha" value="{{$date}}" readonly = 'readonly'>
      
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
  <b>* Paciente: 
  <input type="text" style="text-transform:uppercase;" value=""  name='paciente' id='paciente' onkeyup="javascript:this.value=this.value.toUpperCase();">
  </b>
  </div>
  </div>
  
  <div id=va1>

  </div>
  
  <div id="idpa">
  <div class="grid-4">
  <div class="item1"></div>
  <div class="item2"><b>* Edad: <input type='text' name='edad' id='edad' ></b> </div>
  <div class="item3"><b>* Sexo: <input type='text' name='sexo' id='sexo' disabled></b> </div>  
  <div class="item4"><b>* Talla: <input type='text' name='talla' id='talla' disabled></b></div>
  <div class="item5"><b>* Peso: <input type='text' name='peso' id='peso' disabled></b> </div>
  <div class="item6"></div>
  
  </div>
  </div>

  <div id=va3>

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
  
  <input type="text" style="text-transform:uppercase;"  name="visual" id="visual" value="" onkeyup="javascript:this.value=this.value.toUpperCase();">  
          
  </div>  
  </div>

  <div id="va4">
  </div>  
    
  <div align="center">

  <div id="idpa4">          
  Alergia
  &nbsp;&nbsp;
  <input type="radio" name="alergia" value="Si" id="aler1" >Si
  &nbsp;&nbsp;&nbsp;&nbsp;    
  <input type="radio" name="alergia" value="No" id="aler2" >No
                        
   
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
  </div>   

  <div id="va5">
  </div> 
        
  
  <br>
      <button type="button" class="button"  name = "agrega" id="agrega" disabled>Guardar</button>
  <br>

  <div id="guard">

   </div>

  <div id="capa">

  <h5>Descargar Reporte: <a class="hollow button alert" href="{{ route('reporte') }}" id="limpia"><img src="../public/pdf.png" width="30" height="30" id="limpia" /></a></h5>

  
  </div>

	<br>

  </div>
           
</form>
@stop
       


      