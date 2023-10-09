<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
$costosocio=0;
$costonosocio=0;
extract($_GET);
extract($_POST);



 $models = (array) json_decode($models);
if (isset($models))  
	extract($models); 



switch ($id) {
	case "empleado":
		$query="Update empleados set nombres='$nom',apellidos='$ape',foto='$foto',mail='$mail',tipoempleado='$puesto',sueldo='$sueldo',puestoid='$idpe',codtmk='$codtmk',tipopago='$tpago',fingreso='$fingreso',usuario_actualiza='".$_SESSION["usuario-id"]."',fecha_actualiza=now() where idempleados=$idp";
	break;
        
    case "htrabajo":
		$query="Update htrabajo set pcomisionar='$pcomisionar',oficina='$ofi',codigo='$cod',fecha='$fecha',tnombres='$nomt1',tapellidos='$apet1',tced='$cedt1',tmail='$mailt1',ttelefonos='$telt1',tnombres2='$nomt2',tapellidos2='$apet2',tced2='$cedt2',tmail2='$mailt2',ttelefonos2='$telt2',direccion='$dir',inversion='$inversion',vinicial='$inicial',facnombre='$nombref',faccedula='$cedf',facdireccion='$dirf',factel='$telf',observacion='$obs',fecha_actualizar=now(),usuario_actualizar='".$_SESSION["usuario-id"]."',asesor1='$asesor1',cerrador1='$cerrador1',cerrador2='$cerrador2',gersala='$gmarketing',telemarketing='$tmk',suptelemarketing='$stmk',gerenteventa='$gerven',supervisorventa='$supven',directorcomercial='$dircom',jefe='$jefe',admven='$admven',vigencia=$vig,gastoadm='$gadm' where idhtrabajo='$idh'";
	break;
        
    case "reservas":
		$query="Update reservas set fechaida='$fechai',fecharegreso='$fechaf',tipo='$tipo',adultos='$adultos',ninos='$ninos',infantes='$infantes',estado='$estado',descripcion='$descripcion',voucher='$voucher' where idreservas=$reserva";    
	break;
    
    case "cpendientes":
		$query="call auditpagos('".$_SESSION["usuario-id"]."',0,'$monto','$idcontrato_pagos','$estado','$voucher','$abono')";   
	break;
    case "inventario":
		$query="Update inventario set nombre='$nom',marca='$marca',modelo='$modelo',fecha_compra='$fecha',costo='$costo',estado='$estado',comentario='$com',departamento='$departamento' where idinventario=$idp";    
	break;
    case "mantvehiculos":
		$query="Update vehiculos_mant set idvehiculo='$vehiculo',fecha='$fecha',costo='$costo',factura='$fact',descripcion='$descripcion',observacion='$com' where idvehiculos_mant=$idp";    
	break;
    case "convenios":
		$query="Update convenios set hotel='$nom',contacto='$contacto',telefono='$tel',ciudad='$ciudad',asesora='$asesora',tarifario='$tarifario',comentarios='$com' where idconvenios=$idp";    
	break;
    case "import":
		$query="Update clientes_import set  cedula='$cedula',nombre='$nombre',cel1='$cel1',cel2='$cel2',tel='$tel',provincia='$provincia',ciudad='$ciudad',mail='$mail' where idclientes_import=$idclientes_import";   
	break;
    case "amadeus":
		$query="Update amadeus set  nombre='$nombre',link='$link' where idamadeus=$idamadeus";   
	break;
    case "plancuenta":
		$query="Update plan_cuentas set  codigo='$codigo',descripcion='$descripcion' where idplan_cuentas='$idplan_cuentas'";   
	break;
    case "balance":
		$query="Update balance set  codigo='$codigo',descripcion='$descripcion',valor='$valor',fecha='$fecha',debcred='$debcred' where idbalance=$idbalance";   
	break;
    case "porcomision":
		$query="Update per_comision set  asesor1='$ase1',cerrador1='$cer1',cerrador2='$cer2',tmk='$tmk',sup_tmk='$stmk',ger_venta='$gerven',valor_ano='$vano',adm_venta='$admven',sup_venta='$sven',dir_com='$dcom',ger_mark='$gtmk',jefe='$jefe',mintmkf='$mintmkf',sp0liner='$sp0liner',sp0closer='$sp0closer',sp0admv='$sp0admv',spliner34='$spliner34',spliner57='$spliner57',spliner8='$spliner8',spcloser34='$spcloser34',spcloser57='$spcloser57',spcloser8='$spcloser8',bcliner1524='$bcliner1524',bcliner2529='$bcliner2529',bcliner30='$bcliner30',bccloser1524='$bccloser1524',bccloser2529='$bccloser2529',bccloser30='$bccloser30',gsven5079='$gsven5079',gsven80='$gsven80',dircom50='$dircom50'";   
	break;
    case "voucher":
		$query="Update contrato_pagos set  voucher='$img' where idcontrato_pagos=$ide";   
	break;
    case "packs":
		$query="Update packs set  rangoa='$rdesde',rangob='$rhasta',liner='$liner',closer1='$closer1',closer2='$closer2' where idpacks=$idp";   
	break;
    case "concurso":
		$query="Update registros_concurso set  estado='Contactado' where idregistros_concurso=$ide";   
	break; 
    case "manifiestos":
		$query="Update manifiesto set  titular='$nomt1',acompañante='$aco',ocupaciont='$ocu',tnt='$tnt',cedulat='$cedt1',ciudad='$ciu',mailt='$mailt1',celular='$telt1',contrato='$cont',lote='$lote',ref='$ref',aprobacion='$apro',adquiriente='$adqui',marcatc='$tc',anos='$anosc',plus='$plus',total='$inversion',pago='$pago',creditodir='$credi',tc='$tcli',liner='$asesor1',closer1='$cerrador1',closer2='$cerrador2',observacion='$obs',fecha_actualizar=now(),usuario_actualizar='".$_SESSION["usuario-id"]."',efectividad='$efe',codigo='$cod',estadocivil='$ec',fecha='$fecha',direccion='$dir',admsala='$admsala',gadm='$gadm',gersala='$gersala',pinicial='$pinicial' where idmanifiesto=$idm";   
	break; 
    case "salidae":
		$query="update empleados set estado=0,fsalida='$fsalida' where idempleados=$ide";   
	break;  
    case "bonot":
		$query="Update bonostmk set  ano='$ano',venta='$venta',valor='$valor' where idbonostmk=$ide";   
	break;
    
}

echo $query;
die;

$resultado = $dbh->prepare($query);
$resultado->execute();
if ($id=="cpendientes"){
    print json_encode($models);
}
if ($id=="import" || $id=="amadeus" || $id=="plancuenta" || $id=="balance"){
    print json_encode($_POST);
}

?>