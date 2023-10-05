<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);
$text=addslashes($text);
$query="call cierre_nomina('$text','2018-06-01','2018-06-01','".$_SESSION["usuario-id"]."')";

$resultado = $dbh->prepare($query);
$resultado->execute();
?>