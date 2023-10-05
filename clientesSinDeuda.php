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
        .k-widget.k-tooltip{ background-color: #f5b623}
        .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .k-grid th.k-header{
            border-right: solid;
    border-color: #e6e3e3 !important;
    border-right-width: 1px !important;
        }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      <script src="vendors/jszip.js"></script>
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
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
                    <h3>Clientes sin deuda</h3>
                <div id="grid" style="height:500px"></div>
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
<button class="k-button" style="min-width:40px" onClick="window.open('htrabajog2.php?id=#=idhtrabajo#','_blank')"><i class='fa fa-file'></i></button>
    </script>
      
      
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
				data:{id:"clientesSinDeuda"}
			},				
		},
        pageSize: 75,
        
        
		schema: {				
			model: {
				id:"idactividad",
                fields: {
                        fecha: { type: "date" },
                    fecha_registro: { type: "date" },
                    inversion: {type:"number"},
                    vinicial: {type:"number"}
                        
                    }
				
			}
								
		}
	});	  
  

	$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
		pageable:true,
		filterable:true, 
        resizable:true,
		toolbar: ["excel",],
        
		excel: {
            fileName: "clientesSinDeuda.xlsx",
			      proxyURL: "excel/",
            filterable: true,
            allPages: true
        },
		detailTemplate: kendo.template($("#template").html()),
        detailInit: detailInit,
		columns: [
			{ template: kendo.template($("#command-template2").html()), width:'55px'},
             
            { field: "codigo", title:"Contrato", width:'75px'},
            { field: "titular1", title:"Titular1", width:'225px'},
            { field: "titular2", title:"Titular2", width:'225px'},
            { field: "fecha", title:"Fecha", width:'125px',template:"#= kendo.toString(data.fecha,'dd-MM-yyyy')#"},
            { field: "inversion", title:"Inversión", width:"105px"},
            { field: "vinicial", title:"Inicial",width:"105px"},
            { field: "oficina", title:"Oficina", width:"185px"},
            { field: "usreg", title:"User_Reg.",width:"225px"},
            { field: "fecha_registro", title:"Fec_Reg.", width:'125px',template:"#= kendo.toString(data.fecha,'dd-MM-yyyy')#"},
            { field: "usact", title:"User_Act.",width:"225px"},
            { field: "fecha_actualiza", title:"Fec_Act.", width:'145px',template:"#= kendo.toString(data.fecha_actualizar,'dd-MM-yyyy')#"},

            { field: "tmail", title:"Email", width:"105px",hidden:true, exportable: { excel: true}},
            { field: "ttelefonos", title:"Telefonos", width:"105px",hidden:true, exportable: { excel: true}},
            { field: "direccion", title:"Direccion", width:"105px",hidden:true, exportable: { excel: true}},
            { field: "gastoadm", title:"Gasto adm", width:"105px",hidden:true, exportable: { excel: true}},
            { field: "observacion", title:"Observacion", width:"105px",hidden:true, exportable: { excel: true}},
            
        ],
	}).data("kendoGrid");
	
  var exportFlag = false;
$("#grid").data("kendoGrid").bind("excelExport", function (e) {
    if (!exportFlag) {
        e.sender.showColumn('tmail');
        e.sender.showColumn('ttelefonos');
        e.sender.showColumn('direccion');
        e.sender.showColumn('gastoadm');
        e.sender.showColumn('observacion');
  
        e.preventDefault();
        exportFlag = true;
        setTimeout(function () {
            e.sender.saveAsExcel();
        });
    } else {
        e.sender.hideColumn('tmail');
        e.sender.hideColumn('ttelefonos');
        e.sender.hideColumn('direccion');
        e.sender.hideColumn('gastoadm');
        e.sender.hideColumn('observacion');
        exportFlag = false;
    }
});
 






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
                    data:{id:"novedadcont",idc:e.data.idhtrabajo}
                },	

              },
            
            pageSize:3,
        },
        scrollable: false,
        sortable: true,
        pageable: true,
        toolbar: [{ 'name': 'create', template: '<button type="button" class="k-button" onClick="nuevo(\''+e.data.idhtrabajo+'\',this)">Agregar</a>' }],
        columns: [
            { template: "<button type='button' onClick='eliminar(#:  data.idnovedades_contrato#,this)'>Eliminar</button>", width:'55px'},
            { field: "novedad", title:"Novedad", width: "600px",encoded:false,attributes: {
              style: 'white-space: nowrap;height:35px; position:absolute;width:600px '
            }  },
            { field: "fecha_creacion", title:"Fecha", width: "110px" },
            //{ field: "usuario_registro", title:"Usuario" },
            
        ]
    });
            
          
    griddm.kendoTooltip({
      filter: "td:nth-child(2)", //this filter selects the second column's cells
      position: "right",
      content: function(e){
        //var dataItem = griddm.dataItem(e.target.closest("tr"));
          console.log(e.target.closest("tr").context.innerHTML)
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
	  content: "novedad.php?id="+jerarquia,
	  width:"500px",
	height:"400px",
	  deactivate: function() {
		  var grids = $(i).parent().parent().data("kendoGrid");
          console.log(grids)
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
	  title: "Visualizar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "htrabajog.php?id="+e,
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
function eliminar(e) {
    
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'contrato',ide:e},
	success: function(response) {
		if (response!='') {
		  alert (response);
		} else{		  
            var grid = $("#grid").data("kendoGrid");
		      grid.dataSource.read()
            //gridd=$(i).parent().parent().parent().parent().parent().data("kendoGrid")
		  	//gridd.dataSource.read()
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
