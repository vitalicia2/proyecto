<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
$sql = "SELECT id,nom,ap,am,tel,dir,em FROM cliente";
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
<html>
<head>
</head>
<header>
<title>Modificacion Cliente</title>
</header>
<body>
<form action="modificar_cli.php" method="POST">
  <table >
    <tr><td><label >Id del cliente:</td><td><input type="text" name="nombre"></td></tr>
	<tr><td><label >Nombre:</label></td><td><input type="text" name="nom"></td></tr>
	<tr><td><label >Apellido Paterno:</label></td><td><input type="text" name="app" ></td></tr>
	<tr><td><label >Apellido Materno:</label></td><td><input type="text" name="apm"></td></tr>
	<tr><td><label >Telefono</label></td><td><input type="text" name="tel"></td></tr>
	<tr><td><label >Email</label></td><td><input type="text" name="em"></td></tr>
	<tr><td><label >Direccion</label></td><td><input type="text" name="ddir"></td></tr>
	<tr><td><input type="submit" value="Guardar"></td></tr>
	</table>
</form>
</body>
</html>
