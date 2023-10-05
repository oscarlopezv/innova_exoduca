<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php");
$sql=new conectar();
$sql->mysqlsrv();
$query="select * from per_comision";
$resultado = $dbh->prepare($query);
$resultado->execute();

$rowd = count($resultado->fetch());
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
        label{width:170px}
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
.k-dropzone{
        margin-bottom: 0px;
    height: 22px;
    padding: 0px;
    width: 96px
        }
        .k-dropzone em{
         display: none
        }
        .k-upload{
            width: 93px
        }
        .k-dropzone strong{
         display: none
        }
        .tabsp td{
            padding: 2px
        }
        
	</style> 
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
     <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
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
                        <form>
                        <div class="x_title">
                            <h2> Comisiones    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                <div>
                                      <label for="vano">Valor del año (*)</label>
                                    <input id="vano" type="text"  name="Valor del Año" placeholder="360" required value="<?php echo $rowd['valor_ano']; ?>"  /> 
                                    
                                  </div> 
                                </div>
                                <div class="col-md-6">
                                  <div>
                                      <label for="Liner">Liner (*)</label>
                                    <input id="ase1" type="text"  name="Liner" placeholder="20" required value="<?php echo $rowd['asesor1']; ?>"  /> 
                                    
                                  </div> 
                                    <div>
                                      <label for="cer1">Cerrador 1 (*)</label>
                                    <input id="cer1" type="text"  name="Cerrador 1" placeholder="20" required value="<?php echo $rowd['cerrador1']; ?>"  /> 
                                    
                                  </div> 
                                     <div>
                                      <label for="cer2">Cerrador 2 (*)</label>
                                    <input id="cer2" type="text"  name="Cerrador 2" placeholder="20" required value="<?php echo $rowd['cerrador2']; ?>"  /> 
                                    
                                  </div> 
                                     <div>
                                      <label for="tmk">Telemarketing (*)</label>
                                    <input id="tmk" type="text"  name="Telemarketing" placeholder="20%" required value="<?php echo $rowd['tmk']; ?>"  /> 
                                    
                                  </div> 
                                <div>
                                      <label for="admven">Adm. Sala Venta (*)</label>
                                    <input id="admven" type="text"  name="Adm. Venta" placeholder="" required value="<?php echo $rowd['adm_venta']; ?>"  /> 
                                    
                                  </div> 
                                     <div>
                                      <label for="stmk">Supervisor de telemarketing (*)</label>
                                    <input id="stmk" type="text"  name="stmk" placeholder="20" required value="<?php echo $rowd['sup_tmk']; ?>"  /> 
                                    
                                  </div>
                                  <div>
                                      <label for="stmk">Minimo Años TMK (fijo) (*)</label>
                                    <input id="mintmkf" type="text"  name="Minimo Años TMK" placeholder="20" required value="<?php echo $rowd['mintmkf']; ?>"  /> 
                                    
                                  </div>
                                    
                                </div>
                                <div class="col-md-6">
                                  <div>
                                      <label for="gerven">Gerente Sala de venta (*)</label>
                                    <input id="gerven" type="text"  name="Gerente Sala de venta" placeholder="20" required value="<?php echo $rowd['ger_venta']; ?>"  /> 
                                    
                                  </div> 
                                    <div>
                                      <label for="sven">Supervisor Sala de venta (*)</label>
                                    <input id="sven" type="text"  name="Supervisor de Sala de venta" placeholder="20%" required value="<?php echo $rowd['sup_venta']; ?>"  /> 
                                    
                                  </div> 
                                <div>
                                      <label for="dcom">Director Comercial (*)</label>
                                    <input id="dcom" type="text"  name="Director Comercial" placeholder="20" required value="<?php echo $rowd['dir_com']; ?>"  /> 
                                    
                                  </div> 
                                    <div>
                                      <label for="gtmk">Gerente de Tmk (*)</label>
                                    <input id="gtmk" type="text"  name="Gerente de Tmk" placeholder="20%" required value="<?php echo $rowd['ger_mark']; ?>"  /> 
                                    
                                  </div> 
                                 <div>
                                      <label for="jefe">Jefe (*)</label>
                                    <input id="jefe" type="text"  name="Jefe" placeholder="20" required value="<?php echo $rowd['jefe']; ?>"  /> 
                                    
                                  </div> 
                                
                                    
                                </div>
                        </div>
                            
                            
                        <div class="x_title">
                            <h2> Spif 0    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                
                                    <div>
                                          <label for="Liner">Liner </label>
                                        <input id="sp0liner" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['sp0liner']; ?>"  /> 

                                      </div> 
                                    <div>
                                          <label for="Liner">Closer c/u </label>
                                        <input id="sp0closer" type="text"  name="Closer Spif 0" placeholder="20" required value="<?php echo $rowd['sp0closer']; ?>"  /> 

                                      </div>
                                    <div>
                                          <label for="Liner">Administrativo Venta</label>
                                        <input id="sp0admv" type="text"  name="Adm. Venta Spif 0" placeholder="20" required value="<?php echo $rowd['sp0admv']; ?>"  /> 

                                      </div>
                                </div>
                                
                            
                        </div>
                            
                        <div class="x_title">
                            <h2> Spif    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                    <table class="tabsp">
                                    <tr>
                                        <td>&nbsp;</td>    
                                        <td>3 a 4 años</td>
                                        <td>5 a 7 años</td>
                                        <td>8 años o más</td>
                                    </tr>
                                    <tr>
                                        <td><label for="Liner">Liner </label></td>    
                                        <td><input id="spliner34" type="text"  name="Liner Spif " placeholder="20" required value="<?php echo $rowd['spliner34']; ?>"  /></td>
                                        <td><input id="spliner57" type="text"  name="Liner Spif " placeholder="20" required value="<?php echo $rowd['spliner57']; ?>"  /></td>
                                        <td><input id="spliner8" type="text"  name="Liner Spif " placeholder="20" required value="<?php echo $rowd['spliner8']; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Liner">Closer c/u </label></td>    
                                        <td><input id="spcloser34" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['spcloser34']; ?>"  /></td>
                                        <td><input id="spcloser57" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['spcloser57']; ?>"  /></td>
                                        <td><input id="spcloser8" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['spcloser8']; ?>"  /></td>
                                    </tr>
                                    </table>
                                
                                    
                                </div>
                                
                            
                        </div>
                            
                            
                        <div class="x_title">
                            <h2> Bono por cumplimiento semanal    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                    <table class="tabsp">
                                    <tr>
                                        <td>&nbsp;</td>    
                                        <td>15 a 24 años</td>
                                        <td>25 a 29 años</td>
                                        <td>30 años o más</td>
                                    </tr>
                                    <tr>
                                        <td><label for="Liner">Liner </label></td>    
                                        <td><input id="bcliner1524" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['bcliner1524']; ?>"  /></td>
                                        <td><input id="bcliner2529" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['bcliner2529']; ?>"  /></td>
                                        <td><input id="bcliner30" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['bcliner30']; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Liner">Closer c/u </label></td>    
                                        <td><input id="bccloser1524" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['bccloser1524']; ?>"  /></td>
                                        <td><input id="bccloser2529" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['bccloser2529']; ?>"  /></td>
                                        <td><input id="bccloser30" type="text"  name="Closer Spif " placeholder="20" required value="<?php echo $rowd['bccloser30']; ?>"  /></td>
                                    </tr>
                                    </table>
                                
                                    
                                </div>
                                
                            
                        </div>
                            
                        <div class="x_title">
                            <h2> Bono por gerente de sala de venta    </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                    
                                    <div>
                                          <label for="Liner">50 a 79 años </label>
                                        <input id="gsven5079" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['gsven5079']; ?>"  /> 

                                    </div>
                                    <div>
                                          <label for="Liner">80 años o más</label>
                                        <input id="gsven80" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['gsven80']; ?>"  /> 

                                    </div>
                                
                                    
                                </div>
                                
                            
                        </div>
                            
                            
                        <div class="x_title">
                            <h2> Bono por Director Comercial   </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"  >
                            
                                <div class="col-md-12">
                                    
                                    <div>
                                          <label for="Liner">50 años o más </label>
                                        <input id="dircom50" type="text"  name="Liner Spif 0" placeholder="20" required value="<?php echo $rowd['dircom50']; ?>"  /> 

                                    </div>
                                    
                                
                                    
                                </div>
                                
                            
                        </div>
                            
                            <div id="erroresmsgs"></div>

                                        <p></p>
                                                       
                                        <button type="button" class="k-button" id="guardar" style="padding-top:5px">Guardar</button> 
                            </form> 
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
<button class="k-button" style="min-width:40px" onClick="document.location.href='mantvehiculos.php?id=#= idvehiculos_mant#'"><i class='fa fa-edit'></i></button>
<button class="k-button" style="min-width:40px" onClick="eliminar(#= idvehiculos_mant#)"><i class='fa fa-trash'></i></button>
    </script>
      <script>

 
$( "#guardar" ).click(function() {
  if (valid()==true){
    
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'porcomision',vano:$("#vano").val(),sp0liner:$("#sp0liner").val(),sp0closer:$("#sp0closer").val(),sp0admv:$("#sp0admv").val(),spliner34:$("#spliner34").val(),spliner57:$("#spliner57").val(),spliner8:$("#spliner8").val(),spcloser34:$("#spcloser34").val(),spcloser57:$("#spcloser57").val(),spcloser8:$("#spcloser8").val(),bcliner1524:$("#bcliner1524").val(),bcliner2529:$("#bcliner2529").val(),bcliner30:$("#bcliner30").val(),bccloser1524:$("#bccloser1524").val(),bccloser2529:$("#bccloser2529").val(),bccloser30:$("#bccloser30").val(),gsven5079:$("#gsven5079").val(),gsven80:$("#gsven80").val(),dircom50:$("#dircom50").val(),ase1:$("#ase1").val(),cer1:$("#cer1").val(),cer2:$("#cer2").val(),tmk:$("#tmk").val(),stmk:$("#stmk").val(),gerven:$("#gerven").val(),sven:$("#sven").val(),admven:$("#admven").val(),dcom:$("#dcom").val(),gtmk:$("#gtmk").val(),jefe:$("#jefe").val(),mintmkf:$("#mintmkf").val()},
	  success: function(){ 					
	  			alert ('Su registro fue actualizado')
				//document.location.href='mantvehiculos.php'
				document.location.reload()
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
	  ok=[".jpg",".JPG",".gif",".GIF",".PNG",".png"]
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
var onSelect2 = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    
};
var onSuccess2=function(e){
	$("#filemsj").html("Completado")
	$("#imagehidden2").val(e.response.newName)
}  
          

$(document).ready(function () {	
    
	
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
	height:"500px",
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
	  title: "Actualizar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "empleadosg.php?id="+e,
	  	  width:"700px",
		  height:"500px",
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
	data: {id:'inventario',ide:e},
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
//////////////////////

</script>
      <script src="js/valid.js"></script>
    <style type="text/css">
        .customer-photo {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-size: 40px 40px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }
        

</style> 
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>
