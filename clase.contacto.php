<?php

class contacto {

var $id;
var $nombre;
var $telefono;
var $email = '';
var $direccion = '';
var $zona = '';
var $fecha_nacimiento;
var $telefono2;
var $email2 = '';
var $direccion2 = '';
var $zona2 = '';
var $notas;
var $agenda2;
var $grupo;
var $fecha;
var $loqse;

function contacto() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();

}

function consultar($id){

	$sql = "SELECT * FROM contactos WHERE id = '".$id."'";
	$resultado = $this->conexion->matrizResultados($sql);
	
	$this->id = $resultado[0][0];
	$this->nombre = $resultado[0][1];
	$this->telefono = $resultado[0][2];
	$this->email = $resultado[0][3];
	$this->direccion = $resultado[0][4];
	$this->zona = $resultado[0][5];
	$this->fecha_nacimiento = $resultado[0][6];
	$this->telefono2 = $resultado[0][7];
	$this->email2 = $resultado[0][10];
	$this->direccion2 = $resultado[0][8];
	$this->zona2 = $resultado[0][9];
	$this->notas = $resultado[0][11];
	$this->agenda2 = $resultado[0][12];
	$this->grupo = $resultado[0][13];
	$this->fecha = $resultado[0][14];
	$this->loqse = $resultado[0][15];
}

function insertar($nombre, $telefono, $email, $direccion, $grupo, $loqse){

	$sql = "INSERT INTO `contactos` ( `id` , `nombre` , `telefono` , `email` , `direccion` , `zona` , `fecha_nacimiento` , `telefono2` , `direcion2` , `zona2` , `e-mail2` , `notas` , `agenda2` , `grupo`, `fecha`, `loqse` ) ";
	$sql .= "VALUES (
NULL , '".$nombre."', '".$telefono."', '".$email."', '".$direccion."', NULL , NULL , NULL , NULL , NULL , NULL , NULL , '0', '".$grupo."', '".$fecha."', '".$loqse."');";
	$this->conexion->ejecutar($sql);
}

function modificar($id, $nombre, $telefono, $email, $direccion, $grupo, $loqse){

	$sql = "UPDATE contactos";
	$sql .= " SET ";
	$sql .= "nombre = '".$nombre."', ";
	$sql .= "telefono = '".$telefono."', ";
	$sql .= "email = '".$email."', ";
	$sql .= "direccion = '".$direccion."', ";
	$sql .= "grupo = '".$grupo."', ";
	$sql .= "loqse = '".$loqse."' ";
	$sql .= "WHERE id ='".$id."' LIMIT 1 ";
	$this->conexion->ejecutar($sql);
}

function eliminar($id){

	$sql = "DELETE FROM contactos";
	$sql .= " WHERE id = '".$id."'";
	$this->conexion->ejecutar($sql);
}

function a_secundario($id){

	$sql = "UPDATE contactos";
	$sql .= " SET ";
	$sql .= "grupo = 'secundario' ";
	$sql .= "WHERE id ='".$id."' LIMIT 1 ";
	$this->conexion->ejecutar($sql);
}

function lista($grupo){

	if ($grupo=="") { $grupo='principal'; };
	$sql = "SELECT * FROM contactos";
	$sql .= " WHERE grupo='".$grupo."' ORDER BY nombre";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function cuantos(){

	$sql = "SELECT COUNT(id) FROM contactos";
	$resultado = $this->conexion->matrizResultados($sql);
	
	return $resultado[0][0];
}

function buscar($nombre){

	$sql = "SELECT * FROM `contactos`";
	$sql .= "WHERE `nombre` LIKE CONVERT( _utf8 '%".$nombre."%'";
	$sql .= "USING latin1 ) COLLATE latin1_swedish_ci LIMIT 0 , 30";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function grupos(){

	$sql = "SELECT DISTINCT grupo FROM contactos ORDER BY grupo";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function dump(){

	$sql = "SELECT * FROM contactos ORDER BY id";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function csv($grupo){

	if ($grupo=="") { $grupo='principal'; };
	$sql = "SELECT id, nombre,email,telefono FROM contactos";
	$sql .= " WHERE grupo='".$grupo."' ORDER BY nombre";
	$resultados = $this->conexion->matrizResultados($sql);
	
	$csv = "\"name\",\"email\",\"telefono\"<br>";
	for ($i=0; $i<count($resultados); $i++) {
		$csv = $csv."\"".$resultados[$i][1]."\",\"".$resultados[$i][2]."\",\"".$resultados[$i][3]."\"<br>";
	}
	return $csv;
}

}

?>