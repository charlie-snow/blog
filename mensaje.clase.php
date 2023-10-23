<?php

class mensaje {

var $id;
var $op;
var $dia;
var $hora;
var $nombre = '';
var $texto = '';
var $ip;

var $bloques;

function mensaje() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();

}

function get($id, $op){

	$sql = "SELECT * FROM mensajes";
	if ($op != "") {
		$sql .= "_".$op;
	}
	$sql .= " WHERE id_mensaje = '".$id."'";
	$resultado = $this->conexion->matrizResultados($sql);
	$this->id = $resultado[0][0];
	$this->dia = $resultado[0][1];
	$this->hora = $resultado[0][2];
	$this->nombre = $resultado[0][3];
	$this->texto = $resultado[0][4];
	$this->ip = $resultado[0][5];
}

function insertar($op, $nombre, $imagen, $texto){

	$zona=7200; //españa, coño!
	$hora_sql = gmdate("H:i:s", time() + $zona);
	$fecha = gmdate("Y-m-d", time() + $zona);
	
	$sql = "SELECT max(id_mensaje) FROM mensajes";
	$resultado = $this->conexion->matrizResultados($sql);
	$siguiente = $resultado[0][0]+1;

	$sql = "INSERT INTO mensajes";
	$sql .= " (id_mensaje, dia_mensaje, hora_mensaje, nombre_mensaje, img_mensaje, texto_mensaje) ";
	$sql .= "VALUES (".$siguiente.", '".$fecha."', '".$hora_sql."', '".$nombre."',  '".$imagen."','".$texto."')";
	$this->conexion->ejecutar($sql);
}

function modificar($id, $op, $nombre, $texto){

	$sql = "UPDATE mensajes";
	if ($op != "") {
		$sql .= "_".$op;
	}
	$sql .= " SET ";
	$sql .= "nombre = '".$nombre."', ";
	$sql .= "texto_mensaje = '".$texto."'  ";
	$sql .= "WHERE id_mensaje ='".$id."' LIMIT 1 ";
	$this->conexion->ejecutar($sql);
}

function eliminar($id, $op){

	$sql = "DELETE FROM mensajes";
	if ($op != "") {
		$sql .= "_".$op;
	}
	$sql .= " WHERE id_mensaje = '".$id."'";
	$this->conexion->ejecutar($sql);
}

function lista($op){
	
	$sql = "SELECT id_mensaje, dia_mensaje, hora_mensaje, nombre, texto_mensaje FROM mensajes";
	if ($op != "") {
		$sql .= "_".$op;
	}
	$sql .= " ORDER BY dia_mensaje, hora_mensaje";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

}

?>