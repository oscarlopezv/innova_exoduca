<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['foto']='jpg.png';
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
      <style>
      .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
        }
      </style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
      <script src="vendors/jszip.js"></script>
    
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
                <div class="clear-fix"></div>  
                    
                </div>
            
            
            <div class>
                
                
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Descuentos    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form>
                            <div class="col-md-12">
                                <div>
                                      <label for="name">Empleado </label>
                                    <input required name="Empleado" id="empleados" style="width:500px" />
                                    
                                
                                </div>
                                <div>
                                    <label for="name">Valor</label>
                                    <input id="valor" isdecimal type="text" name="Valor" placeholder="Ej:10.00 (*)" required  />
                                </div>
                                <div>
                                    <label for="name">Fecha </label>
                                    <input type="text" name="Fecha" required id='fechai'>
                                
                                </div>
                                <div>
                                    <label for="name">Observación</label>
                                    <input id="obs" type="text" name="Observación" placeholder="Ej:Atraso (*)"  />
                                </div>
                                <div id="erroresmsgs"></div>
                                <button type="button" id="guardar">Guardar</button>
                            </div>
                                </form>
                            
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
<script id="command-template" type="text/x-kendo-template">
<button class="k-button" style="min-width:40px" onClick="document.location.href='empleados.php?id=#= idempleados#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="editar(#= idempleados#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

 
$( "#updateb" ).click(function() {
  if (valid()==true){
    var ddl = $("#tipoe").data("kendoDropDownList")
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'empleado',nom:$("#nom").val(),ape:$("#ape").val(),tpago:$("#tpago").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:ddl.text(),idpe:ddl.value(),idp:'<?php echo $_GET["id"] ?>',foto:$("#imagehidden").val(),fingreso:$("#fingreso").val()},
	  success: function(){ 			  		
	  			alert ('Su registro fue actualizado')
				document.location.reload()
				//document.location.reload()
			},	
	  error: function() {  alert( "Ha ocurrido un error" );}  
	});
  }
});
$( "#guardar" ).click(function() { 
 
  if (valid()==true){
     var ddl = $("#tipoe").data("kendoDropDownList");
      
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'descuentos',idem:$("#empleados").val(), valor:$("#valor").val(),fecha:$("#fechai").val(),obs:$("#obs").val()},
          success: function(res){ 
                    if (res.length<10){
                        alert ('Su registro ha sido grabado')
                        document.location.reload()
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
    
});          
var onSelect = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    $.each(e.files, function(index, value) {
	  ok=[".jpg",".JPG",".gif",".GIF",".PNG",".png"]
      if($.inArray(value.extension,ok)==-1) {
        e.preventDefault();
        alert("Por favor cargue un archivo tipo imagen");
      }
    });
};
var onSuccess=function(e){
	$("#image").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	$("#imagehidden").val(e.response.newName)
} 
<!-- Initialize the Grid -->
$(document).ready(function () {	
    $("#fechai").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    var dataSourceddl = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"empleadossf",idem:''}
			},
				
		},		
	});	
    $("#empleados").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
        change: function(e) {
            var gridd=$("#grid").data("kendoGrid").dataSource
            gridd.transport.options.read.data.idem=this.value()
            gridd.read()
            
            
            // Use the value of the widget
        }
    });
    
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"descuentos"}
			},
				
		},
         pageSize: 20,
		schema: {				
			model: {
				id:"idactividad",
				
			}
								
		}
	});	
    
	var grid =$("#grid").kendoGrid({
        
        autobind:false,
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
		//pageable:true,
		//filterable:true,
		columns: [
			//{ field: "empleado", title:"Empleado", width:'225px'},
            { field: "descuento", title:"Descuento", width:'155px'},
            { field: "fecha", title:"Fecha", width:"155px"},
            { field: "descripcion", title:"Observación",width:"225px"},
            { field: "usreg", title:"User_Reg.", width:"155px"},
            { field: "fecha_registro", title:"Fecha_Reg.", width:"155px"},
            
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
	  content: "empleadosg.php",
	  width:"700px",
	height:"300px",
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
	  title: "Salida",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "salidae.php?id="+e,
	  	  width:"600px",
		  height:"350px",
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
	data: {id:'empleado',ide:e},
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
