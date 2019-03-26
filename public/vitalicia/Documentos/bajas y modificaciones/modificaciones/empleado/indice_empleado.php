<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}

$sql = "SELECT id_emp,nombre,localidad,telefono FROM empleados";
$result = mysql_query ($sql);
if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id empleado</td><td>Nombre</td><td>Localidad</td><td>Telefono</td>
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
<html>
<header>
<title>Actualizacion de empleado</title>
</header>
<body>
<form name="modifi_emple" method="post" action="modi_emple.php">
 <table>
    <tr><td><label >Id de empleado:</label></td><td><input type="text" name="idemp"></td></tr>
    <tr><td><label >Nombre:</label></td><td><input type="text" name="nom"></td></tr>
	<tr><td><label >Localidad:</label></td><td><input type="text" name="loca" ></td></tr>
	<tr><td><label >Telefono:</label></td><td><input type="text" name="tel">
	<tr><td><label ><input type="submit" value="Modificar"></td><td>
    </table>
</form>
</body>
</html>