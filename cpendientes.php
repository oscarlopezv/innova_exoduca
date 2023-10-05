<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$sql=new conectar();
$sql->mysqlsrv();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon3.ico" type="image/ico" />

    <title>INNOVA TOUR</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
    <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
    .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
        }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script> 
      <script>
function filtroesp(){esp={messages:{info:"Ver valor que sea:",filter:"Filtrar",clear:"Limpar",isTrue:"Verdadero",isFalse:"Falso",and:"Y",or:"O"},operators:{string:{eq:"Igual a",neq:"Diferente de",startswith:"Comienze con",contains:"Contenga",endswith:"Termine con"},number:{eq:"Igual a",neq:"Diferente de",gte:"Mayor que o igual a",gt:"Mayor que",lte:"Menor que o igual a",lt:"Menor que"},date:{eq:"Igual a",neq:"Diferente de",gte:"Mayor que o igual a",gt:"Mayor que",lte:"Menor que o igual a",lt:"Menor que"}}};return esp};function columnesp(){esp={sortAscending:"Orden Ascendente",sortDescending:"Orden Descendente",filter:"Filtro",columns:"Columnas"};return esp}
</script>
    <!-- Custom Theme Style --> 
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
      <div id="editpaquete"></div>
      
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-industry"></i> <span>INNOVA TOUR</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user-admin.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["usuario-name"] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include_once("menu.php") ?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
               <a data-toggle="tooltip" data-placement="top" title="Cambio de contraseña" href="contrasena.php">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="php/login-out.php?id=sign-out">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include_once("cabecera.php") ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class>
                    <h3>COBROS PENDIENTES</h3>
                <div id="grid" style="height:400px"></div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Developed by
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<script id="command-template2" type="text/x-kendo-template">
<button class="k-button" style="min-width:40px" onClick="document.location.href='cobcontratosg.php?id=#=contrato#'"><i class='fa fa-file'></i></button>
 
    </script>
      <script>

<!-- Initialize the Grid -->
$(document).ready(function () {		
	kendo.culture("es-EC")
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"cpendientes"}
			},
            update:  {
				url: crudServiceBaseUrl+"update.php",
				dataType: "json",
				data:{id:"cpendientes"}
			},
		},
        
        
        batch:true,
        schema: {
            model: {
                id: "idcontrato_pagos",
                fields: {
                    codigo: {  editable: false },
                    titular1: { editable:false },
                    titular2: { editable:false },
                    monto: { type:"Number",validation: { min: 0, required: true } },
                    banco: { editable:false },
                    vinicial: { editable:false },
                    inversion: { editable:false },
                    fecha: { editable:false, type:"date" }
                }
            }
        },
        aggregate: [ { field: "monto", aggregate: "sum",type:"decimal" },   ]
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
        toolbar: ["excel"],
        filterable: filtroesp(),
        excel: {
            fileName: "cobros_pendientes.xlsx",
			proxyURL: "excel/",
            filterable: true,
            
            allPages: true
        },
		dataSource: dataSource,            
        resizable: true,
		
        editable:"inline",
        filterable: {
              mode: "menu"
          },
        //detailTemplate: '<div class="grid"></div>',
        //detailInit: detailInit,
        
		columns: [
            
			{ template: kendo.template($("#command-template2").html()), width:'55px'},
            { field: "fecha", template:"#:kendo.toString(fecha, 'yyyy/MM/dd')#", title:"Fecha_Pago", width:"100px"},
            
            //{ command: ["edit"], title: "&nbsp;", width: "110px" },
			{ field: "codigo", title:"Contrato", width:'105px'},
			{ field: "titular1", title:"Titular1", width:'200px'},
            { field: "titular2", title:"Titular2", width:'200px'},            
            { field: "monto", title:"Monto",template:"<spam class='red'>#= monto#</span>",  width:"100px",footerTemplate:"Total: $#: sum#"},
            { field: "banco", title:"Cuota",width:"150px"},
            { field: "vinicial", title:"Inicial", width:"150px"},
            { field: "inversion", title:"Inversión", width:"150px"},
            
        ],
	}).data("kendoGrid");
	
	
});


          
function detailInit(e) {
    var detailRow = e.detailRow;

    
    console.log(e)
    detailRow.find(".grid").kendoGrid({
        dataSource: {
            transport: {
			   read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"cpendientesdet",idc:e.data.idcontrato_pagos}
                },
                
            },
            pageSize: 5,
            
            
        },
        scrollable: false,
        
        pageable: true,
        columns: [
            { field: "montoant", title:"Anterior", width: "100px" },
            { field: "montoact", title:"Actual", width: "100px" },
            { field: "estado", title: "Estado", width: "100px" },
            { field: "fecha_registro", title:"Fecha" ,width:"150px"},
            { field: "usuario", title: "Usuario", width: "300px" }
        ]
    });
}
//////////////////////

//////////////////////

</script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jszip.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
