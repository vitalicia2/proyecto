<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}

$sql = "SELECT id_emp,id_serv,id_enc,grado_estudios FROM encargado";
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
<html>
<header>
<title>Actualizacion de encargado</title>
</header>
<body>
<form action="modificar_enca.php" method="POST">
 <table>
    <tr><td><label >Id de encargado:</label></td><td><input type="text" name="idenc"></td></tr>
	<tr><td><label >Identificador de empleado:</label></td><td><input type="text" name="idemp"></td></tr>
	<tr><td><label >Identificador de servicio:</label></td><td><input type="text" name="idserv"></td></tr>
	<tr><td><label >Grado de estudios:</label></td><td><input type="text" name="grades"></td></tr>
	<tr><td><input type="submit" value="Modificar"></td></tr>
 </table>
</form>
</body>
</html>