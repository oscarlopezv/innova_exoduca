<?php
session_start();

include_once("php/conexion.php");
include_once("php/validarpermisos.php");
$rowr['voucher']='jpg.png';
if ($_GET["id"]){
    
    $sql=new conectar();
    $sql->mysqlsrv();
    $query="select * from htrabajo where idhtrabajo=".$_GET["id"]."";
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
         label{width:120px}
         input{width:200px}
         .form input {
    min-width: 60%;
    display: inline-block;
}

         .textl{ width:100%}
        
    </style>
      <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    
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
            
            
            <div class='col-md-12'>
            <div class="clear-fix"></div>
            
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
                <input id="cedt1" type="text" name="CedulaT1"  placeholder="Cedula (*)" required value="<?php echo $rowd['tapellidos']; ?>"  /> 
                
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
                <input id="cedt2" type="text" name="CedulaT2"  placeholder="Cedula (*)" required value="<?php echo $rowd['tapellidos2']; ?>"  /> 
                
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
                            <div>
                                <label for="inicialp">Inicial Pactado (*)</label>
                                <input id="inicialp" type="text" name="Inicial_Pactado"  placeholder="Inicial Pactado (*)" required isdecimal value="<?php echo $rowd['vpactado']; ?>"  /> 

                            </div>
                            <div>
                               <label for="obs">Observaciones (*)</label>
                               <input id="obs" type="text" name="Observaciones"  placeholder="Observaciones (*)" required  value="<?php echo $rowd['observacion']; ?>" /> 

                            </div>

                        </div>
                        <button type="button" class="k-button" onclick="document.location.href='llamadasg.php?id=<?php echo $_GET["id"] ?>'">Revisar llamadas del Cliente </button>
                        <button class="k-button" onclick="window.close()">Volver</button>
                        
                    </div>
                </div>   
                
            
                
        </div>
    
                
            <div class="col-md-7">
                <div class="clear-fix"></div>  
                    
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2> Historial de Reservas    </h2>
                            <ul class="nav navbar-left panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                                    
                                    <div id="grid" style="height:300px" >

                                      </div>
                           
                        </div>
                    </div>
                
                </div>
                <form>
                    
                    <?php 
                    if ($_GET["idr"]!='' || isset($_GET["idr"])){
                        $query="Select * from reservas where idreservas=".$_GET["idr"];
                        $resultado = $dbh->prepare($query);
	                      $resultado->execute();
                        $rowr = $resultado->fetch();
                    }
                    ?>
                <div class="col-md-5">
                <div class="clear-fix"></div>  
                    
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2> Agregar   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
                            
                                <div>
                                    <label>Fecha de salida</label>
                                    <input id="fechai" value="<?php echo $rowr["fechaida"] ?>" required />
                                </div>
                                <div>
                                    <label>Fecha de Regreso</label>
                                    <input id="fechaf"  value="<?php echo $rowr["fechaida"] ?>"  required/>
                                </div>
                                <div>
                                    <label>Tipo</label>
                                    <select required id="tipo" required>
                                        <option <?php echo ($rowr["tipo"]=='VUELO')?'selected':' ' ?>>VUELO</option>
                                        <option <?php echo ($rowr["tipo"]=='HOSPEDAJE')?'selected':' ' ?>>HOSPEDAJE</option>
                                        <option <?php echo ($rowr["tipo"]=='VUELO+HOSPEDAJE')?'selected':' ' ?>>VUELO+HOSPEDAJE</option>
                                        <option <?php echo ($rowr["tipo"]=='PROGRAMAS O TOURS')?'selected':' ' ?>>PROGRAMAS O TOURS</option>
                                        <option <?php echo ($rowr["tipo"]=='CORTESIAS')?'selected':' ' ?>>CORTESIAS</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Adultos</label>
                                    <input type="number" title='numeric' required step='1' min="0"  value="<?php echo $rowr["adultos"] ?>"  max="20" id="adultos">
                                </div>
                                <div>
                                    <label>Niños</label>
                                    <input type="number"  value="<?php echo $rowr["ninos"] ?>"  title='numeric' step='1' min="0" value="0" max="20" id="ninos">
                                </div>
                                <div>
                                    <label>Infantes</label>
                                    <input type="number"  value="<?php echo $rowr["infantes"] ?>"  title='numeric' step='1' min="0" value="0" max="20" id="infantes">
                                </div>
                                <div>
                                    <label>Descripción</label>
                                    <textarea required id="descripcion" class='textl'> <?php echo $rowr["descripcion"] ?> </textarea>
                                </div>
                                <div>
                                    <label>Estado</label>
                                    <select required id="estado" required style="width:100%;margin-bottom:7px">
                                        <option <?php echo ($rowr["estado"]=='COTIZADO')?'selected':' ' ?>>COTIZADO</option>
                                        <option <?php echo ($rowr["estado"]=='RESERVADO')?'selected':' ' ?>>RESERVADO</option>
                                        <option <?php echo ($rowr["estado"]=='REALIZADO')?'selected':' ' ?>>REALIZADO</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="vehiculo">Voucher (*)</label><br>
                                        <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload" type="file"/>
                                    </div><br>
                                    <img id="image" style="width:150px; display:inline-block" src="images/<?php echo $rowr['voucher'] ?>"> 
                                    <input type="hidden" readonly name="Preview" id="imagehidden" value="<?php echo $rowr['voucher'] ?>"><p></p>
                                    <br>
                                    
                                    
                                </div>
                            
                            <p></p>
                            <div id="erroresmsgs"></div>
                            
                                <?php if ($_GET["idr"]=='' || !isset($_GET["idr"])){ ?>
                                <button type="button"  id="guardar" class="k-button">Guardar</button>  
                                <?php } else { ?>
                                <button type="button"  id="update" class="k-button">Actualizar</button> 
                            <button type="button" onclick="document.location.href='reservasg.php?id=<?php echo $_GET["id"] ?>'" class="k-button">Limpiar</button> 
                                <?php } ?>
                        </div>
                            
                    </div>
                </div>
                  
      
        </form>
          
      
                
                <p></p>
                
                
    
    </div>
        
<script>
    
$( "#guardar" ).click(function() {

  if (valid()==true){
      
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'reservas',tipo:$("#tipo").val(),adultos:$("#adultos").val(),ninos:$("#ninos").val(),infantes:$("#infantes").val(),fechai:$("#fechai").val(),fechaf:$("#fechaf").val(),estado:$("#estado").val(),descripcion:$("#descripcion").data("kendoEditor").value(),contrato:'<?php echo $_GET["id"] ?>',voucher:$("#imagehidden").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                        document.location.href="reservasg.php?id=<?php echo $_GET["id"] ?>"
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
          data: {id:'reservas',tipo:$("#tipo").val(),adultos:$("#adultos").val(),ninos:$("#ninos").val(),infantes:$("#infantes").val(),fechai:$("#fechai").val(),fechaf:$("#fechaf").val(),estado:$("#estado").val(),descripcion:$("#descripcion").data("kendoEditor").value(),contrato:'<?php echo $_GET["id"] ?>',reserva:'<?php echo $_GET["idr"] ?>',voucher:$("#imagehidden").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                        //document.location.reload()
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
});

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
$(document).ready(function() {
    $("#upload").kendoUpload({
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
        success: onSuccess,
    });
    
    $("#adultos").kendoNumericTextBox({
                        format: "n0",
                        decimals: 0
                    });
     $("#ninos").kendoNumericTextBox({
                        format: "n0",
                        decimals: 0
                    });
     $("#infantes").kendoNumericTextBox({
                        format: "n0",
                        decimals: 0
                    });
   
    $("#fecha").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fechai").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        value: new Date(),
        dateInput: true
    });
    
    
    
    $("#fechaf").kendoDatePicker({
       format: "yyyy-MM-dd",
        value: new Date(),
        dateInput: true
    });
    var defaultTools = kendo.ui.Editor.defaultTools;
defaultTools["insertParagraph"].options.shift = true;
     $("#descripcion").kendoEditor({  
        content: true,

    });
    
    $("#estado").kendoDropDownList({        
        optionLabel: "Estado (*)",
        
    });
    $("#tipo").kendoDropDownList({        
        optionLabel: "Estado (*)",
        
    });
    
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"reservas",contrato:'<?php echo $_GET["id"] ?>'}
			},
				
		},		
	});	
    
    
    var grid =$("#grid").kendoGrid({
        scrollable:true,
        
		dataSource: dataSource,            
		
		columns: [
			{  width:'45px',template:"<i class='fa fa-edit' style='cursor:pointer' onClick='document.location.href=\"reservasg.php?id=<?php echo $_GET["id"] ?>&idr=#:idreservas#\"'></i>"},
			{ field: "fechaida", title:"Salida", width:'100px'},
            { field: "fecharegreso", title:"Regreso", width:'100px'},
			{ field: "adultos", title:"Adu.", width:'70px'},
            { field: "ninos", title:"Niños", width:'70px'},
            { field: "infantes", title:"Inf.", width:'70px'},
            { field: "estado", title:"Estado", width:'100px'},
            { field: "descripcion", title:"descripcion",encoded:false, width:'100px',attributes: {
              style: 'white-space: nowrap;height:21px; position:absolute;width:120px '
            }  },           
            
            
        ],
	}).data("kendoGrid");
    $("#grid").kendoTooltip({
      filter: "td:nth-child(8)", //this filter selects the second column's cells
      position: "right",
      content: function(e){
        var dataItem = $("#grid").data("kendoGrid").dataItem(e.target.closest("tr"));
          console.log(dataItem)
        var content = dataItem.descripcion;
        return content;
      }
    }).data("kendoTooltip");
    
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
