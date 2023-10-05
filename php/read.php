<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);

switch ($id) 
{
	case "empleados":
		$query="select a.*,concat(reg.apellidos,' ',reg.nombres) usreg,concat(act.apellidos,' ',act.nombres) usact from empleados a
                left join empleados reg on reg.idempleados=a.usuario_registro
                left join empleados act on act.idempleados=a.usuario_actualiza
                where a.estado=1 order by apellidos";		
	break;
    case "concurso":
		$query="select * from registros_concurso where idregistros_concurso<26 order by idregistros_concurso desc";		
	break;
    case "maxconcurso":
		$query="select max(idregistros_concurso) max from registros_concurso where fecha_creacion between '$fechai' and '$fechaf' ";		
	break;
    case "maxconcurso2":
		$query="select * from registros_concurso where idregistros_concurso>$max and fecha_creacion between '$fechai' and '$fechaf' order by idregistros_concurso desc";		
	break;
    case "empleadossf":
		$query="select *,trim(CONCAT(apellidos,' ',nombres)) nom  from empleados a order by nom";		
	break;
    case "empleadossf2":
		$query="select idempleados ide,trim(CONCAT(apellidos,' ',nombres)) nom  from empleados a where CONCAT(apellidos,' ',nombres) like '%".$filter["filters"]["0"]["value"]."%'  order by nom";		
	break;
    case "puesto":
		$query="select * from puestos order by puesto ";		
	break;
    case "vendedor":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Vendedor'";		
	break;
    case "tmk":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Telemarketing'";		
	break;
    case "stmk":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Supervisor de Mercadeo'";		
	break;
    case "gerven":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Gerente de Sala'";		
	break;
    case "supven":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Supervisor comercial'";		
	break;
    case "dircom":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Director Comercial'";		
	break;
    
    case "jefe":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Propietario'";		
	break;
    case "gmark":
		$query="select *,CONCAT(apellidos,' ',nombres) nom from empleados where tipoempleado='Gerente de Marketing'";		
	break;
    case "verifymailem":
		$query="select * from empleados where mail='$mail'";		
	break;
    case "forma_pago":
		$query="select * from contrato_pagos where contrato='$contrato' and activo=1";		
	break;
    case "htrabajo":
		$query="select *,
			CONCAT(tnombres,' ',tapellidos) titular1,
			CONCAT(tnombres2,' ' ,tapellidos2) titular2,
			concat(reg.apellidos,' ',reg.nombres) usreg,
			concat(act.apellidos,' ',act.nombres) usact
		from htrabajo as a
        left join empleados reg on reg.idempleados=a.usuario_registro
        left join empleados act on act.idempleados=a.usuario_actualizar
        order by a.idhtrabajo desc";
	break;
	case "cobcontratos":
		$query="select *,
			CONCAT(tnombres,' ',tapellidos) titular1,
			CONCAT(tnombres2,' ' ,tapellidos2) titular2,
			concat(reg.apellidos,' ',reg.nombres) usreg,
			concat(act.apellidos,' ',act.nombres) usact
		from htrabajo as a
        left join empleados reg on reg.idempleados=a.usuario_registro
        left join empleados act on act.idempleados=a.usuario_actualizar
		where (a.inversion - a.vinicial) > 0
        order by a.idhtrabajo desc";	
	break;
	case "clientesSinDeuda":
		$query="select *,
			CONCAT(ht.tnombres,' ',ht.tapellidos) titular1,
			CONCAT(ht.tnombres2,' ' ,ht.tapellidos2) titular2,
			concat(reg.apellidos,' ',reg.nombres) usreg
			,concat(act.apellidos,' ',act.nombres) usact
			
		from htrabajo as ht
        left join empleados reg on reg.idempleados = ht.usuario_registro
        left join empleados act on act.idempleados = ht.usuario_actualizar
        order by ht.idhtrabajo desc
	
		";	
	break;
    case "manifiesto":
		$query="select a.*,
        (select concat(e.apellidos,' ',e.nombres) nombres from empleados e where e.idempleados=a.liner) linerb,
        (select concat(e.apellidos,' ',e.nombres) nombres from empleados e where e.idempleados=a.closer1) closer1b,        
        (select concat(e.apellidos,' ',e.nombres) nombres from empleados e where e.idempleados=a.closer2) closer2b,        
        (select concat(e.apellidos,' ',e.nombres) nombres from empleados e where e.idempleados=a.admsala) admsalab,        
        (select concat(e.apellidos,' ',e.nombres) nombres from empleados e where e.idempleados=a.gersala) gersalab,concat(reg.apellidos,' ',reg.nombres) usreg,concat(act.apellidos,' ',act.nombres) usact
        from manifiesto a 
        left join empleados reg on reg.idempleados=a.usuario_registro
        left join empleados act on act.idempleados=a.usuario_actualizar
        order by a.idmanifiesto desc";		
	break;
    case "llamadas":
		$query="select *,SEC_TO_TIME(TIMESTAMPDIFF(SECOND,iniciollamada,finllamada)) duracion,concat(reg.apellidos,' ',reg.nombres) usreg from llamadas a
        left join empleados reg on reg.idempleados=a.idempleado
        where contrato='$contrato'";		
	break;
    case "reservas":
		$query="select * from reservas  where contrato='$contrato'";		
	break;
    case "rpendientes":
		$query="select *,CONCAT(tnombres,' ',tapellidos) titular1,CONCAT(tnombres2,' ' ,tapellidos2) titular2 from reservas a 
inner join htrabajo b on a.contrato=b.idhtrabajo
where estado='RESERVADO' and fechaida > now()";		
	break;
    case "cpendientes":
		$query="
select a.* ,b.codigo,b.vinicial,b.inversion,CONCAT(tnombres,' ',tapellidos) titular1,CONCAT(tnombres2,' ' ,tapellidos2) titular2 from contrato_pagos a 
inner join htrabajo b on a.contrato=b.idhtrabajo
where  a.estado='PENDIENTE' and a.fecha between date(now()) and  DATE_ADD(date(now()), INTERVAL 15 DAY) and activo=1 order by a.fecha";		
	break;

    case "cpendientes2":
	$query="select 
	b.tced,
	b.tmail,
	b.ttelefonos,
	b.direccion,
	b.gastoadm,
	b.observacion,
	FORMAT(a.monto,2,'de_DE') monto2 ,
	a.* ,
	b.codigo,
	b.vinicial,
	b.inversion,
	CONCAT(tnombres,' ',tapellidos) titular1,
	CONCAT(tnombres2,' ' ,tapellidos2) titular2 
	from contrato_pagos a 
		inner join htrabajo b on a.contrato=b.idhtrabajo
		where  a.estado='PENDIENTE' and a.fecha < now() order by a.fecha desc ";		
	break;
    case "cpendientesdet":
		$query="select a.*,CONCAT(b.apellidos,' ',b.nombres) usuario from audit_pagos a
        left join empleados b on a.usuario_registro = b.idempleados
        where idcontrato_pagos=$idc order by idaudit_pagos desc";		
	break;
    case "inventario":
		$query="select a.*,CONCAT(b.apellidos,' ',b.nombres) usreg from inventario a
        left join empleados b on a.usuario_registro = b.idempleados
        order by idinventario desc";		
	break;
    case "vehiculos":
		$query="select idinventario as idvehiculos, CONCAT(marca,' ',modelo),CONCAT(b.apellidos,' ',b.nombres) usreg  as vehiculo from inventario
        left join empleados b on a.usuario_registro = b.idempleados
        where nombre='VEHICULO' and CONCAT(marca,' ',modelo) like '%".$filter['filters'][0]['value']."%'";		
	break;
    case "mantvehiculos":
		$query="select * from vehiculos_mant order by idvehiculos_mant desc";		
	break;
    case "convenios":
		$query="select * from convenios order by idconvenios desc";		
	break;
    case "import":
		$query="select * from clientes_import order by idclientes_import desc";		
	break;
    case "amadeus":
		$query="select * from amadeus order by nombre asc";		
	break;
    case "historial":
		$query="select a.* ,CONCAT(b.apellidos,' ',b.nombres) usuario from audit_refinanciamientos a
        inner join empleados b on a.usuario_registro = b.idempleados
        where a.idcontrato='$contrato'
        order by idaudit_refinanciamientos desc";		
	break;
    case "historialdet":
		$query="select a.*,CONCAT(b.apellidos,' ',b.nombres) usuario,'ELIMINADO' estadoe from contrato_pagos a
        inner join empleados b on a.usuario_registro = b.idempleados
        where idcontrato_pagos in ($idc) order by idcontrato_pagos desc";		
	break;
    case "novedadcont":
		$query="select * from novedades_contrato a where idcontrato='$idc'";		
	break;
    case "novedade":
		$query="select a.*,concat(reg.apellidos,' ',reg.nombres) usreg from novedades_empleados a
        left join empleados reg on reg.idempleados=a.usuario_registro
        where idempleado='$idc'";		
	break;
    case "empleadosnov":
		$query="select a.*,(Select count(*) from novedades_empleados b where a.idempleados=b.idempleado) novcount 
        from empleados a        
        where a.estado=1 order by novcount desc, apellidos asc";		
	break;
    case "plancuenta":
		$query="select * from plan_cuentas a";		
	break;
    case "cuenta":
		$query="select *,concat(a.codigo,'-',a.descripcion) cuenta from plan_cuentas a where descripcion like '%".$filter["filters"]["0"]["value"]."%' or codigo='".$filter["filters"]["0"]["valuex"]."' order by cuenta asc";		
	break;
    case "balance":
		$query="select * from balance a order by fecha";		
	break;
    case "balancef":
		$query="select * from balance a where fecha between '$feci' and '$fecf' order by fecha";		
	break;
    case "artes":
		$query="select a.*, concat(reg.apellidos,' ',reg.nombres) usreg from artes a
        left join empleados reg on reg.idempleados=a.usuario_registro
        order by idartes desc";		
	break;
    case "comision":
		$query="call comisiones('$feci','$fecf')";		
	break;
    case "comisiontmk":
		$query="call comisionestmk('$feci','$fecf')";		
	break;
    case "packs":
		$query="select * from packs order by rangoa asc";		
	break;
    case "albumi":
		$query="select * from album order by idalbum";		
	break;
    case "importmail":
		$query="select * from clientes_import where mail<>'' order by idclientes_import desc";		
	break;
    case "importmail2":
		$query="select distinct tmail mail,concat(tnombres,' ',tapellidos) nombre,oficina ciudad from htrabajo";		
	break;
    case "nomina":
		$query="select * from detalles_nominas where idcierre_nomina='$idc'";		
	break;
    case "descuentos":
		$query="select a.*,concat(reg.apellidos,' ',reg.nombres) usact from descuentos a
        left join empleados reg on reg.idempleados=a.usuario_registro
        where idempleado='$idem' order by iddescuentos desc";		
	break;
    case "adicionales":
		$query="select a.*,concat(reg.apellidos,' ',reg.nombres) usreg from adicionales a
        left join empleados reg on reg.idempleados=a.usuario_registro
        where idempleado='$idem' order by idadicionales desc";		
	break;
    case "bonot":
		$query="select * from bonostmk order by ano";		
	break;
    case "gadministrativo":
		$query="select sum(gastoadm) recaudado from htrabajo
            where fecha between '$feci' and '$fecf'";		
	break;
    case "salastmk":
		$query="select * from salastmk";		
	break;
    case "salasd":
		$query="select * from salas_diario where idsala='$ide' and fecha=date(now())";		
	break;
    case "importmailcall":
		$query="select * from clientes_import where 
not find_in_set(idclientes_import,(SELECT group_concat(calls) FROM innovdl8_InnovaCrm.calls_diarias))
and cedula not in (select tced from htrabajo)"; 		
	break;
    case "suptmk":
		$query="select *,trim(CONCAT(apellidos,' ',nombres)) nom  from empleados a where idempleados in ($tmks) order by nom";		
	break;
    case "callspenasign":
		$query="select * from clientes_import where idclientes_import in ($calls) and idclientes_import not in
(select idclientes_import from clientes_import where  FIND_IN_SET(idclientes_import,(select calls from calls_diarias where supervisor='".$_SESSION["usuario-id"]."' and fecha=date(now()))))";		
	break;
    case "callsassign":
		$query="select * from clientes_import where FIND_IN_SET(idclientes_import,(
select calls from calls_diarias where idtmk='$tmk' and fecha=date(now())))";		
	break;
    case "detcalls":
		$query="SELECT *,(select b.nombre from clientes_import b where a.idclientes_import=b.idclientes_import) cliente,(select concat(c.apellidos,' ',c.nombres) ntmk from empleados c where a.idtmk=c.idempleados) ntmk,(select concat(c.apellidos,' ',c.nombres) ntmk from empleados c where a.idsupact=c.idempleados) nsup FROM detalle_calls a";		
	break;
    case "detalm":
		$query="select *,(select concat(c.apellidos,' ',c.nombres) from empleados c where c.idempleados=a.idtmk) ntmk from alba単o a order by idalba単o desc";		
	break;
    case "provlist":
		$query="SELECT provincia FROM clientes_import group by provincia order by provincia";		
	break;
    case "ciulist":
		$query="SELECT ciudad FROM clientes_import where ciudad !='' and provincia='".$filter["filters"]["0"]["value"]."' group by ciudad order by ciudad ";		
	break;
    case "importmailcall2":
		$query="select count(*) num from clientes_import where 
not find_in_set(idclientes_import,(SELECT group_concat(calls) FROM innovdl8_InnovaCrm.calls_diarias))
and cedula not in (select tced from htrabajo)
and provincia='$prov' "; 		
	break;
    case "importmailcall3":
		$query="select count(*) num from clientes_import where 
not find_in_set(idclientes_import,(SELECT group_concat(calls) FROM innovdl8_InnovaCrm.calls_diarias))
and cedula not in (select tced from htrabajo)
and provincia='$prov' and ciudad='$ciu' "; 		
	break;
        
        
}


if($id =="clientesSinDeuda")
{	
	
	$resultado = $dbh->prepare($query);
	$resultado->execute();
	$rows = array();
	$ids = array();
	while( $row = $resultado->fetch() ) 
	{
		$rows[ $row['idhtrabajo']] =  $row;
		$ids[] = $row['idhtrabajo'] ;
	}

	ini_set('max_execution_time', 0);

	$ids = implode(",", $ids);
	$consulta ="SELECT * FROM `contrato_pagos` WHERE `contrato` in(". $ids . ")" ;
	$resultado = $dbh->prepare($consulta);
	$resultado->execute();

	$contratos = array();
	while( $row = $resultado->fetch() ) 
		$contratos[ $row['contrato'] ][] =  $row;
	
	$contatoPendientes = array();
	foreach ($contratos as $idContrato => $contrato)
	{
		foreach ($contrato as $cont)
		{
			$contatoPendientes[$idContrato] = "PAGO";
			if($cont['estado'] == "PENDIENTE")
			{
				unset($contatoPendientes[$idContrato]);
				break;
			}	
		}
	}

		$datos = array();
		foreach ($contatoPendientes as $key => $cp)
		{
			$datos[] = $rows[$key];
		}

		$consulta =
		"SELECT * 
		FROM 
			htrabajo 
		WHERE 
			idhtrabajo not in (SELECT contrato FROM contrato_pagos GROUP by contrato) 
		and 
			(inversion - vinicial) = 0  ";
		
		$resultado = $dbh->prepare($query);
		$resultado->execute();
		
		while( $row = $resultado->fetch() ) 
			$datos[] =  $row;

		$rows  = $datos;
}
else
{
	$resultado = $dbh->prepare($query);
	$resultado->execute();

	$rows = array();
	$ids = array();
	while( $row = $resultado->fetch() ) 
		$rows[] =  $row;
}


print json_encode($rows);
?>