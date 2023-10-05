<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
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
          
          /* The Modal (background) */
.modal {
    display:none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
          
          
      </style>
  </head>

  <body class="nav-md">
      
      <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            
            <p>Cargando...</p>
          </div>

        </div>
      
      
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
                
                <div class="x_panel">
                        <div class="x_title">
                            <h2> NOMINA   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            
                                <div class="col-md-12">
                                    <div>
                                      <select id="options">
                                          <option selected disabled>Seleccione..</option>
                                        <?php 
                                            $query="select * from cierres_nomina order by idcierres_nomina desc";
                                            $resultado = $dbh->prepare($query);
                                            $resultado->execute();
                                            while ($rownom = $resultado->fetch()){
                                          ?>
                                            <option value="<?php echo $rownom["idcierres_nomina"]?>"><?php echo $rownom["fecha_inicio"]."-".$rownom["fecha_fin"] ?></option>
                                          <?php } ?>
                                      </select>
                                    
                                    </div>
                                   
                                    <p>
                                    <div id="gridd" style="width:100%;height:300px"></div>
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
<script type="text/x-kendo-template" id="toolbar">
           <a class="k-button k-button-icontext k-grid-excel" href="\#"><span class="k-icon k-i-excel"></span>Exportar a Excel</a>
</script>
      <script>

$( "#buscarbal" ).click(function() {
   if ($("#feci").val()=='' || $("#fecf").val()=='') {
       alert ("Debe llenar los campos de fecha")
       return;
   }
   var gridd = $("#gridd").data("kendoGrid");
   gridd.dataSource.transport.options.read.data= {id:'comision',feci:$("#feci").val(),fecf:$("#fecf").val()}
   gridd.dataSource.read()
})
       

<!-- Initialize the Grid -->
$(document).ready(function () {	
   $( "#options" ).change(function() {
       $("#gridd").data("kendoGrid").dataSource.options.transport.read.data.idc=$(this).val()
       $("#gridd").data("kendoGrid").dataSource.read()
    });
    
	
    dataSourceb = new kendo.data.DataSource({
		transport: {
			read:  {
				url:"php/read.php",
				dataType: "json",
				data:{id:"nomina",idc:0}
			},
           
				
		},
        
		/*
        aggregate: [ { field: "valor", aggregate: "sum",type:"decimal"  },  ],
         group: {
             field: "debcred", aggregates: [
                { field: "valor", aggregate: "sum",type:"decimal" },
                { field: "descripcion", aggregate: "count"},                
             ]
           },*/
	});	
    
	var grid =$("#gridd").kendoGrid({
        toolbar: kendo.template($("#toolbar").html()),
        excel: {
            fileName: "Nomina.xlsx",
			proxyURL: "excel/",
            filterable: true,
            allPages: true
        },
        
        autoBind:false,
        scrollable:true,
         sortable: true,
		dataSource: dataSourceb,
        //groupable: true,
         
        columnMenu: true,
		//pageable:true,
		filterable:true,
		columns: [
			
			{ field: "empleado", title:"Empleado", width:'275px'},
            
            { field:"liner",title:"Liner", width:'105px',template:"#= templatecol(liner) #"},
            { field:"closer1",template:"#= templatecol(closer1) #", title:"Closer1", width:'105px'},
            { field:"closer2",template:"#= templatecol(closer2) #",title:"Closer2", width:'105px'},            
            { field:"tmk",template:"#= templatecol(tmk) #",title:"Tmk", width:'105px'},
            { field:"suptmk",template:"#= templatecol(suptmk) #", title:"Sup. Tmk", width:'105px'},
            { field:"gerven",template:"#= templatecol(gerven) #", title:"Ger. Ven", width:'105px'},
            { field:"supven",template:"#= templatecol(supven) #", title:"Sup. Ven", width:'105px'},
            { field:"dircom",template:"#= templatecol(dircom) #",title:"Dir. Com.", width:'105px'},
            { field:"gertmk",template:"#= templatecol(gertmk) #",title:"Ger. Tmk", width:'105px'},
            { field:"jefe",template:"#= templatecol(jefe) #",title:"Jefe", width:'105px'},
            
            {  title:"Total",template: function(data) {
                                total=kendo.parseFloat(data.line)+kendo.parseFloat(data.closer1)+kendo.parseFloat(data.closer2)+kendo.parseFloat(data.tmk)+kendo.parseFloat(data.suptmk)+kendo.parseFloat(data.gerven)+kendo.parseFloat(data.supven)+kendo.parseFloat(data.dircom)+kendo.parseFloat(data.gertmk)+kendo.parseFloat(data.jefe)
                               total=total.toFixed(2);
                                if (total==0){
                                    return '<span class="red">'+total+"</span>"
                                } else {
                                    return '<span class="blue">'+total+"</span>"
                                }
                                
                            }, width:'105px'},
            
            { field:"packs",template:"#= templatecol(packs) #", title:"Packs", width:'105px'},
            
            
           
        ],
        
	}).data("kendoGrid");
	
   
    
	
});

function cerrar(){
    var data = $("#gridd").data("kendoGrid").dataSource._data;
    if (data.length<=0) {
        alert ("Debe cargar datos a la tabla")
        return
    }
    $("#myModal").show()
    text="";
    for (i=0;i<data.length;i++){
        data[i].perase1=(data[i].perase1===null)?0:data[i].perase1;
        data[i].percer1=(data[i].percer1===null)?0:data[i].percer1;
        data[i].percer2=(data[i].percer2===null)?0:data[i].percer2;
        data[i].pertmk=(data[i].pertmk===null)?0:data[i].pertmk;
        data[i].perstmk=(data[i].perstmk===null)?0:data[i].perstmk;
        data[i].pergven=(data[i].pergven===null)?0:data[i].pergven;
        data[i].persven=(data[i].persven===null)?0:data[i].persven;
        data[i].perdcom=(data[i].perdcom===null)?0:data[i].perdcom;
        data[i].pergtmk=(data[i].pergtmk===null)?0:data[i].pergtmk;
        data[i].perjefe=(data[i].perjefe===null)?0:data[i].perjefe;
        text+="('"+data[i].apellidos.trim()+" "+data[i].nombres.trim()+"','"+data[i].perase1+"','"+data[i].percer1+"','"+data[i].percer2+"','"+data[i].pertmk+"','"+data[i].perstmk+"','"+data[i].pergven+"','"+data[i].persven+"','"+data[i].perdcom+"','"+data[i].pergtmk+"','"+data[i].perjefe+"',%id%),"
    }
    text=text.substr(0,text.length-1)
    console.log(text)
    $.ajax({
        type: "POST",
        url: 'php/cerrar.php',
        data: {text:text},
        success: function(response) {
            $("#myModal").hide()
            if (response!='') {
              console.log (response);
            } else{		  	
              
              alert ("Nomina cerrada correctamente")	
            }
        },
    });
}

var templatecol = function (val) {
    if (val==0){
        return '<span class="red">'+val+"</span>"
    } else {
        return '<span class="blue">'+val+"</span>"
    }
}  
//////////////////////

//////////////////////+

function exportGridWithTemplatesContent(e){
    var dataSource = e.sender.dataSource;
    var gridColumns = e.sender.columns;
    var sheet = e.workbook.sheets[0];
    var visibleGridColumns = [];
    var columnTemplates = [];
    var dataItem;
    // Create element to generate templates in.
    var elem = document.createElement('div');

    // Get a list of visible columns
    for (var i = 0; i < gridColumns.length; i++) {
      if (!gridColumns[i].hidden) {
        visibleGridColumns.push(gridColumns[i]);
      }
    }

    // Create a collection of the column templates, together with the current column index
    for (var i = 0; i < visibleGridColumns.length; i++) {
      if (visibleGridColumns[i].template) {
        columnTemplates.push({ cellIndex: i, template: kendo.template(visibleGridColumns[i].template) });
      }
    }

    // Traverse all exported rows.
    for (var i = 1; i < sheet.rows.length; i++) {
      var row = sheet.rows[i];
      // Traverse the column templates and apply them for each row at the stored column position.

      // Get the data item corresponding to the current row.
      var dataItem = dataSource.at(i - 1);
      for (var j = 0; j < columnTemplates.length; j++) {
        var columnTemplate = columnTemplates[j];
        // Generate the template content for the current cell.
        elem.innerHTML = columnTemplate.template(dataItem);
        if (row.cells[columnTemplate.cellIndex] != undefined)
          // Output the text content of the templated cell into the exported cell.
          row.cells[columnTemplate.cellIndex].value = elem.textContent || elem.innerText || "";
      }
    }
}

</script>
      <script src="js/valid.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
 