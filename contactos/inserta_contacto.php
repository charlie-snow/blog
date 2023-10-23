<?php

session_start();
require_once ("../clase.contacto.php");

$zona=-21600; //españa, coño!
$hora_sql = gmdate("H:i:s", time() + $zona);
$fecha = gmdate("Y-m-d", time() + $zona);

$contacto = new contacto;
$contacto->insertar($_POST["nombre"], $_POST["telefono"], $_POST["email"], $_POST["direccion"], $_POST["grupo"], $_POST["loqse"]);
header ("Location:../index.php?contenido=contactos/contactos&grupo=principal");
?>