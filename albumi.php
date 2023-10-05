<?php 
include_once("php/conexion.php");
$rowd['imagen']='jpg.png';
if ($_GET["id"]){
$sql=new conectar();
$sql->mysqlsrv();
$query="select *  from proyectos where idproyectos=".$_GET["id"]."";
$resultado = $dbh->prepare($query);
$resultado->execute();
$rowd = $resultado->fetch();

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  


     <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
        <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
      <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script> 
    
    <!-- Demo page code -->
    <style>
        .k-upload{
            width:100%
        }
	h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: inherit;
  font-weight: 500;
  line-height: 1.1;
  color: inherit;
}
h1 small,
h2 small,
h3 small,
h4 small,
h5 small,
h6 small,
.h1 small,
.h2 small,
.h3 small,
.h4 small,
.h5 small,
.h6 small,
h1 .small,
h2 .small,
h3 .small,
h4 .small,
h5 .small,
h6 .small,
.h1 .small,
.h2 .small,
.h3 .small,
.h4 .small,
.h5 .small,
.h6 .small {
  font-weight: normal;
  line-height: 1;
  color: #777;
}
h1,
.h1,
h2,
.h2,
h3,
.h3 {
  margin-top: 20px;
  margin-bottom: 10px;
}
h1 small,
.h1 small,
h2 small,
.h2 small,
h3 small,
.h3 small,
h1 .small,
.h1 .small,
h2 .small,
.h2 .small,
h3 .small,
.h3 .small {
  font-size: 65%;
}
h4,
.h4,
h5,
.h5,
h6,
.h6 {
  margin-top: 10px;
  margin-bottom: 10px;
}
h4 small,
.h4 small,
h5 small,
.h5 small,
h6 small,
.h6 small,
h4 .small,
.h4 .small,
h5 .small,
.h5 .small,
h6 .small,
.h6 .small {
  font-size: 75%;
}
h1,
.h1 {
  font-size: 36px;
}
h2,
.h2 {
  font-size: 30px;
}
h3,
.h3 {
  font-size: 24px;
}
h4,
.h4 {
  font-size: 18px;
}
h5,
.h5 {
  font-size: 14px;
}
h6,
.h6 {
  font-size: 12px;
}
        
        .k-textbox .k-icon {
    top: 50%;
    margin: -8px -6px 3px;
    position: absolute;
}
	</style>
    
  </head>
  <body style="background:#FFFFFF; padding:10px">

                <table style=" width:100%"><tr><td valign="top" style="padding:5px">
                
                <h5>Imagenes:</h5> 
                
                <input name="archivo" id="slideis" type="file"/>
                <div class="demo-section">
                    <div id="listViewis"></div>
                    <div id="pager" class="k-pager-wrap"></div>
                </div>
                <h5>URL:</h5>
                <input id="url" type="text" style="width:100%" /> <br> 
                
                </td></tr></table>
    </div>

<script type="text/x-kendo-template" id="templateis">
<div class="product">
    
	<img src="images/#= kendo.toString(imagen, 'n0') #" alt="#: imagen # image" />
    
    
	<p><a href="Javascript:"  onClick="geturl('#= kendo.toString(imagen, 'n0')  #')">URL</a></i></a></p>
    
</div>
</script>

<script>
   
var onSelect2 = function(e) {
	
    $.each(e.files, function(index, value) {
	  ok=[".jpg",".JPG",".gif",".GIF",".PNG",".png"]
      if($.inArray(value.extension,ok)==-1) {
        e.preventDefault();
        alert("Por favor cargue un archivo tipo Imagen o Video");
      }
    });
};

function getFileInfo(e) {
	return $.map(e.files, function(file) {
		var info = file.name+'.'+file.extension;
		return info;
	}).join(", ");
}
     
     var onSuccessS2=function(e){
                $.ajax({
                  type: "GET",
                  url: 'php/crear.php',
                  data: {id:'albumi',imagen:e.response.newName},
                  complete: function(){ 
                        var listView = $("#listViewis").data("kendoListView");
                        listView.dataSource.read();;
                  },

                });
            
        }
function geturl(a){
    
    $("#url").val("http://crm.innovatourclub.com/images/"+a)
}
$(document).ready(function() {
    
    
    
    
    $("#slideis").kendoUpload({
            async: {
                saveUrl: "php/subir-archivo.php",
                autoUpload: true,							
            },
            showFileList: false,
            select: onSelect2,
            upload: function (e) {
                var ext
                var date = new Date();
                $.each(e.files, function(index, value) {
                  ext=value.extension
                });		
                e.data = { id:"Subir",archivo:ext};
            },
            success: onSuccessS2,
        });	
        
        var dsslide = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "php/read.php",
                        dataType: "json",
                        data:{id:"albumi"}
                    }
                },
            });
        $("#listViewis").kendoListView({
            dataSource: dsslide,
            template: kendo.template($("#templateis").html())
        });
    

	
});
</script>

  <style scoped>
        .demo-section {
            border: 0;
            background: none;
        }
        #listView {
            padding: 10px;
            margin-bottom: -1px;
            height: 170px;
            overflow-y: scroll
        }
        #listViewis {
            padding: 10px;
            margin-bottom: -1px;
            height: 170px;
            overflow-y: scroll
        }
      #listViewf {
            padding: 10px;
            margin-bottom: -1px;
            height: 170px;
            overflow-y: scroll
        }
        .product {
            float: left;
            position: relative;
            width: 130px;
            height: 170px;
            margin: 5px;
            padding: 0;
        }
        .product img {
            width: 130px;
            height: 120px;
        }
		.product input {
            width: 90px;
			height:25px;
            margin-top: 5px
        }
        .product button {
            
			height:25px;
            margin-top: 5px
        }
        .product h3 {
            margin: 0;
            padding: 3px 5px 0 0;
            max-width: 96px;
            overflow: hidden;
            line-height: 1.1em;
            font-size: .9em;
            font-weight: normal;
            text-transform: uppercase;
            color: #999;
        }
        .product p {
            visibility: hidden;
        }
        .product a {
            color: #c9dd0b;
            font-size: 17px;
            -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
        }
        .product:hover p {
			
            visibility: visible;
            position: absolute;
            width: 130px;
            height: 120px;
            top: 0;
            margin: 0;
            padding: 0;
			text-align:center;
            line-height: 110px;			           
            color:#FFFFFF;
            background-color: rgba(0,0,0,0.75);
            transition: background .2s linear, color .2s linear;
            -moz-transition: background .2s linear, color .2s linear;
            -webkit-transition: background .2s linear, color .2s linear;
            -o-transition: background .2s linear, color .2s linear;
        }
		.product:hover p a i {			
			 position:absolute; margin:0px 15px        }
        .k-listview:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }
    </style>
  </body>
</html>


