<!DOCTYPE html>
<html>
<head>
</head>
<header>
<title>Modificacion Servicio</title>
</header>
<body>
<form action="modificar_serv.php" method="POST">
 <table>
    <tr><td><label >Id servicio:</label></td><td><input type="text" name="idserv"></td></tr>
	<tr><td><label >Nombre del servicio:</label></td><td><input type="text" name="nser"></td></tr>
	<tr><td><label >Identificador:</label></td><td><input type="text" name="iden"></td></tr>
	<tr><td><label >Identificador del departamento:</label></td><td><input type="text" name="iddep"></td></tr>
	<tr><td><label >Identificador del encargado:</label></td><td><input type="text" name="idenc"></td></tr>
	<tr><td><input type="submit" value="Actualizar"></td></tr>
 </table>
</form>
    
<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}


$sql = "SELECT id_serv,nombre,id,id_dep,id_enc FROM servicios";
$result = mysql_query ($sql);

if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id servicio</td><td>Nombre del servicio</td><td>Identificador</td><td>Identificador de departamento</td>
         <td>Identificador del encargado</td></tr>";

    while ($imprime = mysql_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				echo "<td>".$imprime[2]."</td>";
				echo "<td>".$imprime[3]."</td>";
				echo "<td>".$imprime[4]."</td>";
				echo "<tr></tr>";
   }
   
   echo "</tr></table>";
 }
?> 
</body>
</html>