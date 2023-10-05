<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");
include_once("php/validarpermisos.php"); 

?>
<!DOCTYPE html>
<html lang="es">
  <head>
   
    <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
    
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
      
    
  </head>

  <body>
   
                                <textarea id="editor"></textarea><br>
                                <button id="guardar" class="k-button">Guardar</button>
      <script>
$( "#guardar" ).click(function() { 
 
  if ($("#editor").data("kendoEditor").value()!=""){
     
      
      $.ajax({
          type: "POST",
          url: 'php/crear.php',
          data: {id:'novedade',novedad:$("#editor").data("kendoEditor").value(),idc:'<?php echo $_GET["id"] ?>'},
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
	
   
      
     
    var defaultTools = kendo.ui.Editor.defaultTools;
defaultTools["insertParagraph"].options.shift = true;
$("#editor").kendoEditor({
            tools: [
                "bold",
                "italic",
                "underline",
                "justifyLeft",
                "justifyCenter",
                "justifyRight",
                "justifyFull",
                "insertUnorderedList",
                "insertOrderedList",
                "indent",
                "outdent",
                "createLink",
                "unlink",
                "foreColor",
				"cleanFormatting",
            ]
        });
    
})

</script>
      
	
  </body>
  
</html>
