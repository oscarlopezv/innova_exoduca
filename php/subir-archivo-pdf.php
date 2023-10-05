<?php
//print_r($_POST);
extract($_POST);
$name=uniqid('',true);
switch ($id){
	case "Subir":
	  if (move_uploaded_file($_FILES['Tarifario']['tmp_name'], "../pdf/".$name.".pdf")) {
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