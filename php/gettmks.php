<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET); 
extract($_POST);
$query="select concat(apellidos,' ',nombres)nombres,mail,idempleados from empleados where find_in_set(idempleados,(select group_concat(tmks) FROM salas_diario
where supervisor='$idus' and fecha=date(now())))";  
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