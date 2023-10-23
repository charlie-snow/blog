<?php

class cita {

var $id;
var $codigo = '';
var $texto = '';
var $autor = '';
var $imagen = '';

function cita() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();

}

function insertar($texto, $autor, $imagen){

	$sql = "INSERT INTO citas";
	$sql .= " (texto_cita, autor_cita, imagen_cita) ";
	$sql .= "VALUES ('".$texto."', '".$autor."', '".$imagen."')";
	$this->conexion->ejecutar($sql);
}

function unaCita($codigo){

	require_once ("clase.generalista.php");
	$generador = new generaLista;
	if ($codigo == '') {
		$resultados = $generador->listaCitas(true);
		$cita = $resultados[rand(1,count($resultados))-1];
	} else {
		$sql = "SELECT C.id_cita, C.codigo, C.texto_cita, A.nombre_autor, A.imagen_autor ";
		$sql .= "FROM citas C INNER JOIN autores_citas A ON C.id_autor = A.id_autor";
		$sql .= " WHERE C.codigo = '".$codigo."'";
		$resultados = $this->conexion->matrizResultados($sql);
		$cita = $resultados[0];
	}
	$this->id = $cita[0];
	$this->codigo = $cita[1];
	$this->texto = $cita[2];
	$this->autor = $cita[3];
	$this->imagen = $cita[4];
}

}

?>