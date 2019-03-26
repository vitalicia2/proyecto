<?php
$con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
$consultasql = "UPDATE departamento SET nombre='".$_POST['nom']."' WHERE id_dep='".$_POST['id_dep']."'";
$resultadosql = mysql_query($consultasql)or die("¡No se ha podido eliminar el registro!");
print "Se ha actualizado el registro exitosamente";
?>