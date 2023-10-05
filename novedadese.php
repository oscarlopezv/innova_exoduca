<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['Imagen2']='jpg.png';
if ($_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();
$query="select * from empleados where idempleados=".$_GET["id"]."";
$resultado = $dbh->prepare($query);
$resultado->execute(); 	
	
	
$rowd=$resultado->fetch();>fetch());
}
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
        label{width:120px}
         input{width:200px}
         .form input {
    min-width: 60%;
    display: inline-block;
}
        .errormsg {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
    border:1px solid #f2c779;
    background:#fff8c4
}

	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
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
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Novedades a Empleados    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                                <div class="col-md-12">
                                  
                                <div id="grid" style="height:400px"></div>
                            
                            
                        </div>
                    </div>
                </div>
            
            
            </div></div>
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
<script type="text/x-kendo-template" id="template">
        <div id="det"></div>
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
				data:{id:"empleadosnov"}
			},
				
		},
        pageSize: 20,
		
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        groupable: true,
		pageable:true,
		filterable:true,
        detailTemplate: kendo.template($("#template").html()),
        detailInit: detailInit,
		columns: [
            { field: "novcount", title:"Novedades", width:'75px'},
			{ field: "apellidos", title:"Apellidos", width:'225px'},
            { field: "nombres", title:"Nombres", width:'225px'},
            { field: "mail", title:"Mail", width:"225px"},
            { field: "tipoempleado", title:"Puesto",width:"225px"},
            { field: "sueldo", title:"Sueldo", width:'100px'},
            { field: "fecha_registro", title:"Registro",width:"100px"},
        ],
	}).data("kendoGrid");
	
    
	
});


function detailInit(e) {
    var detailRow = e.detailRow;
/*
    detailRow.find(".tabstrip").kendoTabStrip({
        animation: {
            open: { effects: "fadeIn" }
        }
    });
*/
    
    var griddm=detailRow.find("#det").kendoGrid({
        dataSource: {
            transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"novedade",idc:e.data.idempleados}
			},	
            
		  },
            pageSize:3,
        },
        scrollable: false,
        sortable: true,
        pageable: true,
        toolbar: [{ 'name': 'create', template: '<button type="button" class="k-button" onClick="nuevo(\''+e.data.idempleados+'\',this)">Agregar</a>' }],
        columns: [
            { template: " <?php if ($_SESSION["usuario-permisos"]=='todos'){ ?>            <button type='button' onClick='eliminar(#:  data.idnovedades_empleados#,this)'>Eliminar</button>            <?php } ?>
             ", width:'95px'},
            { field: "novedad", title:"Novedad", width: "350px",encoded:false  },
            { field: "fecha_registro", title:"Fecha_Reg", width: "110px" },
            { field: "usreg", title:"User_Reg." },
            
        ]
    });
            
          
    griddm.kendoTooltip({
      filter: "td:nth-child(2)", //this filter selects the second column's cells
      position: "top",
      content: function(e){
        //var dataItem = griddm.dataItem(e.target.closest("tr"));
          
        //var content = dataItem.descripcion;
        return e.target.closest("tr").context.innerHTML;
      }
    }).data("kendoTooltip");
}             
//////////////////////

function nuevo(jerarquia,i){
    
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Novedad",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "novedadeg.php?id="+jerarquia,
	  width:"500px",
	height:"400px",
	  deactivate: function() {
		  var grids = $(i).parent().parent().data("kendoGrid");
          
            grids.dataSource.read()
		  this.destroy();                                                    
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}

function editar(e) {  
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Actualizar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "empleadosg.php?id="+e,
	  	  width:"700px",
		  height:"500px",
	      deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}
function eliminar(e,i) {
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'novedade',ide:e},
	success: function(response) {
		if (response!='') {
		  alert (response);
		} else{	
            
            gridd=$(i).parent().parent().parent().parent().parent().data("kendoGrid")
		  	gridd.dataSource.read()
		}
	},
  });
  }
}
//////////////////////

</script>
      <script src="js/valid.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
