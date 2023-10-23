<?php
session_start();
$name = "";

require_once ("../clase.contacto.php");
$contacto = new contacto;
$contacto->modificar($_POST["id"], $_POST["nombre"], $_POST["telefono"], $_POST["email"], $_POST["direccion"], $_POST["grupo"], $_POST["loqse"]);
header ("Location:../index.php?contenido=contactos/contactos");
?>