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
         input{width:200px; color: #133f96}
         .form input {
    min-width: 60%;
    display: inline-block;
}


        
    </style>
      <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
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
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user-admin.png" alt=""><?php echo $_SESSION["usuario-name"] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="login.html"><i class="fa fa-cogs pull-right"></i> Settings</a></li>
                    
                    <li><a href="php/login-out.php?id=sign-out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
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
                                <input onkeypress="return false" id="fecha" type="text" required  name="Fecha" placeholder="Fecha (*) yyyy-mm-dd"  value="<?php echo $rowd['fecha']; ?>"  /> 

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
                <input id="mailt1" type="mail" name="MailT1"  placeholder="Mail (*)" required value="<?php echo $rowd['tmail']; ?>"  /> 
                
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
                <input id="nomt2" type="text" name="NombresT2"  placeholder="Nombres (*)"  value="<?php echo $rowd['tnombres2']; ?>"  /> 
                
            </div>
            <div>
                <label for="apet2">Apellidos (*)</label>
                <input id="apet2" type="text" name="ApellidosT2"  placeholder="Apellidos (*)"  value="<?php echo $rowd['tapellidos2']; ?>"  /> 
                
            </div>
            <div>
                <label for="cedt2">Cedula (*)</label>
                <input id="cedt2" type="text" name="CedulaT2"  placeholder="Cedula (*)"  value="<?php echo $rowd['tced2']; ?>"  /> 
                
            </div>
            <div>
                <label for="mailt1">Mail (*)</label>
                <input id="mailt2" type="mail" name="MailT2"  placeholder="Mail (*)"  value="<?php echo $rowd['tmail2']; ?>"  /> 
                
            </div>
            <div>
                <label for="telt2">Telefonos (*)</label>
                <input id="telt2" type="text" name="TelefonosT2"  placeholder="Telefonos (*)"  value="<?php echo $rowd['ttelefonos2']; ?>"  /> 
                
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
                                <label for="gadm">Gasto Adm.</label>
                                <input id="gadm" type="text" name="Gasto Adm."  placeholder="Gasto Administrativo "  isdecimal value="<?php echo $rowd['gastoadm']; ?>"  /> 

                            </div>
                            <div>
                                <label for="inicial">Pago Inicial (*)</label>
                                <input id="inicial" type="text" name="Inicial"  placeholder="Pago Inicial (*)" required isdecimal value="<?php echo $rowd['vinicial']; ?>"  /> 

                            </div>
                            <div>
                                <label for="pcomisionar">A Comisionar (*)</label>
                                <input id="pcomisionar" type="text" name="Comisionar"  placeholder="Pago a Comisionar (*)" required isdecimal value="<?php echo $rowd['pcomisionar']; ?>"  /> 

                            </div>
                            <!--<div>
                                <label for="inicialp">Inicial Pactado (*)</label>
                                <input id="inicialp" type="text" name="Inicial_Pactado"  placeholder="Inicial Pactado (*)" required isdecimal value="<?php echo $rowd['vpactado']; ?>"  /> 

                            </div>-->
                            <div>
                               <label for="obs">Observaciones (*)</label>
                               <input id="obs" type="text" name="Observaciones"  placeholder="Observaciones (*)" required  value="<?php echo $rowd['observacion']; ?>" /> 

                            </div>
                            <div>
                                <label for="vig">Vigencia (Años *)</label>
                                <select id='vig'>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    
                                </select>
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
                            <label>Administrativo de Sala de Venta</label>
                            <div id="admven"  style="width:400px" >
                
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
                
            </div>
                
                <div id="erroresmsgs"></div>
                
                <p></p>
                <?php if ($_GET["id"]){?>
                    <?php if ($_SESSION["usuario-permisos"]=='todos' || $_SESSION["usuario-puesto"]=='Administrativo') { ?>
                        <button class="k-button" type="button" id="update" style="padding-top:5px">Actualizar</button>
                    <?php } else { ?>
                        <button class="k-button" id="volver" onclick="document.location.href='htrabajo.php'" style="padding-top:5px">Volver</button> 
                    <?php } ?>
                    
                <?php } else { ?>                
                <button class="k-button" type="button" id="guardar" style="padding-top:5px">Guardar y Continuar</button>
                <?php } ?>
                <button class="k-button" type="button" id="update" style="padding-top:5px" onclick="window.close()">Volver</button>
                </td></tr></table>
      
                <p></p>
                
        </div>
                
                  
      
        </form>
          
      
      
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
                            
                          
                          <?php 
                         
                          $querypag="select * from contrato_pagos where contrato=".$_GET["id"];   
                  
                          $resultado = $dbh->prepare($query);
                          $resultado->execute();
                            if ( $resultado->fetchColumn() == 0){    
                          ?>
                          <table style="width:100%" id="addpago">
                          <tr>
                              <td colspan="5">
                                <center><h5 style="margin:0px">Forma de Pago</h5></center>
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
                              <?php } ?>
                              <div id="grid">

                                </div>
                        </div>
                          
                
                              </div>
                        </div>
                
                <?php } ?>
        
    </div>
    
    
    
    
        
<script>
    
$( "#salir" ).click(function() {
  
});
$( "#guardar" ).click(function() {

  if (valid()==true){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'htrabajo',ofi:$("#ofi").val(),cod:$("#cod").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),inicialp:$("#inicialp").val(),obs:$("#obs").val(),nombref:$("#nombref").val(),asesor1:$("#asesor1").val(),cerrador1:$("#cerrador1").val(),cerrador2:$("#cerrador2").val(),gmarketing:$("#gmarketing").val(),tmk:$("#tmk").val(),stmk:$("#stmk").val(),gerven:$("#gerven").val(),admven:$("#admven").val(),pcomisionar:$("#pcomisionar").val(),supven:$("#supven").val(),dircom:$("#dircom").val(),jefe:$("#jefe").val(),vig:$("#vig").val(),dirf:$("#dirf").val(),cedf:$("#cedf").val(),telf:$("#telf").val(),gadm:$("#gadm").val()},
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
    
$( "#update" ).click(function() {

  if (valid()==true){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'htrabajo',ofi:$("#ofi").val(),cod:$("#cod").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),inicialp:$("#inicialp").val(),obs:$("#obs").val(),nombref:$("#nombref").val(),asesor1:$("#asesor1").val(),pcomisionar:$("#pcomisionar").val(),cerrador1:$("#cerrador1").val(),cerrador2:$("#cerrador2").val(),gmarketing:$("#gmarketing").val(),tmk:$("#tmk").val(),stmk:$("#stmk").val(),gerven:$("#gerven").val(),admven:$("#admven").val(),supven:$("#supven").val(),dircom:$("#dircom").val(),jefe:$("#jefe").val(),vig:$("#vig").val(),dirf:$("#dirf").val(),cedf:$("#cedf").val(),telf:$("#telf").val(),gadm:$("#gadm").val(),idh:'<?php echo $_GET["id"] ?>'},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                        document.location.reload()
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
});

$( "#gpago" ).click(function() {

  if ($("#cuotas").val()!="" && $("#gracia").val()!="" && $("#descripcion").val()!=""){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'forma_pago',cuota:$("#cuotas").val(),dia:$("#dia").val(),gracia:$("#gracia").val(),descripcion:$("#descripcion").val(),saldo:($("#inversion").val()-$("#inicial").val()),contrato:'<?php echo $_GET["id"] ?>',fecha:$("#fecha").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        var grid = $("#grid").data("kendoGrid");
                         grid.dataSource.read()
                        $("#banco").val("")
                        $("#desmp").val("")
                        $("#monto").val("")
                        $("#fechamp").val("")
                        $( "#addpago" ).hide();
                        
                        
		                 
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
    
    $('input[type="text"]').on("keypress", function () {
       $input=$(this);
       setTimeout(function () {
        $input.val($input.val().toUpperCase());
       },50);
    })
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
    $("#admven").kendoDropDownList({
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
    $("#vig").kendoDropDownList();
    $("#cuotas").kendoDropDownList();
    $("#gracia").kendoDropDownList();
    $("#dia").kendoDropDownList();
    <?php if ($_GET["id"]){ ?>
    $("#asesor1").data('kendoDropDownList').value("<?php echo $rowd['asesor1'] ?>");
    $("#cerrador1").data('kendoDropDownList').value("<?php echo $rowd['cerrador1'] ?>");
    $("#cerrador2").data('kendoDropDownList').value("<?php echo $rowd['cerrador2'] ?>");
    $("#gmarketing").data('kendoDropDownList').value("<?php echo $rowd['gersala'] ?>");
    $("#tmk").data('kendoDropDownList').value("<?php echo $rowd['telemarketing'] ?>");
    $("#stmk").data('kendoDropDownList').value("<?php echo $rowd['suptelemarketing'] ?>");
    $("#admven").data('kendoDropDownList').value("<?php echo $rowd['admven'] ?>");
    $("#gerven").data('kendoDropDownList').value("<?php echo $rowd['gerenteventa'] ?>");
    $("#supven").data('kendoDropDownList').value("<?php echo $rowd['supervisorventa'] ?>");
    $("#dircom").data('kendoDropDownList').value("<?php echo $rowd['directorcomercial'] ?>");
    $("#jefe").data('kendoDropDownList').value("<?php echo $rowd['jefe'] ?>");
    $("#vig").data('kendoDropDownList').value("<?php echo $rowd['vigencia'] ?>");
    <?php } ?>
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"forma_pago",contrato:'<?php echo $_GET["id"] ?>'}
			},
				
		},		
	});	
    
    
    var grid =$("#grid").kendoGrid({
        scrollable:true,
        
		dataSource: dataSource,            
		
		columns: [
			
			{ field: "descripcion", title:"Descripcion", width:'150px'},
			{ field: "monto", title:"Monto", width:'80px'},
            { field: "banco", title:"Cuotas", width:'155px'},
            { field: "fecha", title:"Fecha", width:"100px"},            
            { field: "estado", title:"Estado", width:"100px"},            
            
        ],
	}).data("kendoGrid");
});



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
      <script>
	
//////////////////////

</script>
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
