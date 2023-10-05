<?php

require_once '../mandrill/src/Mandrill.php'; //Not required with Composer
$url=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
if ( strpos($url, '/') !== FALSE ){
	$url=explode('/', $url);
    array_pop($url);
	array_pop($url);
	$url=implode('/', $url);
}
$url= "http://".$_SERVER['SERVER_NAME'].$url."/mails/".$correo;
extract($_POST);

$destinatarios=array();

    //array('email' => "a2daniel@hotmail.com", 'type' => 'to' ),
    // array('email' => "developer@nivekstudio.com", 'type' => 'to'),
    //array('email' => 'ventas@inmovila.la', 'type' => 'cc'),
    //array('email' => $asesorares, 'type' => 'cc')
//$to=array('email' => "a2daniel@hotmail.com", 'type' => 'to' );
//array_push($destinatarios,$to);
$mails=explode(",",$mail);
for ($a=0;$a<count($mails);$a++){
    $to=array('email' => $mails[$a], 'type' => 'to' );
    array_push($destinatarios,$to);
}


$mandrill = new Mandrill('libDySZMJLI7OfSSPKACZA');

try{ 
     $message = array(
        'subject' => $asunto,
		'html' => $mensaje,//file_get_contents($url),
        'from_email' => 'info@innovatourclub.com',
        // 'from_email' => 'a2daniel@hotmail.com',
		'from_name' => 'INNOVA TOUR',
        'to' => $destinatarios,
        'global_merge_vars' => array(
            array('name' => 'nombres', 'content' => $nom),
            array('name' => 'telefono', 'content' => $tel),
            array('name' => 'comentario', 'content' => $com),
            array('name' => 'mail', 'content' => $mail),
           array('name' => 'idcotizar', 'content' => $idi),
            array('name' => 'contacto', 'content' => $contacto),
            array('name' => 'modelonom', 'content' => $modelonom),
        ),
         //'bcc_address' => 'ilovemesias@gmail.com',
         'preserve_recipients' => true,
    );
    $result = $mandrill->messages->send($message);  
} catch(Mandrill_Error $e) { 
    die('An error occurred while sending this email, please try again or contact us.'.get_class($e) . ' - ' . $e->getMessage()); 
}
?>