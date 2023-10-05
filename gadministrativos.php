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
                            <h2> GASTOS ADMINISTRATIVOS   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                                <div class="col-md-6">
                                    <div>
                                          <label for="Liner">Liner </label>
                                        <input id="liner" type="text"  name="Liner" placeholder="5"   /> 

                                    </div>
                                    <div>
                                          <label for="Closer">Closer </label>
                                        <input id="closer" type="text"  name="Closer" placeholder="5"   /> 

                                    </div>
                                    <div>
                                          <label for="ccenter">Call Center </label>
                                        <input id="ccenter" type="text"  name="ccenter" placeholder="5"   /> 

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                          <label for="Liner">Papeleria </label>
                                        <input id="papeleria" type="text"  name="papeleria" placeholder="5"   /> 

                                    </div>
                                    <div>
                                          <label for="Closer">Adm. Sala </label>
                                        <input id="admsala" type="text"  name="admsala" placeholder="5"   /> 

                                    </div>
                                    <div>
                                          <label for="ccenter">Empresa </label>
                                        <input id="empresa" type="text"  name="empresa" placeholder="5"   /> 

                                    </div>
                                </div>
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
           

</script>
      <script>

$( "#buscarbal" ).click(function() {
   if ($("#feci").val()=='' || $("#fecf").val()=='') {
       alert ("Debe llenar los campos de fecha")
       return;
   }
   var gridd = $("#gridd").data("kendoGrid");
   gridd.dataSource.transport.options.read.data= {id:'gadministrativo',feci:$("#feci").val(),fecf:$("#fecf").val()}
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
				data:{id:"gadministrativo"}
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
			{ field: "recaudado", title:"Recaudado", width:'105px'},
            { template: "#:calcga(recaudado,'liner')#", title:"Liner", width:'105px'},
            { template: "#:calcga(recaudado,'closer')#", title:"Closer", width:'105px'},
            { template: "#:calcga(recaudado,'ccenter')#", title:"Call Center", width:'105px'},
            { template: "#:calcga(recaudado,'papeleria')#", title:"Papeleria", width:'105px'},
            { template: "#:calcga(recaudado,'admsala')#", title:"Adm. Sala", width:'175px'},
            { template: "#:calcga(recaudado,'empresa')#", title:"Empresa", width:'175px'},
			
            
           
        ],
        
	}).data("kendoGrid");
	
   
    
	
});

          
function calcga(a,b){
    c=a/50
    c=c*$("#"+b).val()
    if (c>0){
        return c
    } else {
        return ''
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
 