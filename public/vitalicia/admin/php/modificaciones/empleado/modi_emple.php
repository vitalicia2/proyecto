<?php
$con = mysqli_connect("localhost","root","","u435473506_netit");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysqli_error());}

   $database = mysqli_select_db($con,"u435473506_netit");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error());}
   
   $result = mysqli_query ($con,"UPDATE empleados SET nombre='".$_POST['nom']."', localidad='".$_POST['loca']."', telefono='".$_POST['tel']."'  WHERE id_emp='".$_POST['idemp']."'");
   if (! $result){
   echo "La consulta SQL contiene errores.".mysqli_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }

// $con = mysql_connect("localhost","root","");
   // if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}
   // $database = mysql_select_db("netitsolutions",$con);
   // if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
   // $sql ="UPDATE empleados SET nombre='".$_POST['nom']."', localidad='".$_POST['loca']."', telefono='".$_POST['tel']."'  WHERE id_emp='".$_POST['idemp']."'";
   // $result = mysql_query ($sql);
   // if (! $result){
   // echo "La consulta SQL contiene errores.".mysql_error();
   // exit();
// }else {
	// print ("La modificacion fue exitosa");
   // }
?>