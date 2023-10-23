<?php
$name = "";
foreach ($_FILES["pictures"]["error"] as $key => $error) {
   if ($error == UPLOAD_ERR_OK) {
       $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
       //$name = $_FILES["pictures"]["name"][$key];
	   $ext = strrchr($_FILES["pictures"]["name"][$key], '.');
	   $name = $_POST["nombre_imagen"].$ext;
       move_uploaded_file($tmp_name, "imagenes/auto/"."$name");
   }
}

require_once("funcion.redimension.php");

thumbjpeg($name, 700);
?> 