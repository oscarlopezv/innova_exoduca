<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['foto']='jpg.png';
if (@$_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();
$query="select * from empleados where idempleados=".$_GET["id"]."";
$resultado = $dbh->prepare($query);
$resultado->execute(); 	
	
$rowd = count($resultado->fetch());
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
      <script src="vendors/jszip.js"></script>
    
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
                            <h2> Registro   </h2>
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
                                      <label for="name">Nombres (*)</label>
                                    <input id="nom" type="text" name="Nombres" placeholder="Nombres (*)" required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>  
                                  <div>
                                      <label for="ape">Apellidos (*)</label>
                                    <input id="ape" type="text" name="Apellidos"  placeholder="Apellidos (*)" required value="<?php echo $rowd['apellidos']; ?>"  /> 
                                    
                                  </div> 
                                 <div>
                                      <label for="fingreso">Fecha Ingreso (*)</label>
                                    <input id="fingreso" readonly type="text" name="Fecha Ingeso"  placeholder="aaaa-mm-dd (*)" required value="<?php echo $rowd['fingreso']; ?>"  /> 
                                    
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div>
                                      <label for="mail">Mail (*)</label>
                                    <input id="mail" type="mail" name="Mail"  placeholder="Mail (*)" <?php if (!$_GET["id"]){?> ifexistemp <?php } ?>required value="<?php echo $rowd['mail']; ?>"  /> 
                                    
                                  </div> 
                                  <div>
                                      <label for="sueldo">Sueldo (*)</label>
                                    <input id="sueldo" type="text" name="Sueldo"  placeholder="Sueldo (*)" required isdecimal value="<?php echo $rowd['sueldo']; ?>"  /> 
                                    
                                  </div>
                                  <div>
                                      <label for="sueldo">Tipo de pago (*)</label>
                                    <select id="tpago" name='Tipo Pago'>
                                        <option <?php echo ($rowd['tipopago']!='Comisión' || $rowd['tipopago']!='Fijo')?'selected':'' ?> disabled>Seleccione...</option> 
                                        <option <?php echo ($rowd['tipopago']=='Comisión')?'selected':'' ?>>Comisión</option>  
                                        <option <?php echo ($rowd['tipopago']=='Fijo')?'selected':'' ?>>Fijo</option>
                                    </select> 
                                    
                                  </div>
                                    <div>
                                      <label for="codtmk">Cod. Tmk (*)</label>
                                    <input id="codtmk" type="text" name="codtmk"  placeholder="Cod Tmk" value="<?php echo $rowd['codtmk']; ?>"  /> 
                                    
                                  </div>
                                </div>
                                
                                
                              <div class="col-md-12">
                                  <label>Puesto</label>
                                <input id="tipoe" name="Puesto" required style="width: 97%" />
                              </div>
                                <div  class="col-md-12">
                                    <label for="vehiculo">Foto (*)</label><br>
                                        <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload" type="file"/>
                                    </div><br>
                                    <img id="image" style="width:150px; display:inline-block" src="images/<?php echo $rowd['foto'] ?>"> 
                                    <input type="hidden" readonly name="Preview" id="imagehidden" value="<?php echo $rowd['foto'] ?>"><p></p>
                                    <br>
                                    </div>
                                </form>  
                              <div id="erroresmsgs"></div>

                                        <p></p>
                                        <?php if ($_GET["id"]){?>
                                        <button class="k-button" id="updateb" style="padding-top:5px">Update</button>
                                        <?php } else { ?>                
                                        <button class="k-button" type="button" id="guardar" style="padding-top:5px">Guardar</button>
                                        <?php } ?>
                            
                            
                        </div>
                    </div>
                </div>
            
            
            <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Empleados    </h2>
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
	  data: {id:'empleado',codtmk:$("#codtmk").val(),nom:$("#nom").val(),ape:$("#ape").val(),tpago:$("#tpago").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:ddl.text(),idpe:ddl.value(),idp:'<?php echo $_GET["id"] ?>',foto:$("#imagehidden").val(),fingreso:$("#fingreso").val()},
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
          data: {id:'empleado',codtmk:$("#codtmk").val(),nom:$("#nom").val(), foto:$("#imagehidden").val(),ape:$("#ape").val(),tpago:$("#tpago").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:ddl.text(),idpe:ddl.value(),fingreso:$("#fingreso").val()},
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
    $("#fingreso").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fingreso").click(function() {
        var datepicker = $("#fingreso").data("kendoDatePicker");
        datepicker.open();
    });
	$("#upload").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess,
    });
   
      
     
    
    
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"empleados"}
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
        toolbar: ["excel"],
        excel: {
            fileName: "empleados.xlsx",
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
			{ template: kendo.template($("#command-template").html()), width:'110px',locked:true},
			
			{ field: "apellidos", title:"Apellidos", width:'225px'},
            { field: "nombres", title:"Nombres", width:'225px'},
            { field: "mail", title:"Mail", width:"225px"},
            { field: "tipoempleado", title:"Puesto",width:"225px"},
            { field: "foto", template:"#if (data.foto!==null){# <a href='images/#=data.foto#' target='blank'>Ver foto</a># } #", width:'100px'},
            { field: "sueldo", title:"Sueldo", width:'100px'},
            { field: "usreg", title:"User_Registro",width:"225px"},
            { field: "fecha_registro", title:"Fecha_Registro",width:"100px"},
            { field: "usact", title:"User_Act.",width:"225px"},
            { field: "fecha_actualiza", title:"Fecha_Act.",width:"100px"},
            
        ],
	}).data("kendoGrid");
	
    $("#tipoe").kendoDropDownList({
        dataTextField: "puesto",
        dataValueField: "idpuestos",
        optionLabel: "Cargo o Puesto (*)",
        dataSource: {
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"puesto"}
                },
            }
        }
    });
    $("#tipoe").data('kendoDropDownList').value("<?php echo $rowd['puestoid'] ?>");
	
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
