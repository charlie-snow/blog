<?php
	require_once ("../clase.conexion.php");
	$conexion = new conexionMYSQL;
	$conexion->conectar();
	$sql = str_replace("\\", "" , $_POST["sql"]);
	$conexion->ejecutar($sql);
	header ("Location:../index.php");
?>