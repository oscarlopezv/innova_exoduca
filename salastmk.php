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
      .k-state-selected{
                color: #edf5f4;
            background-color: #2b3f56;
                
        }
        .k-state-selected td{
            background: #ffffff00 !important
                
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
                            <h2> Salas   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            
                                <div class="col-md-6">
                                  <div>
                                    <div id="gridtmk" style="height:150px"></div>  
                                    
                                  </div>  
                                  
                            
                            
                        </div>
                    </div>
                    <div class="x_title">
                        <h2> Asignación Diaria de Telemercadeo </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        <label style="width:auto">Supervisor de Mercadeo:</label>
                        <div id="suptmk" style="width:400px"></div>
                        <p></p>
                        <div style="display:flex">
                            <div id="grid" style="height:300px;width:400px;margin-right:50px"></div>
                            <div id="grid2" style="height:300px;width:400px"></div>
                        </div>
                        <p></p>
                        

                    </div>
                        <p></p>
                    <div class="x_title">
                        <h2> Asignación Diaria de Llamadas </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        
                        
                        <div>
                            <div id="provlist" ></div>
                            <div id="ciulist" ></div>
                            <input type="text" id="cantlist" placeholder="90" />
                            <div id="numlist" ></div>
                            
                        </div>
                        <p></p>
                        
                        
                        
                        <button type="button" class="k-button" onclick="asignar()">Asignar</button>

                    </div>
                </div>
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
<script id="command-template" type="text/x-kendo-template">
<button class="k-button" style="min-width:40px" onClick="document.location.href='empleados.php?id=#= idempleados#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="editar(#= idempleados#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

<!-- Initialize the Grid -->
$(document).ready(function () {	
    
     function onChange(arg) {
        
        var selectedItem = gridtmk.dataItem(this.select());
        console.log(selectedItem.idsalastmk);
        $.ajax({
        async: false,
        type: "GET",
        url: 'php/read.php',
        data: {id:'salasd',ide:selectedItem.idsalastmk},
        success: function(response) {
                var grid2 = $("#grid2").data("kendoGrid");
                grid2.dataSource.data([])
                var gridcall2 = $("#gridcall2").data("kendoGrid");
                gridcall2.dataSource.data([])
                $("#suptmk").data('kendoDropDownList').value("")
                var myJSON = JSON.parse(response);
                $("#suptmk").data('kendoDropDownList').value(myJSON[0].supervisor)
                console.log(myJSON[0].supervisor)
                explode=myJSON[0].tmks.split(",")
                var filter = $("#grid").data("kendoGrid").dataSource.data().filter(function(element) {
                  if ( explode.includes(element.idempleados)){
                      return true
                  } else {
                      return false
                  }
                });

                grid2.dataSource.data().push.apply(grid2.dataSource.data(),filter)
            
                //calls
                calls=myJSON[0].calls.split(",")
                var filtercalls = $("#gridcall").data("kendoGrid").dataSource.data().filter(function(element) {
                  if ( calls.includes(element.idclientes_import)){
                      return true
                  } else {
                      return false
                  }
                });

                gridcall2.dataSource.data().push.apply(gridcall2.dataSource.data(),filtercalls)

            },
        }); 
        
    }
    
    
	var crudServiceBaseUrl = "php/",
	dataSourcetmk = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"salastmk"}
			},	
		},
	});	
    
	var gridtmk =$("#gridtmk").kendoGrid({
		dataSource: dataSourcetmk,
        selectable:"row",
        change:onChange,
        toolbar:"<input type='text' id='nomsala' class='k-text' placeholder='Nombre de la Sala'/><button type='button' class='k-button' onclick='salac()'>Guardar</button>",
		columns: [
			//{ template: kendo.template($("#command-template").html()), width:'110px',locked:true},
			{ field: "nombre", title:"Sala", width:'225px'}, 
        ],
	}).data("kendoGrid");
     
    
    
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"empleados"}
			},
				
		},
		
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
        sortable: true,
        selectable: "multiple",
		dataSource: dataSource,
        toolbar:"<button type='button' class='k-button' onclick='addg()'>Añadir</button>",
		filterable:true,
		columns: [
			{ field: "apellidos", title:"Empleado",template:"#=apellidos# #=nombres#", width:'300px'},
            { field: "tipoempleado", title:"Puesto",width:"225px"},
        ],
	}).data("kendoGrid");
    
    
    var crudServiceBaseUrl = "php/",
	dataSource2 = new kendo.data.DataSource({
		data: [
            
          ]
		
	});	
    
	var grid2 =$("#grid2").kendoGrid({
        scrollable:true,
        sortable: true,
        
		dataSource: dataSource2,
		filterable:true,
		columns: [
			{ field: "apellidos", title:"Empleado",template:"#=apellidos# #=nombres#", width:'300px'},
            { field: "tipoempleado", title:"Puesto",width:"225px"},
        ],
	}).data("kendoGrid");
    
    dataSource2call = new kendo.data.DataSource({
		data: []
		
	});	
    
	var gridcall2 =$("#gridcall2").kendoGrid({
        scrollable:true,
        sortable: true,
        
		dataSource: dataSource2call,
		filterable:true,
		columns: [
			{ field: "nombre", title:"nombre", width:'300px'},
            { field: "provincia", title:"Provincia",width:"225px"},
        ],
	}).data("kendoGrid");
	$("#suptmk").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Supervisor de Mercadeo(*)",
        dataSource: {
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"empleadossf"}
                },
            }
        }
    });
    var provlist=$("#provlist").kendoDropDownList({
        dataTextField: "provincia",
        dataValueField: "provincia",
        optionLabel: "Provincia",
        select: onSelectprov,
        dataSource: {
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"provlist"}
                },
            }
        }
    });
    
    $("#ciulist").kendoDropDownList({
        autoBind: false,
        cascadeFrom: "provlist",
        optionLabel: "Ciudad",
        dataTextField: "ciudad",
        dataValueField: "ciudad",
        select: onSelectciu,
        dataSource: {
            serverFiltering: true,
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"ciulist"}
                },
            }
        }
    }).data("kendoDropDownList");
    
	
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
function salac(){
  if ($("#nomsala").val()!="") {   
      $.ajax({
        async: false,
        type: "POST",
        url: 'php/crear.php',
        data: {id:'salastmk',nombre:$("#nomsala").val()},
        success: function(response) {
            
              	  	
              var grid = $("#gridtmk").data("kendoGrid");
              grid.dataSource.read()	
            $("#nomsala").val("")
        },
      });
  } else {
      alert ("Debe llenar el campo de nombre")
  }
}
function addg(){
    var grid = $("#grid").data("kendoGrid");
    var rows =grid.select()
    datai=new Array()
    rows.each(function(e) {
        var grid = $("#grid").data("kendoGrid");
        var dataItem = grid.dataItem(this);
        
        addr= {idempleados:dataItem.tipoempleado,tipoempleado:dataItem.tipoempleado,apellidos:dataItem.apellidos,nombres:dataItem.nombres}
        var found = $("#grid2").data("kendoGrid").dataSource.data().find(function(element) {
          return element===dataItem;
        });
        if (found===undefined){
            datai.push(dataItem)
        }
        //console.log(dataItem);
        //var grid2 = $("#grid2").data("kendoGrid");
        //grid2.dataSource.add(dataItem)
    })
    
    
    var grid2 = $("#grid2").data("kendoGrid");
    grid2.dataSource.data().push.apply(grid2.dataSource.data(),datai)
    //console.log(grid2.dataSource.data())
    //grid2.dataSource.add(datai)
    
}
function addgcall(){
    var gridcall = $("#gridcall").data("kendoGrid");
    var rows =gridcall.select()
    
    datai=new Array()
    rows.each(function(e) {
        var gridcall = $("#gridcall").data("kendoGrid");
        var dataItem = gridcall.dataItem(this);
        
        
        var found = $("#gridcall2").data("kendoGrid").dataSource.data().find(function(element) {
          return element===dataItem;
        });
        if (found===undefined){
            datai.push(dataItem)
        }
        //console.log(dataItem);
        //var grid2 = $("#grid2").data("kendoGrid");
        //grid2.dataSource.add(dataItem)
    })
    
    
    var grid2call = $("#gridcall2").data("kendoGrid");
    
    grid2call.dataSource.data().push.apply(grid2call.dataSource.data(),datai)
    
    //console.log(grid2.dataSource.data())
    //grid2.dataSource.add(datai)
    
}
var calllist;
function onSelectprov(e) {
    var dataItem = e.dataItem;
    console.log(e.dataItem.provincia) 
    $.ajax({
        async: false,
        type: "POST",
        url: 'php/read.php',
        data: {id:"importmailcall2",prov:e.dataItem.provincia},
        success: function(response) {
            calllist=JSON.parse(response)
            
            $("#numlist").html(calllist[0].num+" Clientes disponibles")
        },
    });
};
function onSelectciu(e) {
    var dataItem = e.dataItem;
    console.log(e)
    $.ajax({
        async: false,
        type: "POST",
        url: 'php/read.php',
        data: {id:"importmailcall3",prov:$("#provlist").val(),ciu:e.dataItem.ciudad},
        success: function(response) {
            calllist=JSON.parse(response)
            
            $("#numlist").html(calllist[0].num+" Clientes disponibles")
        },
    });
};

function asignar(){
    var gridtmk = $("#gridtmk").data("kendoGrid");
    var selectedItem = gridtmk.dataItem(gridtmk.select());
    if (selectedItem===null){
        alert("Debe seleccionar una sala");
        return;
    }
    var grid2 = $("#grid2").data("kendoGrid").dataSource._data;
    if (grid2.length<=0){
        alert("Debe añadir empleados de Telemarketing");
        return;
    }
    
    if ($("#cantlist").val()<=0){
        alert("Debe añadir datos al listado de llamadas");
        return;
    }
    if ($("#suptmk").val()==""){
        alert("Debe seleccionar un supervisor");
        return;
    }
    var tmks="";
    for (i=0;i<grid2.length;i++){
        if (i<(grid2.length-1))   tmks+=grid2[i].idempleados+","
        else tmks+=grid2[i].idempleados
        
    }
    var calls="";
    
    $.ajax({
        async: false,
        type: "POST",
        url: 'php/crear.php',
        data: {id:"salasd",sala:selectedItem.idsalastmk,tmks:tmks,sup:$("#suptmk").val(),numcall:$("#cantlist").val(),prov:$("#provlist").val()},
        success: function(response) {
            console.log(response)
            if (!isNaN(response)){
                alert("Registro correcto.")
                document.location.reload()
            } else {
                alert("Hubo un problema durante el envio")
            }
        },
    });
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
