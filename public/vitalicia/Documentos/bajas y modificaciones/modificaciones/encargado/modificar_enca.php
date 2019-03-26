<?php
$con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}
   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
   $sql ="UPDATE encargado SET id_emp='".$_POST['idemp']."', id_serv='".$_POST['idserv']."', grado_estudios='".$_POST['grades']."'  WHERE id_enc='".$_POST['idenc']."'";
   $result = mysql_query ($sql);
   if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }
?>