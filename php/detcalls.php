<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET); 
extract($_POST);
$query="select *,hour(hreserva)hora,minute(hreserva)min from detalle_calls where iddetalle_calls=$detcall";
$resultado=mysql_query($query) 	
	$resultado = $dbh->prepare($query);
	$resultado->execute();
$rows = array();
$i=0;
while( $row = $resultado->fetch() ) {
	$rows[] =  $row;
}
print json_encode($rows); 

?>