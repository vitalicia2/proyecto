
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #9661A5;
  color: white;
}
</style>
</head>

  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>Datos Generales del Paciente </h1>
        </div>
      </div>

        @foreach($resultado as $res)

        <p>   Folio:  {{$res->ida}} </p>


        <table id="customers">

        <tr>


        <th>Licenciado(a)</th> <th>Fecha</th> <th>Hora</th> <th>Paciente</th> <th>Edad</th>

        </tr>


       
        <tr>
       
        <td>{{$res->licenciada}}</td>
        <td>{{$res->fecha}}</td>
        <td>{{$res->hora}}</td>
        <td>{{$res->paciente}}</td>
        <td>{{$res->edad}}</td>
        
        </tr>
        @endforeach


</table>


      
  </body>
</html>






