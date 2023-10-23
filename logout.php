<?php

	session_start();
	$usuario_online = "visitante";
	$id_usuario_online = -1;
	$usuario_admin = "";
	$id_usuario_admin = -1;
	$_SESSION['usuario_online'] = "visitante";
	$_SESSION['id_usuario_online'] = -1;
	$_SESSION['usuario_admin'];
	$_SESSION['id_usuario_admin'];
	header ("Location: index.php");

?>