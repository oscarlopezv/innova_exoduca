<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET); 
extract($_POST);
$query="select b.*,a.idtmk,
ifnull(
(select c.concretado from detalle_calls c where c.idclientes_import=b.idclientes_import and a.idtmk=c.idtmk and date(c.fecha_registro)=date(now()) limit 1),'Pendiente') concretado,
(select c.iddetalle_calls from detalle_calls c where c.idclientes_import=b.idclientes_import and a.idtmk=c.idtmk and date(c.fecha_registro)=date(now()) limit 1) iddet
from calls_diarias a 
inner join clientes_import b on find_in_set(b.idclientes_import,calls)
where a.supervisor='$idus' and a.fecha=date(now()) and a.idtmk='$tmk' ";

$resultado = $dbh->prepare($query);
$resultado->execute();
$rows = array();

while( $row = $resultado->fetch() ) {
	$rows[] =  $row;
}
print json_encode($rows); 

?>