<?php

class Depa {
private $nombre_depa;
    
public function getNombre()
{
return $this->nombre_depa;
}
public function insertardepa($nombre_depa)
{
$conexion = mysqli_connect("localhost","root","","u435473506_netit");
$sql = "CALL insertardepa('".$nombre_depa."')";
mysqli_query($conexion, $sql);
}
}




class Cliente
{
private $nombrecli;
private $ap;
private $am;
private $tel;
private $em;
private $ddir;

public function getnombre()
{
return $this->nombrecli;
}
public function getapellidop()
{
return $this->app;
}
public function getapellidom()
{
return $this->apm;
}
public function gettel()
{
return $this->tel;
}
public function getem()
{
return $this->em;
}
public function getddir()
{
return $this->ddir;
}
public function insertcliente($nombrecli, $app, $apm, $tel , $em , $ddir)
{
$conexion = mysqli_connect("localhost","root","","u435473506_netit");
$sclie = "CALL insertcliente('".$nombrecli."','".$app."','".$apm."','".$tel."','".$em."','".$ddir."')";
mysqli_query($conexion, $sclie);
}
}




class Emple
{
private $nombre_emple;
private $loc;
private $tele;
public function getnombre()
{
return $this->nombre_emple;
}
public function getloc()
{
return $this->loc;
}    
public function gettele()
{
return $this->tele;
}
public function insertarempleado($nombre_emple, $loc, $tele)
{
$conexion = mysqli_connect("localhost","root","","u435473506_netit");
$sempl = "CALL insertarempleado('".$nombre_emple."','".$loc."','".$tele."')";
mysqli_query($conexion, $sempl);
}
}




    
    
class Encargado
{
private $ie;
private $is;
private $ge;
public function getIe()
{
return $this->ie;
}
public function getIs()
{
return $this->is;
}
public function getGe()
{
return $this->ge;
}
public function insertarencargado($ie, $is, $ge)
{
$conexion = mysqli_connect("localhost","root","","u435473506_netit");
$senc = "CALL insertarencargado( '".$ie."','".$is."','".$ge."')";
mysqli_query($conexion, $senc);
}
}
    
    


class Servicio
{
private $nser;
private $iden;
private $iddep;
private $idenc;
public function getNser()
{
return $this->nser;
}
public function getIden()
{
return $this->iden;
}
public function getIddep()
{
return $this->iddep;
}
public function getIdenc()
{
return $this->idenc;
}
public function insertarservicios($nser, $iden, $iddep, $idenc)
{
$conexion = mysqli_connect("localhost","root","","u435473506_netit");
$sser = "CALL insertarservicios( '".$nser."','".$iden."','".$iddep."','".$idenc."')";
mysqli_query($conexion, $sser);
}
} 
?>