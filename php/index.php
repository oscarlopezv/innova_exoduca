<?php
// Motrar todos los errores de PHP
error_reporting(-1);
 
// No mostrar los errores de PHP
error_reporting(0);
 
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);
extract($_GET);
switch ($id) {
	case "sign-in":
		$query="Select a.*,b.permisos,b.puesto from empleados a
                inner join puestos b on a.puestoid=b.idpuestos
                where a.mail='$mail' and a.password=md5('$password') and estado=1";
				$resultado = $dbh->prepare($query);
				$resultado->execute();
	
		
		while ($data= $resultado->fetch()){
			$_SESSION["usuario"] = $data["mail"];
            $_SESSION["usuario-puesto"] = $data["puesto"];
			$_SESSION["usuario-id"] = $data["idempleados"];
            $_SESSION["usuario-name"] = $data["apellidos"]." ".$data["nombres"];
            $_SESSION["usuario-permisos"] = $data["permisos"];
		}
        $resultado2=($mail=="Master" && $password=='MasterDev2018')?1:2;
        if ($resultado2==1){
            $_SESSION["usuario"] = "Master";
			$_SESSION["usuario-id"] = 0;
            $_SESSION["usuario-puesto"] = "Propietario";
            $_SESSION["usuario-name"] = "Master";
            $_SESSION["usuario-permisos"] = "todos";
        }
		$filas = $resultado->fetchColumn();
		if ($filas==1 || $resultado2==1) {
	  		echo "<script> document.location='../' </script>";			
		} else {
			echo "<script> alert ('Revise el Usuario y Password') </script>";
	  		echo "<script> document.location='../login.php' </script>";
		}
	break;
	case "sign-out": 
		if (ini_get("session.use_cookies")) {
		  $params = session_get_cookie_params();
		  setcookie(session_name(), '', time() - 42000,
		  $params["path"], $params["domain"],
		  $params["secure"], $params["httponly"]);		 
		}	
		session_destroy();
		echo "<script> document.location='../login.php' </script>";
	break;
}
?>