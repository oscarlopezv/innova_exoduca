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
    <script src="vendors/jszip.js"></script>
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
       .k-tabstrip{
                  margin-top: 80px;
          }
        

	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
      
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
      <style>
      input[type=text] {
    text-transform: none;
}
          .x_content{ padding: 0px }
          .x_panel{ padding: 0px}
          .col-md-12{ padding-left: 3px}
          .k-autocomplete{ margin-top: 0px}
          .k-dropdown{ margin-top: 0px}
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
            <div id="tabstrip">
                <ul>
                    <li class="k-state-active">Balance</li>
                    <li>Plan de Cuentas</li>
                </ul>
            <div class>
                <div class="x_panel">
                        <div class="x_title">
                            <h2> Registro   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            
                                <div class="col-md-12">
                                    <form >
                                  <div>
                                      <label for="cuenta">Cuenta (*)</label>
                                    <input id="cuenta" type="text" name="Cuenta" style="width:500px" placeholder="Cuenta (*)" required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                    
                                    <div>
                                      <label for="desb">Descripcion (*)</label>
                                    <input id="desb" type="text" name="Descripcion" placeholder="Descripcion (*)"  style="width:500px" required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                    <div>
                                      <label for="desb">Valor (*)</label>
                                    <input id="valor" type="text" name="Valor" placeholder="Valor (*)"   required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                 <div>
                                      <label for="fecha">Fecha (*)</label>
                                    <input id="fecha" type="text" name="Fecha" placeholder="Fecha (*)"   required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                <div>
                                      <label for="dc">Debito/Credito (*)</label>
                                    <select id="dc">
                                        <option>Debito</option>
                                        <option>Credito</option>
                                    </select> 
                                    
                                  </div>
                                  <button type="button" class="k-button" id="guardar">Guardar</button>
                                        <div id="erroresmsgs"></div>
                            </form>
                        </div>
                    </div>
                </div> 
                <div class="x_panel">
                        <div class="x_title">
                            <h2> Balance   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            
                                <div class="col-md-12">
                                    <div>
                                      <label for="feci">Fecha Inicial (*)</label>
                                    <input id="feci" type="text" name="Fecha Inicio" placeholder="Fecha Inicial (*)"   required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                    <div>
                                      <label for="fecf">Fecha Final (*)</label>
                                    <input id="fecf" type="text" name="Fecha Final" placeholder="Fecha Final (*)"   required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                    <button id="buscarbal" class="k-button"> Buscar</button><p>
                                    <div id="gridd"></div>
                        </div>
                    </div>
                </div> 
                
            </div>
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
                        <div class="x_content" >
                            
                                <div class="col-md-6">
                                  <div>
                                      <label for="cod">Codigo (*)</label>
                                    <input id="cod" type="text" name="Codigo" placeholder="Codigo (*)" required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                    
                                    <div>
                                      <label for="des">Descripcion (*)</label>
                                    <input id="des" type="text" name="Descripcion" placeholder="Descripcion (*)" required value="<?php echo $rowd['nombres']; ?>"  /> 
                                    
                                  </div>
                                  <button type="button" class="k-button" id="guardarp">Guardar</button>
                            
                        </div>
                    </div>
                </div>
            
            
            <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Plan de Cuentas    </h2>
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
            
            
                </div></div></div>
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
<button class="k-button" style="min-width:40px" onClick="document.location.href='balance.php?id=#= idplan_cuentas#&est=pc'"><i class='fa fa-edit'></i></button>

    </script>
      <script>

$( "#buscarbal" ).click(function() {
    var gridd = $("#gridd").data("kendoGrid");
                        
   
   gridd.dataSource.transport.options.read.data= {id:'balancef',feci:$("#feci").val(),fecf:$("#fecf").val()}
    
     gridd.dataSource.read()
})
$( "#updateb" ).click(function() {
  if (valid()==true){
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'empleado',nom:$("#nom").val(),ape:$("#ape").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:ddl.text(),idpe:ddl.value(),idp:'<?php echo $_GET["id"] ?>'},
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
      
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'balance',cod:$("#cuenta").val(),desb:$("#desb").val(),valor:$("#valor").val(),fecha:$("#fecha").val(),dc:$("#dc").val()},
          success: function(res){ 
                    if (res.length<10){
                        alert ('Su registro ha sido grabado')
                       // document.location.reload()
                        var gridd = $("#gridd").data("kendoGrid");
                         gridd.dataSource.read()
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
    
});   
$( "#guardarp" ).click(function() { 
 
  if (valid()==true){
      
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'planc',cod:$("#cod").val(),des:$("#des").val()},
          success: function(res){ 
                    if (res.length<10){
                        alert ('Su registro ha sido grabado')
                       // document.location.reload()
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
    $("#fecha").kendoDatePicker({       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#feci").kendoDatePicker({       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fecf").kendoDatePicker({       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#cuenta").kendoAutoComplete({
    dataTextField: "cuenta",
    filter: "contains",
    minLength: 3,
    dataSource: {        
        serverFiltering: true,
        transport: {
			read:  {
				url:"php/read.php",
				dataType: "json",
				data:{id:"cuenta"}
			},            	
		},
    }})
	$("#tabstrip").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    });
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"plancuenta"}
			},
            update:  {
				url: crudServiceBaseUrl+"update.php",
				dataType: "json",
				data:{id:"plancuenta"},
                type: "POST",
			},
				
		},
        pageSize: 100,
		schema: {
            model: {
                id: "idplan_cuentas",
                
            }
        }
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
         editable: "inline",
        
		pageable:true,
		filterable:true,
		columns: [
			{ command: ["edit"], title: "&nbsp;", width: "200px" },
			{ field: "codigo", title:"Codigo", width:'225px'},
            { field: "descripcion", title:"Descripcion", width:'600px'},
           
        ],
	}).data("kendoGrid");
    dataSourceb = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"balance"}
			},
            update:  {
				url: crudServiceBaseUrl+"update.php",
				dataType: "json",
				data:{id:"balance"},
                type: "POST",
			},
				
		},
        pageSize: 100,
		schema: {
            model: {
                id: "idbalance",
                fields: {
                    codigo: { editable: false },
                    valor: {type:"number"}
                    
                }
                
            }
        },
        aggregate: [ { field: "valor", aggregate: "sum",type:"decimal"  },  ],
         group: {
             field: "debcred", aggregates: [
                { field: "valor", aggregate: "sum",type:"decimal" },
                { field: "descripcion", aggregate: "count"},                
             ]
           },
	});	
    
	var grid =$("#gridd").kendoGrid({
        toolbar: ["excel"],
        excel: {
            fileName: "balance.xlsx",
			proxyURL: "excel/",
            filterable: true
        },
        scrollable:true,
         sortable: true,
		dataSource: dataSourceb,
        groupable: true,
         editable: "inline",
        
		pageable:true,
		filterable:true,
		columns: [
			{ command: ["edit"], title: "&nbsp;", width: "200px" },
			{ field: "codigo", title:"Codigo", width:'225px'},
            { field: "descripcion", title:"Descripcion", width:'200px'},
            { field: "valor", title:"Valor", width:'200px',aggregates: ["sum"],footerTemplate: conditionalSum,groupFooterTemplate: "Total: #= sum #"},
            { field: "debcred", title:"DEB/CRED", width:'100px'},
            { field: "fecha", title:"Fecha", width:'100px'},
            
           
        ],
        
	}).data("kendoGrid");
	
    $("#dc").kendoDropDownList();
    
	
});

          
function conditionalSum(e) {
    
    var data = $("#gridd").data("kendoGrid").dataSource.data();
    
    var sum = 0;
    
    for (var idx = 0; idx < data.length; idx++) {
      if (data[idx].debcred=='Debito'){
          sum+=parseFloat(data[idx].valor)
      } else if (data[idx].debcred=='Credito'){
          sum-=parseFloat(data[idx].valor)
      }
        
    }
    sum=parseFloat(sum).toFixed(2)
    console.log(parseFloat(sum).toFixed(2))
    return "Balance: "+sum;
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
 