<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);

$query="
insert into registros_concurso (apellidos,nombres,mail,telefono,telefono2,dir,tarjeta,user_creacion,fecha_creacion,hora_creacion,ciudad,pueblo,codigo) values
('$ape','$nom','$mail','$tel','$tel2','$dir','$tarjeta','$user',now(),DATE_ADD(now(),INTERVAL 1 HOUR),'$ciu','$pue','$cod')";

$resultado = $dbh->prepare($query);
$resultado->execute();
die ("ok");
?>