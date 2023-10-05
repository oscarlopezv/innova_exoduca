<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
switch ($id) {
	case "empleado":
		$query="update empleados set estado=0 where idempleados=$ide";		
	break;
    case "inventario":
		$query="Delete From inventario where idinventario=$ide";		
	break;
    case "import":
		$query="Delete From clientes_import where idclientes_import=$idclientes_import";	
	break;
    case "amadeus":
		$query="Delete From amadeus where idamadeus=$idamadeus";	
	break;
    case "novedad":
		$query="delete from novedades_contrato where idnovedades_contrato=$ide";		
	break;
    case "novedade":
		$query="delete from novedades_empleados where idnovedades_empleados=$ide";		
	break;
    case "contrato":
		$query="delete from htrabajo where idhtrabajo=$ide";		
	break;
    case "packs":
		$query="Delete From packs where idpacks=$ide";	
	break;
    case "convenios":
		$query="Delete From convenios where idconvenios=$ide";	
	break;
    case "manifiesto":
		$query="Delete From manifiesto where idmanifiesto=$ide";	
	break;
    case "bonot":
		$query="Delete From bonostmk where idbonostmk=$ide";	
	break;
}


$resultado = $dbh->prepare($query);
$resultado->execute();
?>