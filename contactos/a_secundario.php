<?php
session_start();
require_once ("clase.contacto.php");
$contacto = new contacto;
$contacto->a_secundario($HTTP_GET_VARS["id_contacto"]);
header ("Location:../index.php?contenido=contactos/contactos");
?>
