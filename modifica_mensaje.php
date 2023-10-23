<?php
session_start();
$name = "";

require_once ("mensaje.clase.php");
$mensaje = new mensaje;
$mensaje->modificar($_POST["id"], $_POST["op"], $_POST["nombre"], $_POST["texto"]);
header ("Location:index.php?contenido=mensajes");
?>