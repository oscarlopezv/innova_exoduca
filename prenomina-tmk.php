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
      <style>
      .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
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
                            <h2> PRENOMINA-TMK   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            
                                <div class="col-md-12">
                                    <div>
                                      <label for="feci" id="quincess">Quincena (*)</label>
                                    <select id="quince">
                                        <option>1</option>    
                                        <option>2</option>
                                    </select> 
                                    
                                  </div>
                                  
                                  <div>
                                      <label for="feci" id="messs">Mes (*)</label>
                                    <select id="mes">
                                        <option value="1">Ene</option>    
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Abr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Ago</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dic</option>
                                        
                                    </select> 
                                    
                                  </div>
                                    <div>
                                    <label for="feci" id="mm">Año (*)</label>
                                        
                                    <input type="text"  id="ano"  value="2018" placeholder='2018' />
                                    </div>
                                    <button id="buscarbal" class="k-button" > Buscar</button><p>
                                    <div id="gridd" style="width:100%;height:300px"></div>
                        </div>
                    </div>
                </div> 
                
            </div>
            
        <!-- /page content -->

        
      </div>
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
//<button type='button' onclick='cerrar()' class='k-button'>Cerrar Nomina</button>
$( "#buscarbal" ).click(function() {
   if ($("#ano").val()=='' ) {
       alert ("Debe llenar los campos ")
       return;
   }
    var mes=($("#mes").val()<=9)?'0'+$("#mes").val():$("#mes").val();
    fecha=''
    fecha=$("#ano").val()+'-'+mes+'-'+'01'
    
    
   if ($("#quince").val()==1){
       fechai=$("#ano").val()+'-'+mes+'-'+'01'
       fechaf=$("#ano").val()+'-'+mes+'-'+'15'
   } else {
       fechai=$("#ano").val()+'-'+mes+'-'+'16'
       fecha=$("#ano").val()+'-'+parseInt(mes)+'-'+'01'
       var date=new Date(fecha);
       
       var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
       fechaf=$("#ano").val()+'-'+mes+'-'+ultimoDia.getDate()
   }
    
   var gridd = $("#gridd").data("kendoGrid");
   gridd.dataSource.transport.options.read.data= {id:'comisiontmk',feci:fechai,fecf:fechaf}
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
				data:{id:"comisiontmk"}
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
            
        },
        autoBind:false,
        dataBound: function(e) {
            console.log(e);
        },
        scrollable:true,
         sortable: true,
		dataSource: dataSourceb,
        //groupable: true,
         excelExport: exportGridWithTemplatesContent,
        columnMenu: true,
		//pageable:true,
		filterable:true,
		columns: [
			
			{ field: "empleado", title:"Empleado", width:'225px'},
            { field:"idempleados",template: "#=comision(tmk,tipopago,mintmk,anotmk)#", title:"Comisión", width:'100px'},
            { field:"idempleados",template:"#= bono(fingreso,fsalida,sueldo)#",title:"Bono",width:"100px"},
            { field:"descuento",title:"Descuento",width:"100px"},
            { field:"adicional",title:"Adicional",width:"100px"},
            { field:"idempleados",template:"#= anosxmes(comisionmes)#",title:"AñoXmes",width:"100px"},
            { field:"idempleados",template:"#= bonoxc(anoxbono,ventasxbono)#",title:"BonoxCum.",width:"100px"},
            { field:"idempleados",template:"#= total(fingreso,fsalida,sueldo,tmk,descuento,adicional,comisionmes,anoxbono,ventasxbono)#",title:"Total",width:"100px"},
            
           
        ],
        
	}).data("kendoGrid");
	
   
    
	
});
function comision(a,b,c,d){
    
    if (a===null)  return ''
    min=d*c
    tmk=a
    if (b=="Fijo"){
        var tmk=a-min
    }
    tmk=(tmk<0)?'':tmk
    return tmk
}
function total(a,b,c,t,d,ad,cm,axb,vxb){
    
    tmk=(isNaN(parseFloat(t)))?0:parseFloat(t)
    desc=(isNaN(parseFloat(d)))?0:parseFloat(d)
    adi=(isNaN(parseFloat(ad)))?0:parseFloat(ad)
    var bonos=(isNaN(parseFloat(bono(a,b,c))))?0:parseFloat(bono(a,b,c))    
    var axm=(isNaN(parseFloat(anosxmes(cm))))?0:parseFloat(anosxmes(cm))
    var bxc=(isNaN(parseFloat(bonoxc(axb,vxb))))?0:parseFloat(bonoxc(axb,vxb))
    return tmk-desc+adi+bonos+axm+bxc
    
    
    
}
function bonoxc(a,b){
    if ($("#quince").val()==2){
        return ''
    }
    a=(a===null)?'':a
    b=(b===null)?'':b
    <?php
        $querybxc="Select * from bonostmk order by ano desc";
        $resultado = $dbh->prepare($query);
        $resultado->execute();
        $ano='';
        $venta='';
        $valor='';
        while ($rowxc=$resultado->fetch()){
           $ano.= $rowxc["ano"].',';
           $venta.= $rowxc["venta"].',';
           $valor.= $rowxc["valor"].',';
        }
        $ano=substr($ano,0,-1);
        $venta=substr($venta,0,-1);
        $valor=substr($valor,0,-1);
        
    ?>
    ano=[<?php echo $ano; ?>]
    venta=[<?php echo $venta; ?>]
    valor=[<?php echo $valor; ?>]
    vano=''
    vventa=''
    for (i=0;i<ano.length;i++){
        if (a>=ano[i]){
            vano= valor[i];
            break;
        }
    }
    for (i=0;i<venta.length;i++){
        if (b>=venta[i]){
            vventa= valor[i];
            break;
        }
    }
    if (vano>=vventa){
        return vano
    } else {
        return vventa
    }
}
function anosxmes(a){
    a=(a===null)?'':a
    if ($("#quince").val()==2){
        return a
    }
    return ''
}
function bono(fi,fs,sueldo){    
    var msecPerDay = ((1000 * 60) * 60) * 24;
    var gridd = $("#gridd").data("kendoGrid");
    var valordia=(sueldo/2)/15
    var feci=Date.parse(fi)
    var fecs=Date.parse(fs)
    var ficons= Date.parse(gridd.dataSource.transport.options.read.data.feci)
    var ffcons= Date.parse(gridd.dataSource.transport.options.read.data.fecf)
    inimenos=0
    salmenos=0
    if((feci <= ffcons && feci >= ficons)) {
        inimenos=feci-ficons
        inimenos=Math.floor(inimenos / msecPerDay );
        inimenos=inimenos*valordia
    }
    if((fecs <= ffcons && fecs >= ficons)) {
        salmenos=ffcons-fecs
        salmenos=Math.floor(salmenos / msecPerDay );
        salmenos=salmenos*valordia
    }
    return ((sueldo/2)-(inimenos+salmenos)).toFixed(2)
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
 