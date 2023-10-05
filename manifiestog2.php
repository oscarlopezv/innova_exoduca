<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php");
$rowd['Imagen2']='jpg.png';
if ($_GET["id"]){
    if ($_SESSION["usuario-permisos"]!="todos") {
        echo '<script> document.location.href="manifiesto.php" </script>' ;
    }
    $sql=new conectar();
    $sql->mysqlsrv();
    $query="select a.* from manifiesto a where a.idmanifiesto=".$_GET["id"]."";
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
	
.errormsg {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
    border:1px solid #f2c779;
    background:#fff8c4
}
         label{width:170px}
         input{width:200px}
         .form input {
    min-width: 60%;
    display: inline-block;
}

         td{ vertical-align: top}
        
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
                        <h2> Datos del Manifiesto                   </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table style="width:100%">
                          <tr>
                              <td style="width:100%">
                                  <div>
                                      <label for="cont">Contrato</label>
                                    <input id="cont" type="text" placeholder="Contrato  " name="Contrato"  value="<?php echo $rowd['contrato']; ?>"  /> 

                                  </div>
                             
                                  <div >
                                      <label for="fecha">Fecha</label>
                                <input id="fecha" type="text"  name="Fecha" placeholder="Fecha   yyyy-mm-dd"  value="<?php echo $rowd['fecha']; ?>"  /> 

                                  </div>
                              </td>
                          </tr>
                        </table>
                        <table style="width:100%"> 
            <tr>
                <td>
                   
           <div>
               <label for="nomt1">Titular</label>
                <input id="nomt1"  placeholder="Titular  " type="text" name="Titular" required value="<?php echo $rowd['titular']; ?>"  /> 
                
            </div>
            <div>
               <label for="aco">Acompañante </label>
                <input id="aco" type="text" name="Acompañante"  placeholder="Acompañante  "  value="<?php echo $rowd['acompañante']; ?>"  /> 
                
            </div>
            <div>
                <label for="cedt1">Cedula</label>
                <input id="cedt1" type="text" name="CedulaT1"  placeholder="Cedula  "  value="<?php echo $rowd['cedulat']; ?>"  /> 
                
            </div>
            <div>
                <label for="mailt1">Mail </label>
                <input id="mailt1" type="mailt" name="MailT1"  placeholder="Mail  "  value="<?php echo $rowd['mailt']; ?>"  /> 
                
            </div>
            <div>
                <label for="telt1">Telefonos </label>
                <input id="telt1" type="text" name="TelefonosT1"  placeholder="Telefonos  "  value="<?php echo $rowd['celular']; ?>"  /> 
                
            </div>
            <div>
                <label for="ec">Estado Civil </label>
                <input id="ec" type="text" name="Estado Civil"  placeholder="Estado Civil  "  value="<?php echo $rowd['estadocivil']; ?>"  /> 
                
            </div>
            <div>
                <label for="ocu">Ocupación </label>
                <input id="ocu" type="text" name="Ocupación"  placeholder="Ocupación  "  value="<?php echo $rowd['ocupaciont']; ?>"  /> 
                
            </div>
            <div>
                <label for="ciu">Ciudad </label>
                <input id="ciu" type="text" name="Ciudad"  placeholder="Ciudad  "  value="<?php echo $rowd['ciudad']; ?>"  /> 
                
            </div>
            <div>
                <label for="cod">Codigo </label>
                <input id="cod" type="text" name="Codigo" required  placeholder="Codigo  "  value="<?php echo $rowd['codigo']; ?>"  /> 
                
            </div>
            <div>
               <label for="tnt">T/NT </label>
               <select name="T / NT" id="tnt" required>
                    <option>T</option>
                   <option>NT</option>
                </select>

            </div>
            <div>
                <label for="lote">Lote</label>
                <input id="lote" type="text" name="Lote"  placeholder="Lote  "  value="<?php echo $rowd['lote']; ?>"  /> 
                
            </div>
            <div>
                <label for="ref">Ref </label>
                <input id="ref" type="text" name="Ref"  placeholder="Ref  "  value="<?php echo $rowd['ref']; ?>"  /> 
                
            </div>
            <div>
                <label for="apro">Aprobación</label>
                <input id="apro" type="text" name="apro"  placeholder="Aprobación  "  value="<?php echo $rowd['aprobacion']; ?>"  /> 
                
            </div>
            <div>
                <label for="adqui">Adquiriente</label>
                <input id="adqui" type="text" name="Adquiriente"  placeholder="Adquiriente  "  value="<?php echo $rowd['adquiriente']; ?>"  /> 
                
            </div>
            <div>
                <label for="tc">TC Cliente</label>
                
                
                <select id="tc">
                    <option>Efectivo</option>
                    <option>Visa</option>
                    <option>Master Card</option>
                    <option>Diners Club</option>
                    <option>American Express</option>
                    <option>Alia</option>
                    <option>Discover</option>
                    <option>Otra</option>
                
                </select>
                
            </div>
            <div>
                <label for="anosc">Años comprados  </label>
                <input id="anosc" type="text" name="Años comprados"  placeholder="Años comprados  "  value="<?php echo $rowd['anos']; ?>"  /> 
                
            </div>
            <div>
                <label for="plus">Plus  </label>
                <input id="plus" type="text" name="Plus"  placeholder="Plus  "  value="<?php echo $rowd['plus']; ?>"  /> 
                
            </div>
            <div>
                <label for="credi">Credito Directo  </label>
                <input id="credi" type="text" name="Credito Directo"  placeholder="Credito Directo  "  value="<?php echo $rowd['creditodir']; ?>"  /> 
                
            </div>
            <div>
                <label for="tcli">Marca de Tarjeta</label>
                <input id="tcli" type="text" name="Tarjeta Cliente"  placeholder="Tarjeta Cliente  "  value="<?php echo $rowd['tc']; ?>"  /> 
                
            </div>
                    </td>
                
            </tr>
            </table>
                        <div class="form">
                            <div>
                                <label for="dir">Direccion  </label>
                                <input id="dir" type="text" name="Dirección"  placeholder="Dirección  "  value="<?php echo $rowd['direccion']; ?>"  /> 

                            </div>
                            <div>
                                <label for="inversion">Inversión Total  </label>
                                <input id="inversion" type="text" name="Inversión"  placeholder="Inversión Total  "  isdecimal value="<?php echo $rowd['total']; ?>"  /> 

                            </div>
                            <div>
                                <label for="pinicial">Pago inicial </label>
                                <input id="pinicial" type="text" name="Inversión"  placeholder="Pago Inicial  "  isdecimal value="<?php echo $rowd['pinicial']; ?>"  /> 

                            </div>
                            
                            <!--<div>
                                <label for="inicialp">Inicial Pactado  </label>
                                <input id="inicialp" type="text" name="Inicial_Pactado"  placeholder="Inicial Pactado  " required isdecimal value="<?php echo $rowd['vpactado']; ?>"  /> 

                            </div>-->
                            <div>
                               <label for="obs">Observaciones  </label>
                               <input id="obs" type="text" name="Observaciones"  placeholder="Observaciones  "   value="<?php echo $rowd['observacion']; ?>" /> 

                            </div>
                            <div>
                               <label for="efe">Efectividad  </label>
                               <select name="Efectividad" id="efe" required>
                                    <option>Efectivo</option>
                                   <option>No efectivo</option>
                                </select>

                            </div>

                        </div>
                    </div>
                </div>   
       
                <div class>
                <div class="clear-fix"></div>  
                    
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
                            <label>Closer 1</label>
                            <div id="cerrador1"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Closer 2</label>
                            <div id="cerrador2"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Administrativo de Sala</label>
                            <div id="admsala"  style="width:400px" >
                
                              </div>
                        </div>
                        <div class="x_content">
                            <label>Gerente de Sala</label>
                            <div id="gersala"  style="width:400px" >
                
                              </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
                
                  
      
        </form>
          
      <div id="erroresmsgs"></div>
                
                <p></p>
                <?php if ($_GET["id"]){?>
                        <?php if ($_SESSION["usuario-permisos"]=='todos' || $_SESSION["usuario-puesto"]=='Administrativo') { ?>
                            <button class="k-button" type="button" id="update" style="padding-top:5px">Actualizar</button>
                        <?php } else { ?>
                            <button class="k-button" id="volver" onclick="document.location.href='htrabajo.php'" style="padding-top:5px">Volver</button> 
                        <?php } ?>
                <?php } else { ?>                
                <button class="k-button" id="guardar" style="padding-top:5px">Guardar y Continuar</button>
                <?php } ?>
                </td></tr></table>
    </div>
        
<script>
    
$( "#salir" ).click(function() {
  
});
$( "#guardar" ).click(function() {

  if (validmani()==true){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'manifiestos',cont:$("#cont").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),obs:$("#obs").val(),efe:$("#efe").val(),asesor1:$("#asesor1").val(),cerrador1:$("#cerrador1").val(),cerrador2:$("#cerrador2").val(),ciu:$("#ciu").val(),lote:$("#lote").val(),ref:$("#ref").val(),apro:$("#apro").val(),adqui:$("#adqui").val(),tc:$("#tc").val(),anosc:$("#anosc").val(),plus:$("#plus").val(),cod:$("#cod").val(),ocu:$("#ocu").val(),aco:$("#aco").val(),tnt:$("#tnt").val(),admsala:$("#admsala").val(),gersala:$("#gersala").val(),credi:$("#credi").val(),ec:$("#ec").val(),tcli:$("#tcli").val(),pinicial:$("#pinicial").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                       document.location.href="manifiestog.php"
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
});
$( "#update" ).click(function() {

  if (validmani()==true){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'manifiestos',cont:$("#cont").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),obs:$("#obs").val(),efe:$("#efe").val(),asesor1:$("#asesor1").val(),cerrador1:$("#cerrador1").val(),cerrador2:$("#cerrador2").val(),ciu:$("#ciu").val(),lote:$("#lote").val(),ref:$("#ref").val(),apro:$("#apro").val(),adqui:$("#adqui").val(),tc:$("#tc").val(),anosc:$("#anosc").val(),plus:$("#plus").val(),cod:$("#cod").val(),ocu:$("#ocu").val(),aco:$("#aco").val(),tnt:$("#tnt").val(),admsala:$("#admsala").val(),gersala:$("#gersala").val(),credi:$("#credi").val(),ec:$("#ec").val(),tcli:$("#tcli").val(),pinicial:$("#pinicial").val(),idm:'<?php echo $_GET["id"] ?>'},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                       //document.location.href="manifiesto.php"
                        history.back();  
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
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
        optionLabel: "Seleccione..  ",
        dataSource: dataSourceddl,
    });
    $("#efe").kendoDropDownList();
    $("#tnt").kendoDropDownList();
    $("#tc").kendoDropDownList();
    $("#cerrador1").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione..  ",
        dataSource: dataSourceddl,
    });
    
    $("#cerrador2").kendoDropDownList({
        dataTextField: "nom", 
        dataValueField: "idempleados",
        optionLabel: "Seleccione..  ",
        dataSource: dataSourceddl,
    });
    $("#admsala").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados", 
        optionLabel: "Seleccione..  ",
        dataSource: dataSourceddl,
    });
    $("#gersala").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Seleccione..  ",
        dataSource: dataSourceddl,
    });
    
    $("#efe").data('kendoDropDownList').text("<?php echo $rowd['efectividad'] ?>");
    $("#tc").data('kendoDropDownList').text("<?php echo $rowd['marcatc'] ?>");
    $("#tnt").data('kendoDropDownList').text("<?php echo $rowd['tnt'] ?>");
    <?php if (isset($_GET["id"])){ ?>
    $("#asesor1").data('kendoDropDownList').value("<?php echo $rowd['liner'] ?>");
    $("#cerrador1").data('kendoDropDownList').value("<?php echo $rowd['closer1'] ?>");
    $("#cerrador2").data('kendoDropDownList').value("<?php echo $rowd['closer2'] ?>");
    $("#admsala").data('kendoDropDownList').value("<?php echo $rowd['admsala'] ?>");
    $("#gersala").data('kendoDropDownList').value("<?php echo $rowd['gersala'] ?>");
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
            { field: "banco", title:"Banco", width:'155px'},
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
