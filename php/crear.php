<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);

$mail=@trim($mail);
array_map('utf8_encode', $_POST);
array_map('utf8_encode', $_GET);
switch ($id) { 
	case "empleado":
		$query="Insert into empleados (nombres,apellidos,mail,password,fecha_registro,usuario_registro,sueldo,tipoempleado,estado,puestoid,codtmk,foto,fingreso,tipopago) values (upper('$nom'),upper('$ape'),'$mail',MD5('$mail'),now(),'".$_SESSION["usuario-id"]."','$sueldo','$puesto',1,'$idpe','$codtmk','$foto','$fingreso','$tpago')";		
	break; 
    case "htrabajo":
		$query="Insert into htrabajo (pcomisionar,oficina,codigo,fecha,tnombres,tapellidos,tced,tmail,ttelefonos,tnombres2,tapellidos2,tced2,tmail2,ttelefonos2,direccion,inversion,vinicial,facnombre,faccedula,facdireccion,factel,observacion,fecha_registro,usuario_registro,asesor1,cerrador1,cerrador2,gersala,telemarketing,suptelemarketing,gerenteventa,supervisorventa,directorcomercial,jefe,admven,vigencia,gastoadm)
        values ('$pcomisionar','$ofi','$cod','$fecha','$nomt1','$apet1','$cedt1','$mailt1','$telt1','$nomt2','$apet2','$cedt2','$mailt2','$telt2','$dir','$inversion','$inicial','$nombref','$cedf','$dirf','$telf','$obs',now(),'".$_SESSION["usuario-id"]."','$asesor1','$cerrador1','$cerrador2','$gmarketing','$tmk','$stmk','$gerven','$supven','$dircom','$jefe','$admven',$vig,'$gadm')";		
	break; 
    case "forma_pago":
		$fecha = date("Y-m-d");
		$query="call cuotas($cuota,$gracia,'$descripcion',$saldo,$contrato,$dia,'".$_SESSION["usuario-id"]."','$fecha')";		
	break;
    case "llamadas":
		$query="Insert into llamadas (idempleado,iniciollamada,finllamada,descripcion,contrato,asunto,estado,fecha_registro) values ('".$_SESSION["usuario-id"]."','$fechai','$fechaf','$descripcion','$contrato','$asunto','$estado',now())";		
	break;
    case "reservas":
		$query="Insert into reservas (fechaida,fecharegreso,adultos,ninos,infantes,estado,fecha_registro,usuario_registro,descripcion,contrato,tipo,voucher) values ('$fechai','$fechaf','$adultos','$ninos','$infantes','$estado',now(),'".$_SESSION["usuario-id"]."','$descripcion','$contrato','$tipo','$voucher')";		
	break;
    case "inventario":
		$query="Insert into inventario (nombre,marca,modelo,fecha_compra,costo,estado,comentario,fecha_registro,usuario_registro,departamento) values ('$nom','$marca','$modelo','$fecha','$costo','$estado','$com',now(),'".$_SESSION["usuario-id"]."','$departamento')";		
	break;
    case "mantvehiculos":
		$query="Insert into vehiculos_mant (idvehiculo,fecha,costo,factura,descripcion,observacion,fecha_registro,usuario_registro) values ('$vehiculo','$fecha','$costo','$fact','$descripcion','$com',now(),'".$_SESSION["usuario-id"]."')";		
	break;
    case "convenios":
		$query="Insert into convenios (hotel,contacto,telefono,ciudad,asesora,tarifario,fecha_registro,usuario_registro,comentarios) values ('$nom','$contacto','$tel','$ciudad','$asesora','$tarifario',now(),'".$_SESSION["usuario-id"]."','$com')";		
	break;
    case "amadeus":
		$query="Insert into amadeus (nombre,link) values ('$nom','$link')";		
	break;
    case "manifiesto":
		$query="Insert into manifiesto (oficina,codigo,fecha,tnombres,tapellidos,tced,tmail,ttelefonos,tnombres2,tapellidos2,tced2,tmail2,ttelefonos2,direccion,inversion,observacion,fecha_registro,usuario_registro,asesor1,cerrador1,cerrador2,gersala,telemarketing,suptelemarketing,gerenteventa,supervisorventa,directorcomercial,jefe,efectividad)
        values ('$ofi','$cod','$fecha','$nomt1','$apet1','$cedt1','$mailt1','$telt1','$nomt2','$apet2','$cedt2','$mailt2','$telt2','$dir','$inversion','$obs',now(),'".$_SESSION["usuario-id"]."','$asesor1','$cerrador1','$cerrador2','$gmarketing','$tmk','$stmk','$gerven','$supven','$dircom','$jefe','$efe')";		
	break; 
    case "novedadcon":
		$query="Insert into novedades_contrato (novedad,fecha_creacion,usuario_registro,idcontrato) values ('$novedad',now(),'".$_SESSION["usuario-id"]."','$idc')";		
	break;
    case "novedade":
		$query="Insert into novedades_empleados (novedad,fecha_registro,usuario_registro,idempleado) values ('$novedad',now(),'".$_SESSION["usuario-id"]."','$idc')";		
	break;
    case "planc":
		$query="Insert into plan_cuentas (codigo,descripcion) values ('$cod','$des')";		
	break;
    case "balance":
		$query="Insert into balance (codigo,descripcion,valor,fecha,debcred,fecha_registro,usuario_registro) values ('$cod','$desb','$valor','$fecha','$dc',now(),'".$_SESSION["usuario-id"]."')";		
	break;
    case "arte":
		$query="Insert into artes (campana,preview,arte,fecha_registro,usuario_registro,fecha_inicio,fecha_fin) values ('$campana','$pre','$arte',now(),'".$_SESSION["usuario-id"]."','$fi','$ff')";		
	break;
    case "manifiestos":
		$query="Insert into manifiesto (titular,acompañante,ocupaciont,tnt,cedulat,ciudad,mailt,celular,contrato,lote,ref,aprobacion,adquiriente,marcatc,anos,plus,total,pago,creditodir,tc,liner,closer1,closer2,observacion,fecha_registro,usuario_registro,efectividad,codigo,estadocivil,fecha,direccion,admsala,gersala,pinicial,gadm)
        values ('$nomt1','$aco','$ocu','$tnt','$cedt1','$ciu','$mailt1','$telt1','$cont','$lote','$ref','$apro','$adqui','$tc','$anosc','$plus','$inversion','$pago','$credi','$tcli','$asesor1','$cerrador1','$cerrador2','$obs',now(),'".$_SESSION["usuario-id"]."','$efe','$cod','$ec','$fecha','$dir','$admsala','$gersala','$pinicial','$gadm')";		
	break; 
    case "packs":
		$query="Insert into packs (rangoa,rangob,liner,closer1,closer2) values ('$rdesde','$rhasta','$liner','$closer1','$closer2')";		
	break;
    case "albumi":
		$query="Insert into album (imagen) values ('$imagen')";		
	break;
    case "descuentos":
		$query="Insert into descuentos (idempleado,descuento,descripcion,fecha,fecha_registro,usuario_registro) values ('$idem','$valor','$obs','$fecha',now(),'".$_SESSION["usuario-id"]."')";		
	break;
    case "adicionales":
		$query="Insert into adicionales (idempleado,descuento,descripcion,fecha,fecha_registro,usuario_registro) values ('$idem','$valor','$obs','$fecha',now(),'".$_SESSION["usuario-id"]."')";		
	break;
    case "bonot":
		$query="Insert into bonostmk (ano,venta,valor) values ('$ano','$venta','$valor')";		
	break;
    case "salastmk":
		$query="Insert into salastmk (nombre,fecha_registro,usuario_registro) values ('$nombre',now(),'".$_SESSION["usuario-id"]."')";	
	break; 
    case "salasd":
		$query="Insert into salas_diario (idsala,supervisor,tmks,fecha,usuario_registro,calls) values ('$sala','$sup','$tmks',now(),'".$_SESSION["usuario-id"]."',(select group_concat(idclientes_import) from (select idclientes_import from clientes_import where 
not find_in_set(idclientes_import,(SELECT group_concat(calls) FROM innovdl8_InnovaCrm.calls_diarias))
and cedula not in (select tced from htrabajo)
and provincia='$prov' limit $numcall) a))";	
	break;
    case "callsassign":
		$query="Insert into calls_diarias (idtmk,calls,supervisor,fecha) values ('$tmk','$calls','$sup',now())";	
	break;
}

$resultado = $dbh->prepare($query);
if ($resultado->execute())
	echo 1;


// echo $resultado->lastInsertId();
?>
