<?php
session_start();
$name = "";
//require_once ("sir.php");

require_once ("clase.articulo.php");
$articulo = new articulo;
$articulo->insertar($_POST["nombre"], "peq_".$name, $_POST["texto"]);
header ("Location:index.php?contenido=articulos");
?>