<?php 
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 
$rowd['Imagen2']='jpg.png';
if ($_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();
$query="select * from empleados where idempleados=".$_GET["id"]."";
$resultado = $dbh->prepare($query);
$resultado->execute(); 	
$rowd=$resultado->fetch();>fetch());
}
?>
<!DOCTYPE html>
<html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon3.ico" type="image/ico" />

    <title>INNOVA TOUR</title>

    
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="vendors/kendoui/styles/kendo.common-bootstrap.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.bootstrap-v4.min.css" rel="stylesheet" />
      
      
    <style>
	.h5,h5{font-size:16px;color:#151f2c;font-family:"Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif} input{width:95%;border:2px
solid gray;background:#fff;position:relative;top:0;left:0;z-index:1;padding:4px
0px 20px 6px;outline:0}input:valid{}input:focus{border-color:#264365}input:focus+label, input:valid+label{background:#450792;color:white;font-size:70%;padding:0px
5px;z-index:2;text-transform:uppercase}label{transition:background 0.2s,
color 0.2s,
top 0.2s,
bottom 0.2s,
right 0.2s,
left 0.2s;display: none;z-index: 999999;position:absolute;color:#999;padding:7px
6px}label{top:0;bottom:0;left:0;width:95%}input:focus,input:valid{padding:4px
0px 20px 6px}input:focus+label, input:valid+label{top:100%;margin-top:-18px;display: block}
.errormsg {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
    border:1px solid #f2c779;
    background:#fff8c4
}
         div {
            position: relative;
            width: 100%; margin: 5px
        }
    </style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    
    <!-- Custom Theme Style -->
    
    <!-- Demo page code -->
    
    
  </head>
  <body style="background:#f2f0f0; padding:10px">
         <form>
      <div>
        <input id="nom" type="text" name="Nombres" placeholder="Nombres (*)" required value="<?php echo $rowd['nombres']; ?>"  /> 
        <label for="name">Nombres (*)</label>
      </div>  
      <div>
        <input id="ape" type="text" name="Apellidos"  placeholder="Apellidos (*)" required value="<?php echo $rowd['apellidos']; ?>"  /> 
        <label for="ape">Apellidos (*)</label>
      </div> 
      <div>
        <input id="mail" type="text" name="Mail"  placeholder="Mail (*)" <?php if (!$_GET["id"]){?> ifexistemp <?php } ?>required value="<?php echo $rowd['mail']; ?>"  /> 
        <label for="mail">Mail (*)</label>
      </div> 
      <div>
        <input id="sueldo" type="text" name="Sueldo"  placeholder="Sueldo (*)" required isdecimal value="<?php echo $rowd['sueldo']; ?>"  /> 
        <label for="sueldo">Sueldo (*)</label>
      </div>
      <div>
        <input id="tipoe" name="Puesto" required style="width: 97%;margin:5px" />
      </div>
             
        </form>  
      <div id="erroresmsgs"></div>
                
                <p></p>
                <?php if ($_GET["id"]){?>
                <button class="k-button" id="updateb" style="padding-top:5px">Update</button>
                <?php } else { ?>                
                <button class="k-button" id="guardar" style="padding-top:5px">Guardar</button>
                <?php } ?>
                </td></tr></table>
    </div>
        
<script>
 
$( "#updateb" ).click(function() {
  if (valid()==true){
    
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'empleado',nom:$("#nom").val(),ape:$("#ape").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:$("#tipoe").val(),idp:'<?php echo $_GET["id"] ?>'},
	  success: function(){ 					
	  			alert ('Su registro fue actualizado')
				window.parent.$("#editwindow").data("kendoWindow").close(); 
			},	
	  error: function() {  alert( "Ha ocurrido un error" );}  
	});
  }
});
$( "#guardar" ).click(function() {

  if (valid()==true){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'empleado',nom:$("#nom").val(),ape:$("#ape").val(),mail:$("#mail").val(),sueldo:$("#sueldo").val(),puesto:$("#tipoe").val()},
          success: function(res){ 
                    if (res.length<10){
                        alert ('Su registro ha sido grabado')
                        window.parent.$("#editwindow").data("kendoWindow").close(); 
                    } else {
                        alert ('No se pudo grabar el registro, verifique los datos')
                    }
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
  }
});
$(document).ready(function() {
    $("#tipoe").kendoDropDownList({
        dataTextField: "puesto",
        dataValueField: "puesto",
        optionLabel: "Cargo o Puesto (*)",
        dataSource: {
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"puesto"}
                },
            }
        }
    });
    $("#tipoe").data('kendoDropDownList').value("<?php echo $rowd['tipoempleado'] ?>");
});



</script>
<script src="js/valid.js"></script>
  </body>
</html>


