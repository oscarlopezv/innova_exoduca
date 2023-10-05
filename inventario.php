<?php
session_start();
include_once("php/validarpermisos.php");
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
$rowd['Imagen2']='jpg.png';
if ($_GET["id"])
{
  $sql=new conectar();
  $sql->mysqlsrv();

  $query="select * from inventario where idinventario=".$_GET["id"]."";
  $resultado = $dbh->prepare($query);
  $resultado->execute(); 	
    

  $rowd=$resultado->fetch(); 
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
                            <h2> Registro de Activos    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" <?php if (!isset($_GET["id"])){?> style="display:none" <?php } ?>>
                            <form>
                                <div class="col-md-6">
                                  <div>
                                      <label for="name">Nombre (*)</label>
                                    <input id="nom" type="text" name="Nombres" placeholder="COMPUTADOR" required value="<?php echo $rowd['nombre']; ?>"  /> 
                                    
                                  </div>  
                                  <div>
                                      <label for="marca">Marca</label>
                                    <input id="marca" type="text" name="Marca"  placeholder="COMPAQ" required value="<?php echo $rowd['marca']; ?>"  /> 
                                    
                                  </div> 
                                  <div>
                                      <label for="dep">Departamento</label>
                                    <input id="dep" type="text" name="Departamento"  placeholder="VENTAS" required value="<?php echo $rowd['departamento']; ?>"  /> 
                                    
                                  </div> 
                                </div>
                                <div class="col-md-6">
                                  <div>
                                      <label for="fcompra">Fecha de compra</label>
                                    <input id="fcompra" type="text" name="Fecha"  placeholder="YYYY-MM-DD"  value="<?php echo $rowd['fecha_compra']; ?>"  /> 
                                    
                                  </div> 
                                  <div>
                                      <label for="modelo">Modelo</label>
                                    <input id="modelo" type="text" name="Modelo"  placeholder="N300"  value="<?php echo $rowd['modelo']; ?>"  /> 
                                    
                                  </div>
                                  <div>
                                      <label for="costo">Costo</label>
                                    <input id="costo" type="text" name="Costo"  placeholder="$200.00" required isdecimal value="<?php echo $rowd['costo']; ?>"  /> 
                                     
                                    
                                  </div>
                                </div>
                              <div class="col-md-12">
                                  <label>Estado</label>
                                <select id="estado" required>
                                    <option>ACTIVO</option>
                                    <option>BAJA</option>
                                </select>
                              </div>
                                <div class="col-md-12">
                                  <label>Comentarios</label>
                                    <textarea id="com" name="Comentarios"  style="width: 97%;height:80px" ><?php echo $rowd['comentario']; ?></textarea>
                              </div>

                                </form>  
                              <div id="erroresmsgs"></div>

                                        <p></p>
                                        <?php if ($_GET["id"]){?>
                                        <button class="k-button" id="updateb" style="padding-top:5px">Update</button>&nbsp;<button onclick="document.location.href='inventario.php'" class="k-button" style="padding-top:5px">Limpiar</button>
                                        <?php } else { ?>                
                                        <button class="k-button" id="guardar" style="padding-top:5px">Guardar</button>
                                        <?php } ?>
                            
                            
                        </div>
                    </div>
                </div>
            
            
            <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Inventario   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                                <div class="col-md-12">
                                  
                                <div id="grid" style="height:300px"></div>
                            
                            
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
<button class="k-button" style="min-width:40px" onClick="document.location.href='inventario.php?id=#= idinventario#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="eliminar(#= idinventario#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

 
$( "#updateb" ).click(function() {
  if (valid()==true){
    
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'inventario',nom:$("#nom").val(),fecha:$("#fcompra").val(),marca:$("#marca").val(),modelo:$("#modelo").val(),departamento:$("#dep").val(),costo:$("#costo").val(),estado:$("#estado").val(),com:$("#com").data("kendoEditor").value(),idp:'<?php echo $_GET["id"] ?>'},
	  success: function(){ 					
	  			alert ('Su registro fue actualizado')
				//document.location.reload()
				//document.location.reload()
			},	
	  error: function() {  alert( "Ha ocurrido un error" );}  
	});
  }
});
$( "#guardar" ).click(function() {
 
  if (valid()==true){
     
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'inventario',nom:$("#nom").val(),fecha:$("#fcompra").val(),marca:$("#marca").val(),modelo:$("#modelo").val(),departamento:$("#dep").val(),costo:$("#costo").val(),estado:$("#estado").val(),com:$("#com").data("kendoEditor").value()},
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

<!-- Initialize the Grid -->
$(document).ready(function () {		
    $('input[type="text"]').on("keypress", function () {
       $input=$(this);
       setTimeout(function () {
        $input.val($input.val().toUpperCase());
       },50);
    })
     
	$("#fcompra").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        
    });
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"inventario"}
			},
				
		},
        pageSize: 50,
		schema: {				
			model: {
				id:"idinventario",
				
			}
								
		}
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
		pageable:true,
		filterable:true,
		columns: [
			{ template: kendo.template($("#command-template").html()), width:'110px',locked:true},
			
			{ field: "nombre", title:"Nombre", width:'150px'},
            { field: "marca", title:"Marca", width:'150px'},
            { field: "modelo", title:"Modelo", width:"175px"},
            { field: "fecha_compra", title:"Fecha",width:"100px"},
            { field: "costo", title:"Costo", width:'100px'},
            { field: "estado", title:"Estado",width:"100px"},
            { field: "usreg", title:"User_Reg.",width:"100px"},
            { field: "fecha_registro", title:"Fecha_Reg.",width:"100px"},
            
            
        ],
	}).data("kendoGrid");
	
    $("#estado").kendoDropDownList();
   var defaultTools = kendo.ui.Editor.defaultTools;
defaultTools["insertParagraph"].options.shift = true;
     $("#com").kendoEditor({  
        content: true,

    });
	
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
