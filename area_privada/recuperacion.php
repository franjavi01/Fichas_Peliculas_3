<h2>Te hemos enviado un email con tus datos de acceso</h2>
 


    <?php 
// Ejemplo super sencillo:
/*
mail("pepito@desarrolloweb.com,maria@guiartemultimedia.com","asuntillo","Este es el cuerpo del mensaje") 
*/




// sistema de envio por correo con PHP
$destinatario = "pepito@desarrolloweb.com"; 
$asunto = "Recuerdo de los datos de inicio de sesión"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Reseteo Contraseña</title> 
   <style>
   body{
    background:coral;
    font-family:sans-serif;
    text-align:center;
    padding:120px;
   }
   </style>
</head> 
<body> 
<h1>Recuerdo de los datos de inicio de sesión</h1> 
<p>Usuario: admin</p>
<p>Contraseña: admin</p>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: PHP sessions <no-reply@sesionesphp.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: info@sesionesphp.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: info@sesionesphp.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: miguelin@sesionesphp.com\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: superboss@sesionesphp.com,maria@sesionesphp.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
?>

<a href="index.php"> << Volver atrás </a>
