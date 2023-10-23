<?php

class log {

/*var $dia_log;
var $hora_log;*/
var $texto_log;
var $error = "datos de log no válidos";


function log() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();
}

function validar() {

	require_once ("comprobarDatos.php");
	return validarLog($this->texto_log);
}

function insertar (){

	$sql = "INSERT INTO logs (dia_log, hora_log, texto_log)";
	$sql = $sql." VALUES (NOW(), NOW(), '".$this->texto_log."')";
	//if ($this->validar()) {
		$this->conexion->ejecutar($sql);
	//} else {
		//return 1;  // si los datos no son válidos
	//}
}
/*
function activar($id_log) {

	$sql = "UPDATE logs SET activa_log='1' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function desactivar($id_log) {

	$sql = "UPDATE logs SET activa_log='0' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function Aarticulo($id_log) {

	$sql = "UPDATE logs SET articulo='1' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function Alog($id_log) {

	$sql = "UPDATE logs SET articulo='0' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function Ajupiter($id_log) {

	$sql = "UPDATE logs SET jupiter='1' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function Atierra($id_log) {

	$sql = "UPDATE logs SET jupiter='0' WHERE id_log='".$id_log."'";
	$this->conexion->ejecutar($sql);
}*/

function eliminar($id_log){

	$sql = "DELETE FROM logs WHERE id_log= '".$id_log."'";
	$this->conexion->ejecutar($sql);
}

function actualizar($id_log){

	$sql = "UPDATE logs SET texto_log='".$this->texto_log."'";
	$sql .= " WHERE id_log='".$id_log."'";
	//if ($this->validar()) {
		$this->conexion->ejecutar($sql);
	//} else {
		//return 1;
	//}
}

function recuperar($id_log){

	$sql = "SELECT dia_log, hora_log, texto_log FROM logs WHERE id_log='".$id_log."'";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

}

?>