<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();


extract($_GET);
extract($_POST);

$query="insert into detalle_calls (concretado,file,lugar,dir,tel1,tel2,nmesa,tarjeta,btarjeta,creserva,acom,idclientes_import,hreserva,ecivil,edad,idtmk,fecha_registro,motivo_no_concretado,automatic) 
values 
('$concretado','".$_FILES["picture"]["name"]."','$lugar','$dir','$tel1','$tel2','$nmesa','$tarjeta','$btarjeta','$cres','$acom','$idcliente','$hreserva','$ecivil','$edad','$idtmk',now(),'$ncop','$automaticsave')";

if ($update!='0'){
    $query= "update detalle_calls set concretado='$concretado', lugar='$lugar',dir='$dir',tel1='$tel1',tel2='$tel2',nmesa='$nmesa',tarjeta='$tarjeta',btarjeta='$btarjeta',acom='$acom',hreserva='$hreserva',ecivil='$ecivil',edad='$edad',idsupact='$idtmk',fecha_update=now(),motivo_no_concretado='$ncop',filenew='".$_FILES["picture"]["name"]."' where iddetalle_calls=$update";
}
mysql_query($query) 	
	
	$resultado->execute();
echo "SUCCESS";


?> 