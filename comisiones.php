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
                            <h2> COMISIONES   </h2>
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
           <button type='button' onclick='cerrar()' class='k-button'>Cerrar Nomina</button>

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
   
    $("#feci").kendoDatePicker({       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fecf").kendoDatePicker({       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    
	
    dataSourceb = new kendo.data.DataSource({
		transport: {
			read:  {
				url:"php/read.php",
				dataType: "json",
				data:{id:"comision"}
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
            fileName: "comisiones.xlsx",
			proxyURL: "excel/",
            filterable: true,
            allPages: true
        },
        excelExport: exportGridWithTemplatesContent,
        autoBind:false, 
        scrollable:true,
         sortable: true,
		dataSource: dataSourceb,
        //groupable: true,
         resizable:true,
        columnMenu: true,
		//pageable:true,
		filterable:true, 
		columns: [ 
			{ field: "idempleados", title:"Id", width:'50px',locked: true},
			{ field: "apellidos", title:"Empleado", width:'220px',locked: true,template:"#:apellidos+' '+nombres#"},
            //{ field: "nombres", title:"Nombres", width:'155px',locked: true},
             
            { field: "suma1",title:"Sum-ase1", width:'105px', hidden: true},
            { field: "perase1", title:"ase1", width:'105px'},
            { field: "sumc1",title:"Sum-cer1", width:'105px', hidden: true},
            { field: "percer1", title:"cer1", width:'105px'},
            { field: "sumc2",title:"Sum-cer2", width:'105px', hidden: true},
            { field: "percer2", title:"cer2", width:'105px'},
            { field: "sumtmk", title:"Sum-tmk", width:'105px', hidden: true},
            { field: "pertmk", title:"tmk", width:'105px'},
            { field: "peradmven", title:"Adm.Venta", width:'125px'},
            { field: "sumstmk", title:"Sum-SupTmk", width:'105px', hidden: true},
            { field: "perstmk", title:"SupTmk", width:'105px'},
            { field: "sumgven", title:"Sum-GerVen", width:'105px', hidden: true},
            { field: "pergven", title:"Gerven", width:'105px'},
            { field: "sumsven", title:"Sum-SupVen", width:'105px', hidden: true},
            { field: "persven", title:"SupVen", width:'105px'},
            { field: "sumdcom", title:"Sum-Dircom", width:'105px', hidden: true},
            { field: "perdcom", title:"Dircom", width:'105px'},
            { field: "sumgtmk", title:"Sum-GerTmk", width:'105px', hidden: true},
            { field: "pergtmk", title:"GerTmk", width:'105px'},
            { field: "sumjefe", title:"Sum-Jefe", width:'105px', hidden: true},
            { field: "perjefe", title:"Jefe", width:'105px'},
            /*{  field:"idempleados",title:"Total",template: function(data) {
                                total=kendo.parseFloat(data.perase1)+kendo.parseFloat(data.percer1)+kendo.parseFloat(data.percer2)+kendo.parseFloat(data.pertmk)+kendo.parseFloat(data.perstmk)+kendo.parseFloat(data.pergven)+kendo.parseFloat(data.persven)+kendo.parseFloat(data.perdcom)+kendo.parseFloat(data.pergtmk)+kendo.parseFloat(data.perjefe)
           //                   return total.toFixed(2);
            //                }, width:'105px'},*/
            { field: "idempleados", title:"Total", width:'120px',template:"#:total(data)#"},
            { field: "pack", title:"Packs", width:'105px'},
             { field: "sp0liner", title:"sp0liner", width:'105px'},
            { field: "sp0closer1", title:"sp0closer1", width:'105px'},
            { field: "sp0closer2", title:"sp0closer2", width:'105px'},
            { field: "sp0admv", title:"sp0admv", width:'105px'},
            { field: "spliner34", title:"spliner34", width:'120px',template:"#:calcspif(_spliner34,spliner34)#"},
            { field: "spliner57", title:"spliner57", width:'120px',template:"#:calcspif(_spliner57,spliner57)#"},
            { field: "spliner8", title:"spliner8", width:'120px',template:"#:calcspif(_spliner8,spliner8)#"},
            { field: "spcloser134", title:"spcloser1-34", width:'120px',template:"#:calcspif(_spcloser34,spcloser134)#"},
            { field: "spcloser157", title:"spcloser1-57", width:'120px',template:"#:calcspif(_spcloser57,spcloser157)#"},
            { field: "spcloser18", title:"spcloser1-8", width:'120px',template:"#:calcspif(_spcloser8,spcloser18)#"},
            { field: "spcloser234", title:"spcloser2-34", width:'120px',template:"#:calcspif(_spcloser34,spcloser134)#"},
            { field: "spcloser257", title:"spcloser2-57", width:'120px',template:"#:calcspif(_spcloser57,spcloser157)#"},
            { field: "spcloser28", title:"spcloser2-8", width:'120px',template:"#:calcspif(_spcloser8,spcloser18)#"},
            { field: "_bcliner1524", title:"Bcliner1524", width:'120px',template:"#:calcbxc(_bcliner1524,suma1,15,24,_vano)#"},
            { field: "_bcliner2529", title:"Bcliner2529", width:'120px',template:"#:calcbxc(_bcliner2529,suma1,25,29,_vano)#"},
            { field: "_bcliner30", title:"Bcliner30", width:'120px',template:"#:calcbxc(_bcliner30,suma1,30,10000000000,_vano)#"},
            
            { field: "_bccloser1524", title:"Bccloser1-1524", width:'120px',template:"#:calcbxc(_bccloser1524,sumc1,15,24,_vano)#"},
            { field: "_bccloser2529", title:"Bccloser1-2529", width:'120px',template:"#:calcbxc(_bccloser2529,sumc1,25,29,_vano)#"},
            { field: "_bccloser30", title:"Bccloser1-30", width:'120px',template:"#:calcbxc(_bccloser30,sumc1,30,10000000000,_vano)#"},
            
            { field: "_bccloser1524", title:"Bccloser2-1524", width:'120px',template:"#:calcbxc(_bccloser1524,sumc2,15,24,_vano)#"},
            { field: "_bccloser2529", title:"Bccloser2-2529", width:'120px',template:"#:calcbxc(_bccloser2529,sumc2,25,29,_vano)#"},
            { field: "_bccloser30", title:"Bccloser2-30", width:'120px',template:"#:calcbxc(_bccloser30,sumc2,30,10000000000,_vano)#"},
            
           { field: "_gsven5079", title:"BGerVenta-5079", width:'120px',template:"#:calcbxc(_gsven5079,sumgven,50,79,_vano)#"},
            { field: "_gsven80", title:"BGerVenta-80", width:'120px',template:"#:calcbxc(_gsven80,sumgven,80,10000000000,_vano)#"},
            
            { field: "bcdircom", title:"BCDirCom", width:'120px',template:"#:calcspif(bcdircom,_dircom50)#"},
            
           
        ],
        
	}).data("kendoGrid");
	
   
    
	
});

function total(data){
    /*+data.percer1+data.percer2+data.pertmk+data.perstmk+data.pergven+data.persven+data.perdcom+data.pergtmk+data.perjefe*/
    var total=(Number(data.perase1)+Number(data.percer1)+Number(data.percer2)+Number(data.pertmk)+Number(data.perstmk)+Number(data.pergven)+Number(data.persven)+Number(data.perdcom)+Number(data.pergtmk)+Number(data.perjefe))
    if (total>0){
        return total
    } else {
        return ''
    }
    
}
          
function calcbxc(a,sum,r1,r2,ano){
    b=sum/ano
    if (b>=r1 && b<=r2){
        return a
    } else {
        return ''
    }
    
}          
          
function calcspif(a,b){
    c=a*b
    if ((c)>0){
        return c
    } else {
        return ''
    }
}
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
        data[i].pack=(data[i].pack===null)?0:data[i].pack;
        text+="('"+data[i].apellidos.trim()+" "+data[i].nombres.trim()+"','"+data[i].perase1+"','"+data[i].percer1+"','"+data[i].percer2+"','"+data[i].pertmk+"','"+data[i].perstmk+"','"+data[i].pergven+"','"+data[i].persven+"','"+data[i].perdcom+"','"+data[i].pergtmk+"','"+data[i].perjefe+"',%id%,'"+data[i].pack+"'),"
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
      for (var cellIndex = 4; cellIndex < row.cells.length; cellIndex ++) {
          row.cells[cellIndex].format = "0.00"
      }
    }
}
          
//////////////////////

//////////////////////

</script>
      <script src="js/valid.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
 