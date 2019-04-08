
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vitalicia | Reporte</title>

</head>

<style>
  #header h3 { display:inline; }
</style>

<style>
  #header h1 { display:inline; }
</style>

<style>
div.round1 {
  width: 510px;
  padding: 10px;
  border: 5px solid gray;
  margin: 70;
}
</style>


 
  <body>
    @foreach($resultado as $res)

   <div align="right">    <b>Folio: {{$res->ida}} </b> </div>

  <h5> <img src="http://www.vitalicia.com.mx/vitalicia.jpg" width="240" height="100" alt="Vitalicia">
  <font color="#5B696A">Aviso de privacidad / Copyright / © Derechos reservados  2019 | Vitalicia.</font></h5>

<div id="header" >
<font color="#A569BD"><h1>Datos Generales del Paciente </font> </h1><font color="#E8BFF0"><h3> Vitalicia</h3> </font>    
</div>

<div align="right">
        <label> {{$date}}</label><hr>
  </div>
     

      <div  class="round1">

      <div id="header" >

      <h3><font color="#A569BD"> Paciente:</font></h3> <label> {{$res->paciente}} </label>

      </div>
      <br>

      <div id="header">

      <h3><font color="#A569BD"> Edad:</font></h3> <label>  {{$res->edad}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Sexo:</font></h3> <label>  {{$res->sexo}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Talla:</font></h3> <label>  {{$res->talla}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Peso:</font></h3> <label>  {{$res->peso}} </label>

      </div>
      <br>

      <div id="header">

      <h3><font color="#A569BD"> Tensión Arterial:</font></h3> <label>  {{$res->ta}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Frecuencia Cardíaca:</font></h3> <label>  {{$res->fc}} </label>

      <br> <br>

      <h3><font color="#A569BD"> Frecuencia Respiratoria:</font></h3> <label>  {{$res->fr}} </label>

      </div>
      <br>

      <div id="header">

      <h3><font color="#A569BD"> Grupo Sanguineo:</font></h3> <label>  {{$res->gruposanguineo}} </label>

      &nbsp;&nbsp;

      <h3><font color="#A569BD"> Agudeza Visual:</font></h3> <label>  {{$res->agudezavisual}} </label>

      </div>
      <br>

      <div id="header">

      <h3><font color="#A569BD"> Alergia:</font></h3> <label>  {{$res->alergia}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; 
      &nbsp;&nbsp;&nbsp;&nbsp; 

      <h3><font color="#A569BD">Tipo de Alergia:</font></h3> <label>  {{$res->tipalergia}} </label>

      <br> <br>

      <h3><font color="#A569BD"> Observaciones:</font></h3> <label>  {{$res->observaciones}} </label> 
      
      </div>
      <br>

      <div id="header" >

      <h3><font color="#A569BD"> Atendio:</font></h3> <label>  {{$res->licenciada}} </label>
      <hr align="center"   height="1" width="30%" noshade="noshade" />

      @endforeach

      <div align="center">

      <h3><font color="#A569BD">Firma</font></h3>

      </div>

      </div>
      
      </div>

      <div align="center">

      <h5><font color="#5B696A">Dirección: Jos&eacute; Vicente Villada Pte. 614, San Francisco, San Mateo Atenco, CP 52104 Tel&eacute;fono: (729) 149 6992<</h5></font>
               
      <p>Copyright &reg; 2019 | Vitalicia</p> 

      </div>



   

      

 

   
      
          
                 
 

      
  </body>
</html>






