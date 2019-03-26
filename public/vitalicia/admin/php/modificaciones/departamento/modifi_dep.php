<?php
$con = mysqli_connect("localhost","root","","u435473506_netit");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysqli_error());}

   $database = mysqli_select_db($con,"u435473506_netit");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error());}
$result = mysqli_query($con,"UPDATE departamento SET nombre='".$_POST['nom']."' WHERE id_dep='".$_POST['id_dep']."'");
if (! $result){
   echo "La consulta SQL contiene errores.".mysqli_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }
?>