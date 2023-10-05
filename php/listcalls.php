<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();

extract($_GET); 
extract($_POST); 
$query="select * from clientes_import where FIND_IN_SET(idclientes_import,(select calls from calls_diarias where idtmk='$idus' and fecha=date(now())))  
and idclientes_import not in (select idclientes_import from detalle_calls where idtmk='$idus' and date(fecha_registro)=date(now()))";
//$query="select * from clientes_import where FIND_IN_SET(idclientes_import,(select calls from calls_diarias where idtmk='$idus' ))";
//$query="select * from clientes_import where FIND_IN_SET(idclientes_import,(select calls from calls_diarias where idtmk='$idus' and fecha='2018-09-21')";
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