<?php
$con = mysqli_connect("localhost","root","","u435473506_netit");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysqli_error());}

   $database = mysqli_select_db($con,"u435473506_netit");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error());} 
   $result = mysqli_query ($con,"UPDATE cliente SET nom='".$_POST['nom']."', ap='".$_POST['app']."', am='".$_POST['apm']."' ,tel='".$_POST['tel']."' ,dir='".$_POST['ddir']."',em='".$_POST['em']."' WHERE id='".$_POST['nombre']."'");
   if (! $result){
   echo "La consulta SQL contiene errores.".mysqli_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }
?>