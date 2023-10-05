<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$query="Select a.idempleados,a.codtmk,a.puestoid from empleados a where a.mail='$mail' and a.password=md5('$password') and estado=1"; 

	$resultado = $dbh->prepare($query);
	$resultado->execute();
$row=$resultado->fetch();
$resp = array();
if ( $resultado->fetchColumn()>0){
    $resp[]=$row;
} else {
    die ("error");
}
print json_encode($row);
?>