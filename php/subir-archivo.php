<?php
//print_r($_POST);
extract($_POST);
$name=uniqid('',true);
switch ($id){
	case "Subir":
	  if (move_uploaded_file($_FILES['archivo']['tmp_name'], "../images/".$name.$archivo)) {
	  	echo '{"newName":"'.$name.$archivo.'"}';
	  } else {
		  echo "¡Posible ataque de carga de archivos!\n".$_FILES['archivo']['tmp_name'];
	  }
	  
    break;
	case "Eliminar":
		if (unlink('../images/'.$archivo)){
		} else {
			echo "No se pudo eliminar";
		}
	break;
}
?>