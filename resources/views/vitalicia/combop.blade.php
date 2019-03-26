<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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

<table id="customers">

  <tr>


 <th>IDDD</th>   <th>Edad</th>     <th>Sexo</th>     <th>Talla</th>    <th>Peso</th> <th>Alergia</th> 


</tr>



<tr>
@foreach($resultado as $res)

<td>{{$res->iddd}}</td>
<td>{{$res->edad}}</td>
<td>{{$res->sexo}}</td>
<td>{{$res->talla}}</td>
<td>{{$res->peso}}</td>
<td>{{$res->tipalergia}}</td>


</tr>
@endforeach


</table>



</body>
</html>

