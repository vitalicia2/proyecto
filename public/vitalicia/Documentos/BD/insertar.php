<html>
<body>
<p>Insercion de cliente en tabla empresa con id autoincrementable</p>
<p>Los datos han sido ingresados exitosamente</p>
<!--form>
<img src="gracias.jpg">


</form-->
<?php
include ('class.php');
    
    
$cliente1 = new Cliente;
$nombrecli=$_POST['nombrecli'];
$app=$_POST['app'];
$apm=$_POST['apm'];
$tel=$_POST['tel'];
$em=$_POST['em'];
$ddir=$_POST['ddir'];
$cliente1->insertcliente($nombrecli, $app, $apm, $tel, $em, $ddir);
    
    

$depa1 = new Depa;
$nombre_depa=$_POST['nombre_depa'];
$depa1->insertardepa($nombre_depa);
    
    
    
$emple1 = new Emple;
$nombre_emple=$_POST['nombre_emple'];
$loc=$_POST['loc'];
$tel=$_POST['tel'];
$emple1->insertarEmpleado($nombre_emple,$loc,$tel);

    
    
$enca1 = new Encargado;
$ie=$_POST['ie'];
$is=$_POST['is'];
$ge=$_POST['ge'];
$enca1->insertarencargado($ie,$is,$ge);


    
$serv1 = new Servicio;
$nser=$_POST['nser'];
$iden=$_POST['iden'];
$iddep=$_POST['iddep'];
$idenc=$_POST['idenc'];
$serv1->insertarservicios($nser,$iden,$iddep,$idenc);

?>
</body>
</html>