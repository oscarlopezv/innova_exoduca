<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();

extract($_GET);
extract($_POST);

$query="insert into albaño (tipo,fecha,idtmk,modo) 
values 
('$tipo',now(),'$idus','$modo')";
mysql_query($query) 	
	
	$resultado->execute();
echo "SUCCESS";


?> 