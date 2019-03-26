<?php
$con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}
   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
   $sql ="UPDATE cliente SET nom='".$_POST['nom']."', ap='".$_POST['app']."', am='".$_POST['apm']."' ,tel='".$_POST['tel']."' ,dir='".$_POST['ddir']."',em='".$_POST['em']."' WHERE id='".$_POST['nombre']."'";
   $result = mysql_query ($sql);
   if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }
?>