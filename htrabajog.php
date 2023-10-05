<?php 
include_once("php/conexion.php");
$rowd['Imagen2']='jpg.png';
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
    
    <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
      
      
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
        td div {
            position: relative;
            width: 100%; margin: 5px
        }
    </style>
      <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    
    <!-- Custom Theme Style -->
    
    <!-- Demo page code -->
    
    
  </head>
  <body style="background:#f2f0f0; padding:10px">
      <form>
      <table style="width:100%">
      <tr>
          <td>
              <div>
                <input id="ofi" type="text" placeholder="Oficina (*)" name="Oficina" required value="<?php echo $rowd['oficina']; ?>"  /> 
                <label for="ofi">Oficina (*)</label>
              </div>
          </td>
          <td>
              <div>
            <input id="cod" type="text"  placeholder="Codigo" name="Codigo" required value="<?php echo $rowd['codigo']; ?>"  /> 
            <label for="cod">Codigo (*)</label>
              </div>
          </td>
          <td>
              <div style="margin-left:15px">
            <input id="fecha" type="text"  name="Fecha" placeholder="Fecha (*) yyyy-mm-dd"  value="<?php echo $rowd['fecha']; ?>"  /> 
            
              </div>
          </td>
      </tr>
      <tr>
        <td colspan="3" >
            <table style="width:100%"> 
            <tr>
                <td>
                   <center><h5 style="margin:0px">Titular 1</h5></center>
           <div>
                <input id="nomt1"  placeholder="Nombres (*)" type="text" name="NombresT1" required value="<?php echo $rowd['tnombres']; ?>"  /> 
                <label for="nomt1">Nombres (*)</label>
            </div>
            <div>
                <input id="apet1" type="text"  placeholder="Apellidos (*)" name="ApellidosT1" required value="<?php echo $rowd['tapellidos']; ?>"  /> 
                <label for="apet1">Apellidos (*)</label>
            </div>
            <div>
                <input id="cedt1" type="text" name="CedulaT1"  placeholder="Cedula (*)" required value="<?php echo $rowd['tapellidos']; ?>"  /> 
                <label for="cedt1">Cedula (*)</label>
            </div>
            <div>
                <input id="mailt1" type="text" name="MailT1"  placeholder="Mail (*)" required value="<?php echo $rowd['tmail']; ?>"  /> 
                <label for="mailt1">Mail (*)</label>
            </div>
            <div>
                <input id="telt1" type="text" name="TelefonosT1"  placeholder="Telefonos (*)" required value="<?php echo $rowd['ttelefonos']; ?>"  /> 
                <label for="telt1">Telefonos (*)</label>
            </div>
                    </td>
                <td>
                    <center><h5 style="margin:0px">Titular 2</h5></center>
           <div>
                <input id="nomt2" type="text" name="NombresT2"  placeholder="Nombres (*)" required value="<?php echo $rowd['tnombres2']; ?>"  /> 
                <label for="nomt1">Nombres (*)</label>
            </div>
            <div>
                <input id="apet2" type="text" name="ApellidosT2"  placeholder="Apellidos (*)" required value="<?php echo $rowd['tapellidos2']; ?>"  /> 
                <label for="apet2">Apellidos (*)</label>
            </div>
            <div>
                <input id="cedt2" type="text" name="CedulaT2"  placeholder="Cedula (*)" required value="<?php echo $rowd['tapellidos2']; ?>"  /> 
                <label for="cedt2">Cedula (*)</label>
            </div>
            <div>
                <input id="mailt2" type="text" name="MailT2"  placeholder="Mail (*)" required value="<?php echo $rowd['tmail2']; ?>"  /> 
                <label for="mailt1">Mail (*)</label>
            </div>
            <div>
                <input id="telt2" type="text" name="TelefonosT2"  placeholder="Telefonos (*)" required value="<?php echo $rowd['ttelefonos2']; ?>"  /> 
                <label for="telt2">Telefonos (*)</label>
            </div>
                    </td>
            </tr>
            </table>
            <div>
                <input id="dir" type="text" name="Dirección"  placeholder="Dirección (*)" required value="<?php echo $rowd['direccion']; ?>"  /> 
                <label for="dir">Direccion (*)</label>
            </div>
            <div>
                <input id="inversion" type="text" name="Inversión"  placeholder="Inversión Total (*)" required isdecimal value="<?php echo $rowd['inversion']; ?>"  /> 
                <label for="inversion">Inversión Total (*)</label>
            </div>
            
            <div>
                <input id="inicial" type="text" name="Inicial"  placeholder="Pago Inicial (*)" required isdecimal value="<?php echo $rowd['vinicial']; ?>"  /> 
                <label for="inicial">Pago Inicial (*)</label>
            </div>
            <div>
                <input id="inicialp" type="text" name="Inicial_Pactado"  placeholder="Inicial Pactado (*)" required isdecimal value="<?php echo $rowd['vpactado']; ?>"  /> 
                <label for="inicialp">Inicial Pactado (*)</label>
            </div>
            
        </td>  
        
      </tr>
          <tr>
          <td colspan='5'>
           <div>
            <input id="obs" type="text" name="Observaciones"  placeholder="Observaciones (*)" required  value="<?php echo $rowd['observacion']; ?>" /> 
            <label for="obs">Observaciones (*)</label>
              </div>
          </td>
      </tr>
      </table>
      
      
      <table style="width:100%">
      <tr>
          <td colspan="5">
            <center><h5 style="margin:0px">Datos Factura</h5></center>
          </td>
      </tr>
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
          
      <table style="width:100%">
      <tr>
          <td colspan="5">
            <center><h5 style="margin:0px">Datos de Venta</h5></center>
          </td>
      </tr>
      <tr>
          <td>
              <div id="asesor1" >
                
              </div>
          </td>
          
          </tr>
      </table>
      
      <?php if ($_GET["id"]){    ?>
      <div style="border:solid;padding:10px; border-color:#274267">
      <?php 
      $query="select * from contrato_pagos where contrato=".$_GET["id"];    
       
        $resultado = $dbh->prepare($query);
        $resultado->execute(); 
        if ( $resultado->fetchColumn() == 0 ){    
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
                  <?php for ($a=1;$a<37;$a++){ ?>
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
      <?php } ?>
        </form>
          
      <div id="erroresmsgs"></div>
                
                <p></p>
                <?php if ($_GET["id"]){?>
                
                <?php } else { ?>                
                <button class="k-button" id="guardar" style="padding-top:5px">Guardar y Continuar</button>
                <?php } ?>
                </td></tr></table>
    </div>
        
<script>
    
$( "#salir" ).click(function() {
  
});
$( "#guardar" ).click(function() {

  if (valid()==true){
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'htrabajo',ofi:$("#ofi").val(),cod:$("#cod").val(),fecha:$("#fecha").val(),nomt1:$("#nomt1").val(),apet1:$("#apet1").val(),cedt1:$("#cedt1").val(),mailt1:$("#mailt1").val(),telt1:$("#telt1").val(),nomt2:$("#nomt2").val(),apet2:$("#apet2").val(),cedt2:$("#cedt2").val(),mailt2:$("#mailt2").val(),telt2:$("#telt2").val(),dir:$("#dir").val(),inversion:$("#inversion").val(),inicial:$("#inicial").val(),inicialp:$("#inicialp").val(),obs:$("#obs").val(),nombref:$("#nombref").val(),asesor1:$("#asesor1").val(),dirf:$("#dirf").val(),cedf:$("#cedf").val(),telf:$("#telf").val()},
          success: function(res){ 
                    if (res.length <10){
                        alert ('Su registro ha sido grabado')
                        //window.parent.$("#editwindow").data("kendoWindow").close();
                        document.location.href="htrabajog.php?id="+res
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
          data: {id:'forma_pago',cuota:$("#cuotas").val(),dia:$("#dia").val(),gracia:$("#gracia").val(),descripcion:$("#descripcion").val(),saldo:($("#inversion").val()-$("#inicial").val()),contrato:'<?php echo $_GET["id"] ?>'},
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
    
   
    $("#fecha").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    
    $("#fechamp").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    
    $("#asesor1").kendoDropDownList({
        dataTextField: "nom",
        dataValueField: "idempleados",
        optionLabel: "Asesor1 (*)",
        dataSource: {
            transport: {
                read:  {
                    url: "php/read.php",
                    dataType: "json",
                    data:{id:"asesor1"}
                },
            }
        }
    });
    $("#cuotas").kendoDropDownList();
    $("#gracia").kendoDropDownList();
    $("#dia").kendoDropDownList();
    $("#asesor1").data('kendoDropDownList').value("<?php echo $rowd['asesor1'] ?>");
    
    
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
<!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>


