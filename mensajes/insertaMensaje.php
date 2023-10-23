<?php

session_start();
require_once ("clase.conexion.php");
$IP_REMOTA = getenv('REMOTE_ADDR');

$zona=-21600; //españa, coño!
$hora_sql = gmdate("H:i:s", time() + $zona);
$fecha = gmdate("Y-m-d", time() + $zona);

$conexion = new conexionMYSQL;
$conexion->conectar ();
$sql = "INSERT INTO mensajes";
$sql .= " (dia_mensaje, hora_mensaje, nombre, texto_mensaje, ip) ";
$sql .= "VALUES ('".$fecha."', '".$hora_sql."', '".$_POST["nombre"]."', '".$_POST["textomensaje"]."', '".$IP_REMOTA."')";
$conexion->ejecutar($sql);
header ("Location:index.php?contenido=portada");
?>