
@extends('vitalicia.machote2')
@section('encabezado')
<hr>
<h2 class="subheader">Datos Generales <small>Vitalicia</small></h2>
<hr>
@stop
@section('contenido')

<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Consultas</title>
  <script src="{{asset('jquery/jquery-3.3.1.min.js')}}"></script>
  



  <style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans:700);


.texto-borde {
  -webkit-text-stroke: 1px black;
  color: transparent;
}
</style>

<style>
  #header h5 { display:inline; }
</style>

<style>
div.round1 {
  width: 250px;
  padding: 10px;
  border: 5px solid gray;
  margin: 70;
}
</style>

<style>
div.round2 {
  width: 1000px;
  padding: 10px;
  border: 5px solid gray;
  margin: 70;
}
</style>


<style>
div.round3 {
  width: 970px;
  padding: 10px;
  border: 2px solid gray;
  margin: 70;
}
</style>




</head>

<body>
<script type="text/javascript">
$(document).ready(function(){
 
    function trunc (x, posiciones = 0) {
  var s = x.toString()
  var l = s.length
  var decimalLength = s.indexOf('.') + 1
  var numStr = s.substr(0, decimalLength + posiciones)
  return Number(numStr)
}
      $("#car").click(function()
      { $("#cobrar").load('{{url('venta')}}'); }); 



         $("#idp").click(function() {
         $("#detalle").load('{{url('detallep')}}' + '?idp=' + this.options[this.selectedIndex].value) ;
		
      
       
       });

       $(document).ready(function(){

$('#country_name').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('autocomplete.fetch') }}",
         method:"get",
         data:{query:query, _token:_token},
         success:function(data){
          $('#countryList').fadeIn();  
                   $('#countryList').html(data);
         }
        });
       }
   });

   $('#countryList').on('click', function(){  
       $('#country_name').val($(this).text());  
       $('#countryList').hide();

   });  

});

    
    // Ocultar los inputs antes de dar clic en en un cuidador

$('#venta1').hide();
$('#venta2').hide();
$('#venta3').hide();
$('#venta4').hide();
$('#venta5').hide();
$('#venta6').hide();

       
    
      
      // al dar click mostrar los primeros elementos a llenar

       $("#derma").click(function() {
       $('#venta1').show(); 
             
       });

       $("#cerrar").click(function() {
       $('#venta1').hide(); 
             
       });

       $("#diges").click(function() {
       $('#venta2').show(); 
             
       });

       $("#cerrar2").click(function() {
       $('#venta2').hide(); 
             
       });

       $("#respi").click(function() {
       $('#venta3').show(); 
             
       });

       $("#cerrar3").click(function() {
       $('#venta3').hide(); 
             
       });

       $("#neuro").click(function() {
       $('#venta4').show(); 
             
       });

       $("#cerrar4").click(function() {
       $('#venta4').hide(); 
             
       });

       $("#nervi").click(function() {
       $('#venta5').show(); 
             
       });

       $("#cerrar5").click(function() {
       $('#venta5').hide(); 
             
       });

       $("#psi").click(function() {
       $('#venta6').show(); 
             
       });

       $("#cerrar6").click(function() {
       $('#venta6').hide(); 
             
       });

       var altura;
            altura= $("#talla").val();

       var peso;
            peso= parseInt($("#peso").val());


      var cuadrado;
          cuadrado = Math.pow(altura, 2);

      var indice;
          indice = (peso / cuadrado).toFixed(1);

      

      $("#masa").val(indice);




      });

    

              
       
        
        
        
</script>


              
        
  
            
<div align="center">
  
<input type="hidden" name="ida" id="ida" value='{{$datosdetal->ida}}'readonly = 'readonly'> 

<div id="header">

<h5>ヽ(•‿•)ノ {{$datosdetal->paciente}} </h5> 

&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

<small>{{$datosdetal->edad}} años &nbsp;&nbsp;&nbsp;&nbsp;

Genero " {{$datosdetal->sexo}} " &nbsp;&nbsp;&nbsp;&nbsp; </small>

&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

<h5>Registro inicial:</h5> <span class="texto-borde">{{$datosdetal->created_at}}</span>

</div>
</div>

<br>

@stop
@section('contenido2')

<ul class="tabs">

    <li class="tabs-title"><a href="#datos">Notas de Padecimientos</a></li>

    <li class="tabs-title"><a href="#fisico">Examen Fisico</a></li>

    <li class="tabs-title"><a href="#diagnos">Diagnostico</a></li>

    <li class="tabs-title"><a href="#trata">Tratamiento</a></li>

    <li class="tabs-title"><a href="#cargos">Cargos</a></li>
  
</ul>
<br>

@stop
@section('contenido3')

<a name="datos" id="datoss"></a>
<div class="grid-9">
<div class="item1"></div>

  <div class="item2">

	<div  class="round1">

<h5 align="center">Signos Vitales</h5>
<hr>

 <div align="center">
 
Altura: <input type="text" name="talla" id="talla"  value="{{$datosdetal->talla}}" style="width:70px; height:30px"> 

Peso: <input type="text" name="peso" id="peso" value="{{$datosdetal->peso}}" style="width:70px; height:30px">

<div id="mas">
IMC:
<input type="text" name="masa" id="masa" value="" style="width:70px; height:30px"> 

</div>

TA: <input type="text" name="ta" id="ta" value="{{$datosdetal->ta}}" style="width:70px; height:30px"> 

FC: <input type="text" name="fc" id="fc" value="{{$datosdetal->fc}}" style="width:70px; height:30px"> 

Glucosa: <input type="text" name="glucosa" id="glucosa" style="width:70px; height:30px"> 

Protesis: <input type="text" name="protesis" id="protesis" style="width:70px; height:30px"> 

<hr>

</div>
</div> 
	
	</div>

  <div class="item3">
	
	<div  class="round1">
	Razon de la visita:
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>

	<br>


<div  class="round1">
Sintomas:
<textarea name='sintomas'  id="sintomas" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
</div>

  </div> 

  <div class="item4"></div>
	<div class="item5"></div>
  <div class="item6"></div>
  
  </div>


<a name="fisico" id="fisico"></a>
<h5>Examen Fisico:</h5>

  <button class="hollow button" name="derma" id="derma">Dermatologico</button>
  <button class="hollow button" name="diges" id="diges">Digestivo</button>
  <button class="hollow button" name="respi" id="respi">Respiratorio</button>
  <button class="hollow button" name="neuro" id="neuro">Neurologico</button>
  <button class="hollow button" name="nervi" id="nervi">Nervioso</button>
  <button class="hollow button" name="psi"   id="psi">Psiquiatrico</button>


  

  

  
  

 



  <div class="grid-10">
  <div class="item1"></div>

  <div class="item2">

  <div id="venta1">
  <div  class="round1">
	Dermatologico:   <a id="cerrar" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>
  
  </div>


  <div class="item3">
  
  <div id="venta2">
  <div  class="round1">
	Disgestivo:   <a id="cerrar2" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>

  </div>

  <div class="item4">
  
  <div id="venta3">
  <div  class="round1">
	Respiratorio:   <a id="cerrar3" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>

  
  </div>

  <div class="item5"></div>
  <div class="item6"></div>
  
  </div>



  <div class="grid-11">
  <div class="item1"></div>

  <div class="item2">

  <div id="venta4">
  <div  class="round1">
	Neurologico:   <a id="cerrar4" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>
  
  </div>


  <div class="item3">
  
  <div id="venta5">
  <div  class="round1">
	Nervioso:   <a id="cerrar5" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>

  </div>

  <div class="item4">
  
  
  <div id="venta6">
  <div  class="round1">
	Psiquiatrico:   <a id="cerrar6" style="color:red;">(x)</a>
	<textarea name='razon'  id="razon" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>
	</div>
  </div>

  
  </div>
  
  <div class="item5"></div>
  <div class="item6"></div>
  
  </div>

  <br> <br> <br> <br>
  <a name="diagnos" id="diagnos"></a>
  <div  class="round2" align="center">

  <h5>Diagnostico: </h5>
  <hr>
  <textarea name='diagnostico'  id="diagnostico" rows='2' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>

  <hr>
  </div>

  <br> <br> <br> <br>


  <a name="trata" id="trata"></a>
  
  <br> <br> 

  
  <div  class="round2">
  <h5>Instucciones Medicas:</h5>
  <hr>

  <textarea name='instru'  id="instru" rows='4' cols='40'placeholder="Escribe aquí tus comentarios"></textarea>

  <hr>
 
  </div>


  <br> <br> <br> <br>

  <a name="cargos" id="cargos"></a>
  <div  class="round2">
  <h5>Cargos:</h5>
  <hr>
  <br />

  <div class="container box">

   <div class="form-group">

    <input type="submit" name = "car" id="car" >

     <div id="cobrar">

     </div>
       <hr>

        </div>
         </div>
          </div> 

  
@stop
      




 