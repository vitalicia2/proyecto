<?php
   $con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}


$sql = "SELECT id_dep,nombre FROM departamento";
$result = mysql_query ($sql);

if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id departamento</td><td>Nombre</td>
         </tr><tr>";

    while ($imprime = mysql_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				
				echo "<tr></tr>";
   }
   
   echo "</tr></table>";
 }
?> 
<html>
<head>
</head>
<header>
<title>Modificacion Departamento</title>
</header>
<body>
<form action="modifi_dep.php" method="POST">
 <table >
    <tr><td><label >Id del departamento:</td><td><input type="text" name="id_dep"></td></tr>
	<tr><td><label >Nombre del departamento:</label></td><td><input type="text" name="nom"></td></tr>
	<tr><td><input type="submit" value="Modificar"></td></tr>
 </table>
</form>
</body>
</html>