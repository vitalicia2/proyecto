
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

   <!-- <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>INVOICE </h1>
          <div class="date">Date of Invoice: </div>
        </div>
      </div>-->


        <table id="customers">

        <tr>


       <th>Folio</th> <th>Licenciado(a)</th> <th>Fecha</th> <th>Hora</th> <th>Paciente</th> <th>Edad</th>

        </tr>


        @foreach($resultado as $res)
        <tr>
       
        <td>{{$res->ida}}</td>
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






