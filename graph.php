<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="login.php" </script>' ;
}
include_once("php/conexion.php");

$sql=new conectar();
$sql->mysqlsrv(); 
extract($_GET);
$query="select concat(a.apellidos,' ',a.nombres) nom,
	(select count(*) from (select * from manifiesto where efectividad='Efectivo' and fecha between '$fi' and '$ff') emple
		where  liner=a.idempleados or closer1=a.idempleados or closer2=a.idempleados) Efectivo,
	(select count(*) from (select * from manifiesto where efectividad='No Efectivo' and fecha between '$fi' and '$ff' ) empleno
		where  liner=a.idempleados or closer1=a.idempleados or closer2=a.idempleados) no_efectivo
from empleados a
where a.idempleados in (".$_GET["e"].")";
	
	$resultado = $dbh->prepare($query);
	$resultado->execute();

while ($row = $resultado->fetch()){ 
    $nom[]='"'.$row["nom"].'"';
    $efe[]=$row["Efectivo"];
    $noefe[]=$row["no_efectivo"];
}
$nom=implode(',',$nom);
$efe=implode(',',$efe);
$noefe=implode(',',$noefe);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="vendors/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="vendors/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
    <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
	</style>
    <script src="vendors/kendoui/js/jquery.min.js"></script>
    <script src="vendors/kendoui/js/kendo.all.min.js"></script>  
    <script src="vendors/kendoui/js/cultures/kendo.culture.es-EC.min.js"></script>  
      
    <script src="vendors/kendoui/js/messages/kendo.messages.es-EC.min.js"></script>  
    

</head>
<body>
<div id="example">
    <div class="box wide">
        
        <div class="box-col">
            <button class='export-pdf k-button'>Guardar PDF</button>
        </div>
    </div>
    <div class="demo-section k-content wide">
        <div id="chart"></div>
    </div>
    <div class="box-col">
            <h4>API Functions</h4>
            <ul class="options">
                <li>
                    <input id="typeColumn" name="seriesType"
                                type="radio" value="column" checked="checked" autocomplete="off" />
                    <label for="typeColumn">Columns</label>
                </li>
                <li>
                    <input id="typeBar" name="seriesType"
                                type="radio" value="bar" autocomplete="off" />
                    <label for="typeBar">Bars</label>
                </li>
                
                <li>
                    <input id="stack" type="checkbox" autocomplete="off" checked="checked" />
                    <label for="stack">Stacked</label>
                </li>
            </ul>
            
        </div>
    <script>
        var series = [{
            name: "Efectivo",
            data: [<?php echo $efe ?>],
            color: "#00f"

        }, {
            name: "No efectivo",
            data: [<?php echo $noefe ?>] ,
            color: "#f00"
        }];
        $(".export-pdf").click(function() {
            $("#chart").getKendoChart().saveAsPDF();
        });
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    text: "Manifiestos (Efectivos-No efectivos)"
                },
                legend: {
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "column",
                    stack: true
                },
                series: series,
                valueAxis: {
                    line: {
                        visible: false
                    }
                },
                categoryAxis: {
                    categories: [<?php echo $nom ?>],
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}"
                }
            });
        }

        $(document).ready(function() {
            createChart();
            $(document).bind("kendo:skinChange", createChart);
            $(".options").bind("change", refresh);
        });

        function refresh() {
            var chart = $("#chart").data("kendoChart"),
                type = $("input[name=seriesType]:checked").val(),
                stack = $("#stack").prop("checked");

            for (var i = 0, length = series.length; i < length; i++) {
                series[i].stack = stack;
                series[i].type = type;
            };

            chart.setOptions({
                series: series
            });
        }
    </script>
</div>


</body>
</html>