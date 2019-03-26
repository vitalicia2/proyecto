<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Formulario de bajas</title>
</head>
<body>
<?php
// $con = mysql_connect("localhost","root","");
   // if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   // $database = mysql_select_db("netitsolutions",$con);
   // if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
// $consultasql = "DELETE from cliente where id=".$_POST['id']."";
// $resultadosql = mysql_query($consultasql)or die("¡No se ha podido eliminar el registro!");
// print "<h3 style='text-align:center;'>Registro eliminado</h3>";

$con = mysqli_connect("localhost","root","","u435473506_netit");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysqli_error());}

   $database = mysqli_select_db($con,"u435473506_netit");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error());} 
$resultadosql = mysqli_query($con,"DELETE from cliente where id=".$_POST['id']."")or die("¡No se ha podido eliminar el registro!");
print "<h3 style='text-align:center;'>Registro eliminado</h3>";
?>
</body>
</html>