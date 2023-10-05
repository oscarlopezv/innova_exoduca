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
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      <script src="vendors/jszip.js"></script>
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
      <style>
      .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
        }
      </style>
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
                    <h3>MANIFIESTOS</h3>
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
<button class="k-button" style="min-width:40px" onClick="document.location.href='manifiestog.php?id=#=idmanifiesto#'"><i class='fa fa-file'></i></button>
    </script>
      <script>
	
<!-- Initialize the Grid -->
$(document).ready(function () {		
	
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"manifiesto"}
			},				
		},
        pageSize: 75,
		schema: {				
			model: {
				id:"idmanifiesto",
				fields: {
                        fecha: { type: "date" },
                        
                    }
			}
								
		}
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
        //toolbar: ["excel"],
        
		pageable:true,
		filterable:true,            
		toolbar: ["excel",{ 'name': 'create', template: '<button type="button" class="k-button" onClick="nuevo(\'manifiestog.php\')">Agregar</a>' }],
		excel: {
            fileName: "manifiesto.xlsx",
			proxyURL: "excel/",
            filterable: true,
            
            allPages: true
        },
		columns: [
			//{ template: kendo.template($("#command-template2").html()), width:'55px',locked:true},
            <?php if($_SESSION["usuario-permisos"]=='todos'){ ?>
            {template:"<button onclick='eliminar(\"#=idmanifiesto#\")'>Eliminar</button>",width:'80px'},
            <?php } ?>
            <?php  if ($_SESSION["usuario-permisos"]=="todos") { ?>
            {template:"<button onclick='editar(\"#=idmanifiesto#\")'>Ver</button>",width:'50px'},
            <?php } ?>
			 { field: "fecha", title:"Fecha", width:'100px',template:"#= kendo.toString(data.fecha,'dd-MM-yyyy')#"},
			{ field: "titular", title:"Titular", width:'200px'},
            { field: "ocupaciont", title:"Ocupación", width:'150px'},
            { field: "codigo", title:"Codigo", width:'150px'},
            
            { field: "tnt", title:"T/NT", width:'75px'},
            { field: "cedula", title:"Cedula", width:'150px'},
            { field: "ciudad", title:"Ciudad", width:'150px'},
            { field: "mailt", title:"Mail", width:'150px'},
            { field: "celular", title:"Celular", width:'150px'},
            { field: "contrato", title:"Contrato", width:'150px'},
            { field: "lote", title:"Lote", width:'150px'},
            { field: "ref", title:"Ref", width:'150px'},
            { field: "aprobacion", title:"Aprobación", width:'150px'},
            { field: "adquiriente", title:"adquiriente", width:'150px'},
            { field: "marcatc", title:"Marca TC", width:'150px'},
            { field: "anos", title:"Años", width:'150px'},
            { field: "plus", title:"Plus", width:'150px'},
            { field: "total", title:"Total", width:'150px'},
            { field: "pinicial", title:"Pago_inicial", width:'150px'},
            { field: "gadm", title:"Gastos Adm.", width:'150px'},
            { field: "creditodir", title:"Credito Dir.", width:'150px'},
            { field: "tc", title:"TC cliente", width:'150px'},
            { field: "linerb", title:"Liner", width:'200px'},
            { field: "closer1b", title:"Closer1", width:'200px'},
            { field: "closer2b", title:"Closer2", width:'200px'},
            { field: "admsalab", title:"Adm.Sala", width:'200px'},
            { field: "gersalab", title:"Ger.Sala", width:'200px'},
            { field: "efectividad", title:"Efectividad", width:'175px'},
            { field: "observacion", title:"Observación", width:'175px'},
            { field: "usreg", title:"User_Reg.",width:"225px"},
            { field: "fecha_registro", title:"Fecha_Reg.",width:"225px"},
            { field: "usact", title:"User_Act.",width:"225px"},
            { field: "fecha_actualizar", title:"Fecha_Act.",width:"225px"},
            
            
        ],
	}).data("kendoGrid");
	
	
});

          
//////////////////////

function nuevo(jerarquia){
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Registrar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "manifiestog.php",
	  width:"1000px",
	height:"640px",
	  deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}

function editar(e) {  
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Editar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "manifiestog.php?id="+e,
	  	  width:"1000px",
		  height:"640px",
	      deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}
function editarn(a){
    document.location.href='manifiestog.php?id='+a
    //window.open('manifiestog.php?id='+a,'_blank');
    
}
function eliminar(e) {
  if (confirm('Desea Eliminar este registro?')) {   
      $.ajax({
        async: false,
        type: "GET",
        url: 'php/delete.php',
        data: {id:'manifiesto',ide:e},
        success: function(response) {
            if (response!='') {
              alert (response);
            } else{		  	
              var grid = $("#grid").data("kendoGrid");
              grid.dataSource.read()	
            }
        },
      });
  }
}
//////////////////////

</script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
