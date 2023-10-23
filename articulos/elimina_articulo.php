<?php
session_start();
require_once ("clase.articulo.php");
$articulo = new articulo;
$articulo->eliminar($HTTP_GET_VARS["id_articulo"]);
header ("Location:index.php?contenido=articulos");
?>