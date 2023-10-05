<?php
session_start();
include_once("php/validarpermisos.php");
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['Imagen2']='jpg.png';
if ($_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();

$query="select * from inventario where idinventario=".$_GET["id"]."";
$resultado = $dbh->prepare($query);
$resultado->execute();
$rowd=count($resultado->fetch());
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
        
	.k-grid tr, .k-grid td { border:0px;  }
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
.contactado{
    font-weight: bold;
    color: #731bbf;
        }
        
	</style>
      <script src="vendors/jszip.js"></script>
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
      
<audio id="soundmess"  preload="auto" >
    <source src="face.mp3" />
</audio>
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
                            <h2> Clientes Raspadita   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                                <div class="col-md-12">
                                    Fecha Inicial:<input type="text" id="fechai">
                                    Fecha Final:<input type="text" id="fechaf"><p></p>
                                    <button type="button" id="buscar">Buscar</button>
                                    <div id="grid" style="height:300px"></div>
                            
                            
                                </div>
                        </div>
                    </div>
            
            
                
            </div>
        <!-- /page content -->
        </div>
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
<script id="command-template" type="text/x-kendo-template">
<button class="k-button" style="min-width:40px" onClick="document.location.href='inventario.php?id=#= idinventario#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="eliminar(#= idinventario#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

 
$( "#buscar" ).click(function() {
  
    ds=$("#grid").data("kendoGrid").dataSource.options.transport.read.data
    ds.fechai=$("#fechai").val()
    ds.fechaf=$("#fechaf").val()
    $("#grid").data("kendoGrid").dataSource.read()
    
});        

<!-- Initialize the Grid -->
$(document).ready(function () {	
    
	$("#fechai").kendoDatePicker({       
        format: "yyyy-MM-dd",
        value: new Date(),
    });
    $("#fechaf").kendoDatePicker({       
        format: "yyyy-MM-dd",
        value: new Date(),
    });
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"detcalls",fechai:$("#fechai").val(),fechaf:$("#fechaf").val(),max:0}
			},
				
		},
        pageSize: 50,
		schema: {				
			model: {
				id:"iddetalle_calls",
				
			}
								
		}
	});	
    
	var grid =$("#grid").kendoGrid({
        toolbar: ["excel"],
        resizable: true,
        excel: {
            fileName: "detalle_calls.xlsx",
			proxyURL: "excel/",
            filterable: true,
            allPages: true
        },
        scrollable:true,
        sortable: true,
		dataSource: dataSource,
        //groupable: true,
		pageable:true,
		filterable:true,
		columns: [
            { field: "ntmk", title:"Tmk", width:'150px'},
            { field: "cliente", title:"cliente", width:'150px'},
            { field: "concretado", title:"Concretado", width:'150px'},
            { field: "fecha_registro", title:"fecha", width:'150px'},
            { field: "lugar", title:"lugar", width:"200px"},
            { field: "dir", title:"Direccion",width:"100px"},
            { field: "nmesa", title:"Mesa",width:"100px"},
            { field: "tarjeta", title:"Tarjeta",width:"100px"},
            { field: "btarjeta", title:"Banco-tarjea",width:"100px"},
            { field: "creserva", title:"Cod.res.",width:"100px"},
            { field: "acom", title:"Acompañante",width:"100px"},
            { field: "ecivil", title:"Estado-Civil",width:"100px"},
            { field: "hreserva", title:"Hora res.",width:"100px"},
            { field: "edad", title:"Edad",width:"100px"},
            { field: "motivo_no_concretado", title:"Motivo",width:"100px"},
            { field: "file", title:"Audio", width:'100px',template:"#if (file!=''){#<a href='records/#:file#'>Audio</a>#}#"},
            { field: "nsup", title:"Sup. Act",width:"100px"},
            { field: "file", title:"Audio", width:'100px',template:"#if (file!=''){#<a href='records/#:filenew#'>Audio</a>#}#"},
            { field: "automatic", title:"Automatico",width:"100px"},
            
            
        ],
	}).data("kendoGrid");
	
    $("#estado").kendoDropDownList();
   var defaultTools = kendo.ui.Editor.defaultTools;
    defaultTools["insertParagraph"].options.shift = true;
     $("#com").kendoEditor({  
        content: true,

    });
    
    setInterval(actualizar , 6000);

	
});
function contactado(i,e){
    //$(e).parent().html("asds")
    
    
    $.ajax({
        async: false,
        type: "GET",
        url: 'php/update.php',
        data: {id:'concurso',ide:i},
        success: function(response) {
            if (response==""){
                $(e).parent().html("<span class='contactado'>Contactado</span>")
            } else {
                alert ("Error")
            }
        },
    });
}
          
function actualizar(){
    
    ds=$("#grid").data("kendoGrid").dataSource.options.transport.read.data
    fi=ds.fechai
    ff=ds.fechaf
    var arrayData = [];
    var data = $("#grid").data("kendoGrid").dataSource.data();
    for (i = 0; i < data.length; i++) {
        arrayData.push(data[i].idregistros_concurso);
    }
    if (data.length==0){
        max=0
    } else {
        max=Math.max.apply(null, arrayData);
    }
    
    $.ajax({
        async: false,
        type: "GET", 
        url: 'php/read.php',
        data: {id:'maxconcurso',fechai:fi,fechaf:ff},
        success: function(response) {            
            response=JSON.parse(response)
            maxserver=response[0].max;
            if (maxserver==null){
                console.log("nulo")
            }
            if (maxserver>max && maxserver!==null){
                
                $.ajax({
                    async: false,
                    type: "GET",
                    url: 'php/read.php',
                    data: {id:'maxconcurso2',max:max,fechai:fi,fechaf:ff},
                    success: function(response2) {
                        //$("#soundmess")[0].load()
                        $("#soundmess").volume=10
                        $("#soundmess")[0].currentTime = 0
                        $("#soundmess")[0].play()
                        
                        response2=JSON.parse(response2)
                        
                        for (i=0;i<response2.length;i++){
                            
                            $("#grid").data("kendoGrid").dataSource.insert(0,response2[i])
                        }                       
                    },
                });
                /*
                $("#soundmess")[0].play()
                $("#soundmess")[0].currentTime = 0;
                var grid = $("#grid").data("kendoGrid");
		        grid.dataSource.read()
                */                
            }
        },
    });
    
}
          
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
	  content: "empleadosg.php",
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
function eliminar(e) {
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'inventario',ide:e},
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
      <script src="js/valid.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
