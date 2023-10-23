<?php

class conexionMYSQL {

var $basedatos = '';
var $servidor = '';
var $usuario = '';
var $clave = '';

var $enlace = 0;
var $consulta = 0;

function conexionMYSQL($basedatos = 'charche_charche', $servidor = 'localhost', $usuario = 'charche_charche', $clave = 'charche') {

	$this->basedatos = $basedatos;
	$this->servidor = $servidor;
	$this->usuario = $usuario;
	$this->clave = $clave;

}

/*----------------------------- CONEXION --------------------------------------------*/

function conectar() {

	$this->enlace = mysql_connect ($this->servidor, $this->usuario, $this->clave);
	if (!$this->enlace) {
		echo ("error al conectar");
		return 0;												//para que salga
	}

	mysql_select_db ($this->basedatos, $this->enlace) or die ("error al acceder a la BD");
}

function desconectar() {

	if ($this->enlace) {
		mysql_close($this->enlace);
	} else {
		echo ("no hay bases de datos abiertas");
	}
}

/*----------------------------- ACCIONES --------------------------------------------*/

function ejecutar ($sql) {

	if ($sql == "") {
		echo ("error: no se ha especificado la consulta sql");
		return 0; 												//para que salga
	}

	$this->consulta = mysql_query ($sql, $this->enlace);
	if (!$this->consulta) {
		echo ("fallo al realizar la consulta sql");
	}
}

function matrizResultados ($sql){

	$this->ejecutar($sql);
	$i=0;
	while ($columna = mysql_fetch_row ($this->consulta)) {
		$resultados [$i] = $columna;
		$i++;
	}
	return $resultados;
}

function unResultado ($sql){

	$this->ejecutar($sql);
	$i=0;
	$resultados = mysql_fetch_row ($this->consulta);
	return $resultados[0];
}
}

?>