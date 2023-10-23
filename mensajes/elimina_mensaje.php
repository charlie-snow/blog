<?php
session_start();
require_once ("mensaje.clase.php");
$mensaje = new mensaje;
$mensaje->eliminar($HTTP_GET_VARS["id_mensaje"], $HTTP_GET_VARS["op"]);
header ("Location:index.php?contenido=mensajes");
?>