<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}


$sql = "SELECT p.nombre, p.id ,p.id_dep FROM servicios AS p WHERE(p.nombre LIKE '%".$_POST['nombre']."%')";
$result = mysql_query ($sql);

if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Nombre</td><td>Id</td><td>Id_departamento</td>
         </tr><tr>";

    while ($imprime = mysql_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				echo "<td>".$imprime[2]."</td>";
				echo "<tr></tr>";
   }
   
   echo "</tr></table>";
 }
?> 