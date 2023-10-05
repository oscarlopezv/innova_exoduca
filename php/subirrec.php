<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
array_map("utf8_encode",$_POST);
array_map("utf8_encode",$_GET);
define('UPLOAD_DIR', '../records/');

$filename = $_POST['filename'];

if (!move_uploaded_file($_FILES["picture"]["tmp_name"], UPLOAD_DIR.$_FILES["picture"]["name"])) {
    die ("FAIL");
}

extract($_GET);
extract($_POST);

$query="insert into detalle_calls (concretado,file,lugar,dir,tel1,tel2,nmesa,tarjeta,btarjeta,creserva,acom,idclientes_import,hreserva,ecivil,edad,idtmk,fecha_registro,automatic) 
values 
('$concretado','".$_FILES["picture"]["name"]."','$lugar','$dir','$tel1','$tel2','$nmesa','$tarjeta','$btarjeta','$cres','$acom','$idcliente','$hreserva','$ecivil','$edad','$idtmk',now(),'$automaticsave')";

if ($update!='0'){
    $query= "update detalle_calls set concretado='$concretado', lugar='$lugar',dir='$dir',tel1='$tel1',tel2='$tel2',nmesa='$nmesa',tarjeta='$tarjeta',btarjeta='$btarjeta',acom='$acom',hreserva='$hreserva',ecivil='$ecivil',edad='$edad',idsupact='$idtmk',fecha_update=now(),motivo_no_concretado='$ncop',filenew='".$_FILES["picture"]["name"]."' where iddetalle_calls=$update";
}

mysql_query($query) 	
	
	$resultado->execute();
echo "SUCCESS";


?> 