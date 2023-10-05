<?php
session_start();
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['Imagen2']='jpg.png';
if ($_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();
$query="select * from htrabajo where idhtrabajo=".$_GET["id"]."";
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
    
    <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
     <style>
	
.errormsg {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
    border:1px solid #f2c779;
    background:#fff8c4
}
         label{width:120px}
         input{width:200px}
         .form input {
    min-width: 60%;
    display: inline-block;
}


        .k-grid-toolbar span {
            padding-right: 60px;
            font-size: 15px;
            
         }
         
    </style>
      <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
          .k-grid td{
            white-space: nowrap;
            text-overflow: ellipsis;
        }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
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
            
            <form>
            <div class>
            <div class="clear-fix"></div>
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Datos del Contrato                   </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table style="width:100%">
                          <tr>
                              <td>
                                  <div>
                                      <label for="ofi">Oficina (*)</label>
                                    <input id="ofi" type="text" placeholder="Oficina (*)" name="Oficina" required value="<?php echo $rowd['oficina']; ?>"  /> 

                                  </div>
                              </td>
                              <td>
                                  <div>
                                      <label for="cod">Codigo (*)</label>
                                <input id="cod" type="text"  placeholder="Codigo" name="Codigo" required value="<?php echo $rowd['codigo']; ?>"  /> 

                                  </div>
                              </td>
                              <td>
                                  <div style="margin-left:15px">
                                      <label for="fecha">Fecha (*)</label>
                                <input id="fecha" type="text"  name="Fecha" placeholder="Fecha (*) yyyy-mm-dd"  value="<?php echo $rowd['fecha']; ?>"  /> 

                                  </div>
                              </td>
                          </tr>
                        </table>
                        <table style="width:100%"> 
            <tr>
                <td>
                   <center><h5 style="margin:0px">Titular 1</h5></center>
           <div>
               <label for="nomt1">Nombres (*)</label>
                <input id="nomt1"  placeholder="Nombres (*)" type="text" name="NombresT1" required value="<?php echo $rowd['tnombres']; ?>"  /> 
                
            </div>
            <div>
                <label for="apet1">Apellidos (*)</label>
                <input id="apet1" type="text"  placeholder="Apellidos (*)" name="ApellidosT1" required value="<?php echo $rowd['tapellidos']; ?>"  /> 
                
            </div>
            <div>
                <label for="cedt1">Cedula (*)</label>
                <input id="cedt1" type="text" name="CedulaT1"  placeholder="Cedula (*)" required value="<?php echo $rowd['tced']; ?>"  /> 
                
            </div>
            <div>
                <label for="mailt1">Mail (*)</label>
                <input id="mailt1" type="text" name="MailT1"  placeholder="Mail (*)" required value="<?php echo $rowd['tmail']; ?>"  /> 
                
            </div>
            <div>
                <label for="telt1">Telefonos (*)</label>
                <input id="telt1" type="text" name="TelefonosT1"  placeholder="Telefonos (*)" required value="<?php echo $rowd['ttelefonos']; ?>"  /> 
                
            </div>
                    </td>
                <td>
                    <center><h5 style="margin:0px">Titular 2</h5></center>
           <div>
               <label for="nomt1">Nombres (*)</label>
                <input id="nomt2" type="text" name="NombresT2"  placeholder="Nombres (*)" required value="<?php echo $rowd['tnombres2']; ?>"  /> 
                
            </div>
            <div>
                <label for="apet2">Apellidos (*)</label>
                <input id="apet2" type="text" name="ApellidosT2"  placeholder="Apellidos (*)" required value="<?php echo $rowd['tapellidos2']; ?>"  /> 
                
            </div>
            <div>
                <label for="cedt2">Cedula (*)</label>
                <input id="cedt2" type="text" name="CedulaT2"  placeholder="Cedula (*)" required value="<?php echo $rowd['tced2']; ?>"  /> 
                
            </div>
            <div>
                <label for="mailt1">Mail (*)</label>
                <input id="mailt2" type="text" name="MailT2"  placeholder="Mail (*)" required value="<?php echo $rowd['tmail2']; ?>"  /> 
                
            </div>
            <div>
                <label for="telt2">Telefonos (*)</label>
                <input id="telt2" type="text" name="TelefonosT2"  placeholder="Telefonos (*)" required value="<?php echo $rowd['ttelefonos2']; ?>"  /> 
                
            </div>
                    </td>
            </tr>
            </table>
                        <div class="form">
                            <div>
                                <label for="dir">Direccion (*)</label>
                                <input id="dir" type="text" name="Dirección"  placeholder="Dirección (*)" required value="<?php echo $rowd['direccion']; ?>"  /> 

                            </div>
                            <div>
                                <label for="inversion">Inversión Total (*)</label>
                                <input id="inversion" type="text" name="Inversión"  placeholder="Inversión Total (*)" required isdecimal value="<?php echo $rowd['inversion']; ?>"  /> 

                            </div>
                            <div>
                                <label for="inicial">Pago Inicial (*)</label>
                                <input id="inicial" type="text" name="Inicial"  placeholder="Pago Inicial (*)" required isdecimal value="<?php echo $rowd['vinicial']; ?>"  /> 

                            </div>
                            <!--<div>
                                <label for="inicialp">Inicial Pactado (*)</label>
                                <input id="inicialp" type="text" name="Inicial_Pactado"  placeholder="Inicial Pactado (*)" required isdecimal value="<?php echo $rowd['vpactado']; ?>"  /> 

                            </div>-->
                            <div>
                               <label for="obs">Observaciones (*)</label>
                               <input id="obs" type="text" name="Observaciones"  placeholder="Observaciones (*)" required  value="<?php echo $rowd['observacion']; ?>" /> 

                            </div>

                        </div>
                    </div>
                </div>   
       
                <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Datos de la Factura                   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table style="width:100%">

                              <tr>
                                  <td>
                                      <div>
                                        <input id="nombref" type="text"  placeholder="Nombre (*)" name="Nombre factura" required  value="<?php echo $rowd['facnombre']; ?>"   /> 
                                        <label for="nombref">Nombre (*)</label>
                                      </div>
                                  </td>
                                  <td>
                                      <div>
                                        <input id="dirf" type="text" name="Dirección Factura"  placeholder="Dirección (*)" required  value="<?php echo $rowd['facdireccion']; ?>"   /> 
                                        <label for="dirf">Dirección (*)</label>
                                      </div>
                                  </td>
                                  </tr><tr>
                                  <td>
                                      <div>
                                    <input id="cedf" type="text" name="Cedula Factura"  placeholder="Cedula (*)"  required  value="<?php echo $rowd['faccedula']; ?>"  /> 
                                    <label for="cedf">Cedula (*)</label>
                                      </div>
                                  </td>
                                  <td>
                                      <div>
                                    <input id="telf" type="text" name="Telefono Factura"  placeholder="Telefono (*)" required  value="<?php echo $rowd['factel']; ?>"  /> 
                                    <label for="telf">Telefono (*)</label>
                                      </div>
                                  </td>
                                  </tr>
                              </table>
                        </div>
                    </div>
                </div>
                
                <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Vendedores    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <label>Asesor 1</label>
                            <div id="asesor1" style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Cerrador 1</label>
                            <div id="cerrador1"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Cerrador 2</label>
                            <div id="cerrador2"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Telemarketing</label>
                            <div id="tmk"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Supervisor de Telemarketing</label>
                            <div id="stmk"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Gerente Sala de Ventas</label>
                            <div id="gerven"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Supervisor Sala de Venta</label>
                            <div id="supven"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Director Comercial</label>
                            <div id="dircom"  style="width:400px" >
                
                              </div>
                        </div>
                        
                        <div class="x_content">
                            <label>Gerente de Marketing</label>
                            <div id="gmarketing"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Jefe</label>
                            <div id="jefe"  style="width:400px" >
                
                              </div>
                        </div>
                    </div>
                </div>
                <!-- Datos de pagos -->
                <?php if ($_GET["id"]){    ?>
                <div class>
                <div class="clear-fix"></div>  
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Datos de Pagos    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
                            
                          <div id="tabstrip">
                              <ul>
                                <li class="k-state-active">
                                        PAGO  
                                </li>
                                <li >
                                        HISTORIAL DE REFINANCIAMIENTOS  
                                </li>
                              </ul>
                          <?php 
                            
                          ?>
                              <div>
                          <table style="width:100%" id="addpago">
                          <tr>
                              <td colspan="5">
                                <center><h4 style="margin:0px">DIFERIR PENDIENTE</h4></center><p></p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <spam>Cuotas:</spam>
                                  <select id="cuotas"  style="width:70px">
                                      <?php for ($a=1;$a<61;$a++){ ?>
                                      <option><?php echo $a ?></option>
                                      <?php } ?>
                                  </select>
                              </td>

                              <td>
                                  <spam>Gracia:</spam>
                                  <select id="gracia" style="width:70px">
                                      <?php for ($a=0;$a<12;$a++){ ?>
                                      <option><?php echo $a ?></option>
                                      <?php } ?>
                                  </select>
                              </td>
                              <td>
                                  <spam>Día de pago:</spam>
                                  <select id="dia"  style="width:70px">
                                      <?php for ($a=1;$a<32;$a++){ ?>
                                      <option><?php echo $a ?></option>
                                      <?php } ?>
                                  </select>
                              </td>
                              <td style="padding:0px">
                                  <spam>Descripción</spam>
                                <input id="descripcion" type="text" name="Banco" style="padding-bottom:14px"  /> 


                              </td>

                              <td style="width:40px;padding-left:10px"><button class="k-button" id="gpago" type="button"> <i class="fa fa-save"></i> </button></td>
                          </tr>

                          </table>
                              <?php //} 
                                ?>
                                    <div id="grid"></div>
                              </div>
                              <div>
                                        <div id="grid2"></div>
                              </div>
                        </div>
                          
                                </div>
                              </div>
                        </div>
                
                <?php } ?>
            </div>
        </div>
                
                  
      
        </form>
          
      <div id="erroresmsgs"></div>
                
                <p></p>
                <?php if ($_GET["id"]){?>
                <button class="k-button" id="volver" onclick="window.close()" style="padding-top:5px">Volver</button> 
                <?php } else { ?>                
                <button class="k-button" id="guardar" style="padding-top:5px">Guardar y Continuar</button>
                <?php } ?>
                </td></tr></table>
    </div>
        
<script>
var onSelect = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    $.each(e.files, function(index, value) {
	  ok=[".jpg",".JPG",".jpeg",".JPEG",".gif",".GIF",".PNG",".png"]
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
$( "#guardar" ).click(function() {

  if (valid()==true){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'htrabajo',ofi:$("#ofi").val(),cod:$("#cod").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),inicialp:$("#inicialp").val(),obs:$("#obs").val(),nombref:$("#nombref").val(),asesor1:$("#asesor1").val(),cerrador1:$("#cerrador1").val(),cerrador2:$("#cerrador2").val(),gmarketing:$("#gmarketing").val(),dirf:$("#dirf").val(),cedf:$("#cedf").val(),telf:$("#telf").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                        document.location.href="htrabajog2.php?id="+res
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
});

$( "#gpago" ).click(function() {
    pagados = pendientef()

  if ($("#cuotas").val()!="" && $("#gracia").val()!="" && $("#descripcion").val()!=""){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'forma_pago',cuota:$("#cuotas").val(),dia:$("#dia").val(),gracia:$("#gracia").val(),descripcion:$("#descripcion").val(),saldo:($("#inversion").val()-$("#inicial").val()-pagados),contrato:'<?php echo $_GET["id"] ?>'},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        var grid = $("#grid").data("kendoGrid");
                         grid.dataSource.read()
                        $("#banco").val("")
                        $("#desmp").val("")
                        $("#monto").val("")
                        $("#fechamp").val("")
                        //$( "#addpago" ).hide();
                        
                        
		                 
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  } else {
      alert ("Debe llenar los campos de forma de pago")
  }
});
$(document).ready(function() {
    
   $("#tabstrip").kendoTabStrip({
       animation:{
           open:{
               effects:"fadeIn"
           }
       }
   });
    $("#fecha").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    
    $("#fechamp").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    var dataSourceddl = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"empleadossf"}
			},
				
		},		
	});	
    
    $("#asesor1").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#cerrador1").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#tmk").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#stmk").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#gerven").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#supven").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#dircom").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#jefe").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#cerrador2").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#gmarketing").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione.. (*)",
        dataSource: dataSourceddl,
    });
    $("#cuotas").kendoDropDownList();
    $("#gracia").kendoDropDownList();
    $("#dia").kendoDropDownList();
    $("#asesor1").data('kendoDropDownList').value("<?php echo $rowd['asesor1'] ?>");
    $("#cerrador1").data('kendoDropDownList').value("<?php echo $rowd['cerrador1'] ?>");
    $("#cerrador2").data('kendoDropDownList').value("<?php echo $rowd['cerrador2'] ?>");
    $("#gmarketing").data('kendoDropDownList').value("<?php echo $rowd['gersala'] ?>");
    $("#tmk").data('kendoDropDownList').value("<?php echo $rowd['telemarketing'] ?>");
    $("#stmk").data('kendoDropDownList').value("<?php echo $rowd['suptelemarketing'] ?>");
    $("#gerven").data('kendoDropDownList').value("<?php echo $rowd['gerenteventa'] ?>");
    $("#supven").data('kendoDropDownList').value("<?php echo $rowd['supervisorventa'] ?>");
    $("#dircom").data('kendoDropDownList').value("<?php echo $rowd['directorcomercial'] ?>");
    $("#jefe").data('kendoDropDownList').value("<?php echo $rowd['jefe'] ?>");
    
    
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"forma_pago",contrato:'<?php echo $_GET["id"] ?>'}
			},
            
		},	
        batch:true,
        schema: {
            model: {
                id: "idcontrato_pagos",
                fields: {
                    descripcion: {  editable: false },
                    
                    monto: { editable:false },                    
                    saldo: { editable:false },                    
                    banco: { editable:false },                    
                    fecha: { editable:false }
                }
            }
        }
	});	
    
    
    var grid =$("#grid").kendoGrid({
        scrollable:true,
        toolbar:"&nbsp",
		dataSource: dataSource,            
		edit: onEdit,
        detailTemplate: '<div class="grid"></div>',
        detailInit: detailInit,
		columns: [
			{ command: ["edit"], title: "&nbsp;", width: "125x" },
			{ field: "descripcion", title:"Descripcion", width:'150px'},
			{ field: "monto", title:"Monto", width:'80px'},
            { field: "banco", title:"Cuotas", width:'100px'},
            { field: "saldo", title:"Saldo", width:'100px',template:"#if (estado!='PENDIENTE'){# #: saldo# #} else {# #:monto# # }#"},
            { field: "fecha", title:"Fecha", width:"100px"},            
            { field: "estado", title:"Estado", width:"280px", editor: customEstado,template:"#if (estado=='PENDIENTE' ) {# <span style=\"color:red\">PENDIENTE</span># } else { # #=estado# # }#"},            
            
        ],
        save: function(e) {
            console.log(e)
            var idc=e.model.idcontrato_pagos
            $.ajax({
              type: "POST",
              url: 'php/update.php',
              data: {id:'cpendientes',idcontrato_pagos:idc,estado:e.model.estado,voucher:$("#vh"+idc).val(),abono:$("#abono"+idc).val(),monto:e.model.monto,models: JSON.stringify(e.model)},
              success: function(res){ 
                     alert ('Su registro ha sido grabado')
                        var grid = $("#grid").data("kendoGrid");
                         grid.dataSource.read()
              },	
              error: function() {  alert( "Ha ocurrido un error" );}  
            });
        },
        dataBound: function(e) {
            
            pagados= pendientef()
            
            $("#grid").children(".k-grid-toolbar").html("<span>Total:$<?php echo $rowd['inversion']; ?></span><span> Inicial:$<?php echo $rowd['vinicial']; ?> </span><span>Pendiente:$"+(<?php echo $rowd['inversion']; ?>-<?php echo $rowd['vinicial']; ?>-pagados)+"</span>")
        },
        editable:"inline"
	}).data("kendoGrid");
    
    dataSourceg2 = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"historial",contrato:'<?php echo $_GET["id"] ?>'}
			},
           
		},	
        
	});	
    
    var grid2 =$("#grid2").kendoGrid({
        scrollable:true,        
		dataSource: dataSourceg2,            		
        detailTemplate: '<div class="grid"></div>',
        detailInit: detailInit2,
		columns: [
			{ field: "usuario", title:"Usuario", width:'150px'},
			{ field: "fecha_registro", title:"Fecha", width:'80px'},
        ],
        
	}).data("kendoGrid");
});
function onEdit(e) {
    
}

function pendientef()
{
    pagados=0;
    data1=$("#grid").data("kendoGrid").dataSource.data()[0];
    console.log(data1);
    for (a=0;a<$("#grid").data("kendoGrid").dataSource.data().length;a++)
    {
        data=$("#grid").data("kendoGrid").dataSource.data()[a];
       
     
        
        //console.log(data.estado)
        if (data.estado=="PAGADO"){
            pagados+=parseFloat(data.monto)
        } else if (data.estado=="ABONO"){
            pagados+=parseFloat(data.monto-data.saldo)
        }
        
    }    
   
    return pagados    
}
function customEstado(container, options) {
    
    //if (options.model.estado=="PENDIENTE"){
        $('<input style="width:120px" required name="' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                dataTextField: "text",
                value:"PENDIENTE",
                dataValueField: "value",
                change: function(e) {
                    console.log(this.value())
                    if (this.value()=='ABONO'){
                        $("#abono"+options.model.idcontrato_pagos).css("display","block")
                    } else {
                        $("#abono"+options.model.idcontrato_pagos).val("")
                        $("#abono"+options.model.idcontrato_pagos).css("display","none")
                    }
                  },
                dataSource: [
                    { text: "PENDIENTE", value: "PENDIENTE" },
                    { text: "ABONO", value: "ABONO" },
                    { text: "PAGADO", value: "PAGADO" },]

            });
        $("<input type='text' class='abonot' id='abono"+options.model.idcontrato_pagos+"' style='display:none' placeholder='Cantidad a abonar' />")
            .appendTo(container)
        var conteup= $("<div class='contup'></div>").appendTo(container)
        $("<input id='vh"+options.model.idcontrato_pagos+"' type='hidden' />")
            .appendTo(container)
        
        if (options.model.voucher===null){
            $("<input name='archivo' id='voucher"+options.model.idcontrato_pagos+"'  type='file' />") 
                .appendTo(conteup)
                .kendoUpload({
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
                    success: function (e) {
                        $("#vh"+options.model.idcontrato_pagos).val(e.response.newName)
                        

                        //e.response.newName

                    },
                });
        } else {
            $("<a href='images/"+options.model.voucher+"' target='blank'>Ver Voucher</a>")
            .appendTo(container)
        }
        if (options.model.estado=='ABONO'){
            $("#abono"+options.model.idcontrato_pagos).css("display","block")
            $("#abono"+options.model.idcontrato_pagos).val(options.model.abono)
        }
    /*} else {
        $('<spam>PAGADO</spam>').appendTo(container)  
    }*/
}
function detailInit2(e) {
    var detailRow = e.detailRow;
    detailRow.find(".grid").kendoGrid({
        dataSource: {
            transport: {
			   read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"historialdet",idc:e.data.idcontrato_pagos}
                },
            },
        },
        columns: [
            { field: "descripcion", title:"Descripcion", width: "100px" },
            { field: "monto", title:"Monto", width: "100px" },
            { field: "fecha", title: "Fecha_pago", width: "100px" },
            { field: "fecha_registro", title:"Fecha" ,width:"150px"},
            { field: "usuario", title: "Usuario", width: "300px" },
            { field: "estadoe", title: "Estadoe", width: "100px" }
            
        ]
    });
}
function detailInit(e) {
    var detailRow = e.detailRow;
    detailRow.find(".grid").kendoGrid({
        dataSource: {
            transport: {
			   read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"cpendientesdet",idc:e.data.idcontrato_pagos}
                },
                
            },
            
            
            
        },
        scrollable: false,
        
        
        columns: [
            
            { field: "montoact", title:"Actual", width: "100px" },
            { field: "estado", title: "Estado", width: "100px" },
            { field: "fecha_registro", title:"Fecha" ,width:"150px"},
            { field: "usuario", title: "Usuario", width: "100px" },
            { field: "voucher", title: "Voucher",template:"#if (voucher!==null && voucher!=''){#<a href='images/#=voucher#' target='blank'>Ver</a>#}#", width: "100px" },
            { field: "abono", title: "Abono", width: "100px" }
        ]
    });
}
</script>
<script src="js/valid.js"></script>
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
<script id="command-template2" type="text/x-kendo-template">
<button class="k-button" style="min-width:40px" onClick="editar(#= idhtrabajo#)"><i class='fa fa-file'></i></button>
    </script>
<style>
    .abonot{
        margin-top: 10px;
    margin-bottom: 10px;
        
    }
</style>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
