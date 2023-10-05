<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php");
$rowd['Imagen2']='jpg.png';

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
.k-dropzone{
        margin-bottom: 0px;
    height: 22px;
    padding: 0px;
    width: 96px
        }
        .k-dropzone em{
         display: none
        }
        .k-upload{
            width: 93px
        }
        .k-dropzone strong{
         display: none
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
                            <h2> Registro    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            <form>
                                <div class="col-md-12">
                                  <div>
                                      <label for="vehiculo">Campaña (*)</label>
                                    <input id="campana" type="text" style="width:75%" name="Campaña" placeholder="Campaña" required value="<?php echo $rowd['idvehiculo']; ?>"  /> 
                                    
                                  </div> 
                                    <div>
                                    <label for="vehiculo">Preview (*)</label><br>
                                        <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload" type="file"/>
                                    </div><br>
                                    <img id="image" style="width:150px; display:inline-block" src="images/<?php echo $rowd['Imagen2'] ?>"> 
                                    <input type="hidden" readonly name="Preview" id="imagehidden" value="<?php echo $rowd['Imagen2'] ?>"><p></p>
                                    <br>
                                    </div>
                                    
                                    <div>
                                    <label for="archivo">Archivo (*)</label><br>
                                        <div class="uploaddiv2" style=" width:200px">
                                    <input name="archivo" id="upload2" type="file"/>
                                    </div><br>
                                    <div id="filemsj"></div>
                                    <input type="hidden" required id="imagehidden2" name="Archivo" value="<?php echo $rowd['Imagen2'] ?>">
                                    
                                    </div>
                                    <div style="margin-left:15px">
                                      <label for="fecha">Fecha inicial(*)</label>
                                <input id="fechai" type="text" required  name="Fecha" placeholder="Fecha (*) yyyy-mm-dd"  value="<?php echo $rowd['fecha_inicio']; ?>"  /> 

                                  </div>
                                    <div style="margin-left:15px">
                                      <label for="fecha">Fecha final(*)</label>
                                <input id="fechaf" type="text" required  name="Fecha" placeholder="Fecha (*) yyyy-mm-dd"  value="<?php echo $rowd['fecha_fin']; ?>"  /> 

                                  </div>
                                </div>
                                
                                

                                </form>  
                              <div id="erroresmsgs"></div>

                                        <p></p>
                                        <?php if ($_GET["id"]){?>
                                        <button class="k-button" id="updateb" style="padding-top:5px">Update</button>&nbsp;<button onclick="document.location.href='mantvehiculos.php'" class="k-button" style="padding-top:5px">Limpiar</button>
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
                            <h2> Artes   </h2>
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
<button class="k-button" style="min-width:40px" onClick="document.location.href='mantvehiculos.php?id=#= idvehiculos_mant#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="eliminar(#= idvehiculos_mant#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

 
$( "#updateb" ).click(function() {
  if (valid()==true){
    
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'mantvehiculos',vehiculo:$("#vehiculo").val(),pre:$("#imagehidden").val(),arte:$("#imagehidden2").val()},
	  success: function(){ 					
	  			alert ('Su registro fue actualizado')
				document.location.href='mantvehiculos.php'
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
          data: {id:'arte',campana:$("#campana").val(),fi:$("#fechai").val(),ff:$("#fechaf").val(),pre:$("#imagehidden").val(),arte:$("#imagehidden2").val()},
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
var onSelect2 = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    
};
var onSuccess2=function(e){
	$("#filemsj").html("Completado")
	$("#imagehidden2").val(e.response.newName)
}  
          
<!-- Initialize the Grid -->
$(document).ready(function () {	
    $("#fechai").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fechaf").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
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
    $("#upload2").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect2,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess2,
    });
    
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"artes"}
			},
				
		},
        pageSize: 50,
		
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
		pageable:true,
		filterable:true,
		columns: [
			//{ template: kendo.template($("#command-template").html()), width:'110px',locked:true},
			
			{ field: "campana", title:"Campaña", width:'250px'},
            { field: "preview", title:"Preview",width:'150px',
				template: "<div class='customer-photo'" +
								"style='background-image: url(images/#:data.preview#);'></div>"
							,
				
				width: 100
			},
            { field: "arte", title:"Arte", width:"175px",template:"<a href='images/#:data.arte#'>Descargar</a>"},
           { field: "usreg", title:"User_Reg.",width:"100px"},
            { field: "fecha_registro", title:"Fecha_Reg.",width:"100px"},
            
            
        ],
	}).data("kendoGrid");
	
    $("#grid").kendoTooltip({
        filter: "div.customer-photo", //this filter selects the first column cells
        position: "right",
        animation: {
            open: {
              effects: "slideIn:right",
              duration: 500
            },
            // passing reverse: true reverses the slideIn animation
            close: {
              effects: "slideIn:right",
              reverse: true,
              duration: 500
            }
          },
        content: function(e){            
            var dataItem = $("#grid").data("kendoGrid").dataItem(e.target.closest("tr"));            
            var content = '<img class="image" style="width:150px" src="images/'+dataItem.preview+'" />';
            return content
        }
    }).data("kendoTooltip");
    
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
    <style type="text/css">
        .customer-photo {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-size: 40px 40px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }
        

</style> 
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
