<html>
<head>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
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

	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
      
    
    <!-- Custom Theme Style -->
    
</head>
<body>
    <p></p>
<span style="margin-top:20px;padding:20px">
Fecha de Salida: <input type="text" id="fsalida"  />
    <button type="button" id="salida" class="k-button">Registrar</button>
  </span>  
    
<script>
    
$( "#salida" ).click(function() { 
 
  if ($( "#fsalida" ).val()!=""){
     
      
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'salidae',fsalida:$("#fsalida").val(),ide:'<?php echo $_GET["id"] ?>'},
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
    
<!-- Initialize the Grid -->
$(document).ready(function () {	
    $("#fsalida").kendoDatePicker({
       
        format: "yyyy-MM-dd",
        placeholder:"asd"
    });
    $("#fsalida").click(function() {
        var datepicker = $("#fsalida").data("kendoDatePicker");
        datepicker.open();
    });
    
})
</script>
</body>
</html>