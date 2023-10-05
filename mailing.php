<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
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
	.k-grid td {    border-top: 1px solid #ddd; background:#FFFFFF00; cursor:pointer}
	.k-grid th.k-header { font-weight:bold  }
        label{width:120px}
         input{width:200px}
         .form input {
            min-width: 60%;
            display: inline-block;
        }
        .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
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
                <ul id="panelbar">
                <li class="k-state-active">
                    Listados
                    <div class="contentgrid">
                        <select id="listados">
                            <option>Importados</option>
                            <option>Clientes</option>
                        </select><p></p><br>
                        <div class="contentgridin">
                        <div id="grid" style="height:250px; width:550px"></div><p></p>
                        <div id="grid2" style="height:250px; width:350px"></div>
                            </div>
                    </div>
                </li>
                <li>
                    Asunto
                    <div class="contentgrid">
                        <input type="text" id="asunto" class="k-textbox" style="width:100%" />
                    </div>
                </li>
                <li>
                    Cuerpo del mail
                    <div class="contentgrid">
                        <button type="button" class="k-button" onclick='imagenesadd()'>Album de imagenes</button>
                        <p></p>
                        <textarea id="editor"></textarea>
                        <p></p>
                        <button type="button" onclick="enviar()" class="k-button" >Enviar</button>
                    </div>
                </li>
                
            </ul>
                </div>
            </div>
            
            
          </div>
        <!-- /page content -->
          <div id="editpaquete"></div>
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
<button class='customEdit'>My Edit</button>


<button class="k-button" style="min-width:40px" onClick="eliminar(#= idclientes_import#)"><i class='fa fa-trash'></i></button>
</script>
<script>

var onSelect = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    $.each(e.files, function(index, value) {
	  ok=[".xls",".xlsx",".XLS",".XLSX"]
      if($.inArray(value.extension,ok)==-1) {
        e.preventDefault();
        alert("Por favor cargue un archivo de Excel");
      }
    });
};
var onSuccess=function(e){
    var grid = $("#grid").data("kendoGrid");
    grid.dataSource.read()
}

function getFileInfo(e) {
	return $.map(e.files, function(file) {
		var info = file.name+'.'+file.extension;
		return info;
	}).join(", ");
}          

<!-- Initialize the Grid -->
$(document).ready(function () {	
    $("#listados").kendoDropDownList({
        change:function(e) {
            
            read=$("#grid").data("kendoGrid").dataSource.options.transport.read.data
            if (this.value()=='Clientes'){
                read.id="importmail2"
                $("#grid").data("kendoGrid").dataSource.read()
                console.log(read)
            }
            
        }
    });
    
    $("#editor").kendoEditor({
        tools: [
            "viewHtml",
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "insertImage",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
        ]
    });
    $("#panelbar").kendoPanelBar({
        expandMode: "single"
    });
    
	
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"importmail"}
			},
            update: {
                url: crudServiceBaseUrl + "update.php",
                dataType: "json",
                type: "POST",
                 data:{id:"import"}
            },
            destroy: {
                url: crudServiceBaseUrl + "delete.php",
                dataType: "json",
                data:{id:"import"}
            },
				
		},
        
        schema: {
            model: {
                id: "idclientes_import",
                
            }
        }
		
	});	
    
	var grid =$("#grid").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource,
        //groupable: true,
		//pageable:true,
		filterable:true,             
		//editable: "inline",
        selectable:"multiple",
		toolbar:"<button type='button' onclick='addg()' class='k-button'>Agregar</button>",
		columns: [
            { field: "nombre", title:"Nombre", width:'150px'},
            { field: "provincia", title:"Provincia",width:"60px"},
            { field: "ciudad", title:"Ciudad",width:"60px"},
        ],
	}).data("kendoGrid");
    dataSource2 = new kendo.data.DataSource({
		data: [
            
          ]
		
	});
    
    var grid2 =$("#grid2").kendoGrid({
        scrollable:true,
         sortable: true,
		dataSource: dataSource2,
        //groupable: true,
		//pageable:true,
		filterable:true,             
		//editable: "inline",
        toolbar:"<button type='button' onclick='limpiar()' class='k-button'>Limpiar</button>",
        selectable:"multiple",
		
		columns: [
            { field: "nombre", title:"Nombre", width:'150px'},
           { field: "mail", title:"Mail", width:'150px'},
        ],
	}).data("kendoGrid");
	
    
	
});

          
//////////////////////

function addg(){
    var grid = $("#grid").data("kendoGrid");
    var rows =grid.select()
    datai=new Array()
    rows.each(function(e) {
        var grid = $("#grid").data("kendoGrid");
        var dataItem = grid.dataItem(this);
        
        addr= {mail:dataItem.mail,nombre:dataItem.nombre}
        datai.push(dataItem)
        //console.log(dataItem);
        //var grid2 = $("#grid2").data("kendoGrid");
        //grid2.dataSource.add(dataItem)
    })
    
    
    var grid2 = $("#grid2").data("kendoGrid");
    grid2.dataSource.data().push.apply(grid2.dataSource.data(),datai)
    console.log(grid2.dataSource.data())
    //grid2.dataSource.add(datai)
    
}


function limpiar(){
    var grid2 = $("#grid2").data("kendoGrid");
    grid2.dataSource.data([])
}

function eliminar(e) {
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'import',ide:e},
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

function imagenesadd(jerarquia){
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Album",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "albumi.php",
	  width:"640px",
	height:"500px",
	  deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}
//////////////////////

function enviar(){
    var grid2 = $("#grid2").data("kendoGrid").dataSource._data;
    if (grid2.length<=0){
        alert("Debe escoger los destinatarios");
        return;
    }
    if ($("#asunto").val()==""){
        alert("Debe seleccionar el asunto");
        return;
    }
    var mails="";
    for (i=0;i<grid2.length;i++){
        if (i<(grid2.length-1))   mails+=grid2[i].mail+","
        else mails+=grid2[i].mail
        
    }
    $.ajax({
        async: false,
        type: "POST",
        url: 'php/correomandrill.php',
        data: {mensaje:$("#editor").data("kendoEditor").value(),asunto:$("#asunto").val(),mail:mails},
        success: function(response) {
            console.log(response)
            if (response==""){
                alert("El mail fué enviado correctamente.")
                document.location.reload()
            } else {
                alert("Hubo un problema durante el envio")
            }
        },
    });
}
</script>
      <script src="js/valid.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  <style>
      
      .contentgrid{
        padding: 30px !important;
        position: relative !important;
         
    }
      .contentgridin{
        display: inline-flex
         
    }
      .contentgridin #grid{
        margin-right: 15px
         
    }
      
    </style>
</html>
