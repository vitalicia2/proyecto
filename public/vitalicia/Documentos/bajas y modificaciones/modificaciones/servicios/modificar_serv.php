<?php
$con = mysql_connect("localhost","root","");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}
   $database = mysql_select_db("netitsolutions",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
   $sql ="UPDATE servicios SET nombre='".$_POST['nser']."', id='".$_POST['iden']."', id_dep='".$_POST['iddep']."', id_enc='".$_POST['idenc']."' WHERE id_serv='".$_POST['idserv']."'";
   $result = mysql_query ($sql);
   if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
	print ("La modificacion fue exitosa");
   }
?>