
<!DOCTYPE html>
<html>
<head>

</head>
<style>
  #header h3 { display:inline; }
</style>


<style>
div.round1 {
  width: 500px;
  padding: 10px;
  border: 5px solid gray;
  margin: 0;
}
</style>
 
  <body>
    @foreach($resultado as $res)

   <div align="right">    <b>Folio: {{$res->ida}} </b> </div>

  <h5> <img src="vitalicia.jpg" width="240" height="100" alt="Vitalicia">
  Aviso de privacidad / Copyright / © Derechos reservados  2018 | Vitalicia.</h5>

<div align="center">
    <font color="#A569BD"><h1>Datos Generales del Paciente</h1></font>     
</div>

<div align="right">
        <label> {{$date}}</label><hr>
  </div>
<br>
      
      <div  class="round1">

      <div id="header" >

      <h3><font color="#A569BD"> PACIENTE:</font></h3> <label> {{$res->paciente}} </label>

      </div>
      <br>

      <div id="header">

      <h3><font color="#A569BD"> Edad:</font></h3> <label>  {{$res->edad}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Sexo:</font></h3> <label>  {{$res->sexo}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

      <h3><font color="#A569BD"> Talla:</font></h3> <label>  {{$res->talla}} </label>

      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

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

      &nbsp;

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
      </div>

 

        

        

 


        @endforeach




      
  </body>
</html>






