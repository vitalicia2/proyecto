<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Suma</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

   $('#countryList').on('click', 'li', function(){  
       $('#country_name').val($(this).text());  
       $('#countryList').fadeOut();
       });  

});
 
    
    $("#idc").click(function() {
         $("#idp").load('{{url('comboca')}}' + '?idc='  +this.options[this.selectedIndex].value) ;
       });
       
       
        $("#idp").click(function() {
       $("#detallep").load('{{url('detallep')}}' + '?idp=' + this.options[this.selectedIndex].value) ;
       });
       
       
        $("#cantidad").keyup(function() {
            var existencia;
            var cantidad;
            existencia = parseInt($("#existencia").val());
            cantidad = parseInt($("#cantidad").val());
            if (cantidad>existencia)
            {
           $("#valida").text('no se puede'); 
           $('#agrega').attr("disabled", true);
            $('#subt').val(0);
            
            }
            else
            {
           $("#valida").text('si se puede'); 
           $('#agrega').attr("disabled", false);
           $('#subt').val( $("#costo").val() * $("#cantidad").val());

            }
            
       
       });
        $("#agrega").click(function() {
		 $("#existencia").val($("#existencia").val()-$("#cantidad").val());	
         $("#carrito").load('{{url('carrito')}}' + '?' + $(this).closest('form').serialize()) ;
		
       });
       
       
        $("input[name=descuento]").click(function () {
        switch ($('input:radio[name=descuento]:checked').val()) { 
	    case '0': 
          $("#des").val(parseInt($("#subt").val())*0,3);
		break;
		case '10': 
          $("#des").val(trunc(parseInt($("#subt").val())*0.10,4));
		break;
	    case '30': 
          $("#des").val(trunc(parseInt($("#subt").val())*0.30,4));
		break;
          }
        });
        


    
      $("input[name=descuento]").click(function () {
        switch ($('input:radio[name=descuento]:checked').val()) { 
      case '0': 
          $("#subto").val($("#subt").val()-$("#des").val());
    break;
    case '10': 
          $("#subto").val($("#subt").val()-$("#des").val());
    break;
      case '30': 
         $("#subto").val($("#subt").val()-$("#des").val());
    break;
          }
        });
        



//$("#subto").mouseup(function() {
  //   $("#subto").val($("#subt").val()-$("#des").val()); 
         //   });
      

        
});
</script>

<form>


<div class="container box">
   <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3><br />
   
   <div class="form-group">
    <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
    <div id="countryList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>

Clave venta <input type = 'text' name = 'idv' id= 'idv' value = '{{$idv}}' readonly = 'readonly'>
<br>
Selecciona cliente<select name = 'idcl' id= 'idcl'> 
                  <option value = '1'>pablo</option>
                  <option value = '2'>Mariana</option>
                  <option value = '3'>Josue</option>
                  </select>
<br>
Fecha de venta<input type = 'date' name = 'fecha' id= 'fecha'>
<br>
Seleccione categoria<select name = 'idc' id= 'idc'>
		    
			@foreach($categorias as $cat)
			<option value = '{{$cat->idc}}'>{{$cat->nombre}}</option>
			@endforeach
			
		                  </select>
		<br>
<div id='combop'>
Seleccione Producto<select name = 'idp' id = 'idp'>
                    </select>
</div>

<div id='detallep'>

<br>
</div>
Cantidad a comprar <input type = 'text' name ='cantidad' id = 'cantidad'>
<br>
Descuento<input type = 'radio' value = '0' name = 'descuento' id = 'descuento1' checked>0%
         <input type = 'radio' value = '10' name = 'descuento' id = 'descuento2'>10%
         <input type = 'radio' value = '30' name = 'descuento' id = 'descuento3'>30%

<br>
<input type = 'hidden' name ='subt' id = 'subt'>




<input type = 'text' name ='des' id = 'des'>
<br>
<br>

Subtotal<input type = 'text' name ='subto' id = 'subto'>
<br>

<div id='valida'>
</div>





<br>
<button type="button" name = "agrega" id="agrega" disabled= 'false'>Agrega Carrito</button>
<br>
<br>
<div id='carrito'>
</div>


</form>

</body>
</html>




