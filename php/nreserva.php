
<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$query="SELECT count(*) FROM innovdl8_InnovaCrm.detalle_calls
where idtmk=113 and date(fecha_registro)=date(now()) and concretado='Concretado'";
$resultado = $dbh->prepare($query);
$resultado->execute();
$row=$resultado->fetch();
echo $row[0];
?> 