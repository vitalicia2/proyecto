  
 




  <table border= 1>


<tr><td>Clave</td> <td>Producto</td> <td>Precio</td> <td>Borrar</td> </Tr>


  @foreach($resultado as $res)


<tr><td>{{$res->idp}}</td><td>{{$res->producto}}</td><td>{{$res->precio}}</td>
<td><a class="button alert" style="width:80px; height:50px">Eliminar</a></td>
          
</table>
  

  @endforeach
 