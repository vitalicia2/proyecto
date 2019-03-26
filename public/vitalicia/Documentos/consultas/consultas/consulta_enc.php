<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}

$sql = "SELECT e.id_emp,e.id_serv,e.id_enc,e.grado_estudios FROM encargado AS e WHERE(e.grado_estudios LIKE '%".$_POST['nombre']."%' OR e.id_emp LIKE '%".$_POST['nombre']."%' OR e.id_serv LIKE '%".$_POST['nombre']."%')";
$result = mysql_query ($sql);
if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id empleado</td><td>Id Servicio</td><td>Id Encargado</td><td>Grado de Estudios</td>
         </tr><tr>";
    while ($imprime = mysql_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				echo "<td>".$imprime[2]."</td>";
				echo "<td>".$imprime[3]."</td>";
				echo "<tr></tr>";
   }
   echo "</tr></table>";
 }
?> 
