<?php

require_once("clase.conexion.php");

$fecha = date("d-m-Y H:i");

//if ($_SERVER["REMOTE_ADDR"] != "192.168.0.66") {
	$unaconexion = new conexionMYSQL("charche_logs", "localhost", "charche_charche", "valeria");
	$unaconexion->conectar();
	$sql = "select veces from charche where ip = '".$_SERVER["REMOTE_ADDR"]."'";
	$veces = $unaconexion->unResultado ($sql);
		if (is_null($veces)) {
			$unaconexion->ejecutar ("insert into charche values ('".$_SERVER["REMOTE_ADDR"]."', '','1','".$fecha."', '".$_SERVER["HTTP_USER_AGENT"]."')");
		} else {
			$veces++;
			$unaconexion->ejecutar ("update charche set ip = '".$_SERVER["REMOTE_ADDR"]."', veces = '".$veces."', fecha = '".$fecha."', info = '".$_SERVER["HTTP_USER_AGENT"]."' where ip = '".$_SERVER["REMOTE_ADDR"]."'");
		}
//}
?>