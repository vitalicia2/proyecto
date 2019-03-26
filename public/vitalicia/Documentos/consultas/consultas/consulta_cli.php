<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}

$sql = "SELECT c.id,c.nom,c.ap,c.am,c.tel,c.dir,c.em FROM cliente AS c WHERE(c.id LIKE '%".$_POST['nombre']."%' OR c.nom LIKE '%".$_POST['nombre']."%' OR c.ap LIKE '%".$_POST['nombre']."%' OR c.am LIKE '%".$_POST['nombre']."%' OR c.tel LIKE '%".$_POST['nombre']."%' OR c.dir LIKE '%".$_POST['nombre']."%' OR c.em LIKE '%".$_POST['nombre']."%')";
$result = mysql_query ($sql);
if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id cliente</td><td>Nombre</td><td>Apellido paterno</td><td>Apellido materno</td><td>Telefono</td><td>Direccion</td><td>E-mail</td>
         </tr><tr>";
    while ($imprime = mysql_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				echo "<td>".$imprime[2]."</td>";
				echo "<td>".$imprime[3]."</td>";
				echo "<td>".$imprime[4]."</td>";
				echo "<td>".$imprime[5]."</td>";
				echo "<td>".$imprime[6]."</td>";
				echo "<tr></tr>";
   }
   echo "</tr></table>";
 }
?> 