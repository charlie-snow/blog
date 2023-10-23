<?php

class articulo {

var $id;
var $dia;
var $hora;
var $nombre = '';
var $imagen = '';
var $texto = '';
var $bloques;

function articulo() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();

}

function get($id){

	$sql = "SELECT * FROM articulos WHERE id_articulo = '".$id."'";
	$resultado = $this->conexion->matrizResultados($sql);
	$this->id = $resultado[0][0];
	$this->dia = $resultado[0][1];
	$this->hora = $resultado[0][2];
	$this->nombre = $resultado[0][3];
	$this->imagen = $resultado[0][4];
	$this->texto = $resultado[0][5];
}

function insertar($nombre, $imagen, $texto){

	$zona=7200; //españa, coño!
	$hora_sql = gmdate("H:i:s", time() + $zona);
	$fecha = gmdate("Y-m-d", time() + $zona);
	
	$sql = "SELECT max(id_articulo) FROM articulos";
	$resultado = $this->conexion->matrizResultados($sql);
	$siguiente = $resultado[0][0]+1;

	$sql = "INSERT INTO articulos";
	$sql .= " (id_articulo, dia_articulo, hora_articulo, nombre_articulo, img_articulo, texto_articulo) ";
	$sql .= "VALUES (".$siguiente.", '".$fecha."', '".$hora_sql."', '".$nombre."',  '".$imagen."','".$texto."')";
	$this->conexion->ejecutar($sql);
}

function modificar($id, $nombre, $imagen, $texto){

	$sql = "UPDATE articulos SET ";
	$sql .= "nombre_articulo = '".$nombre."', ";
	$sql .= "texto_articulo = '".$texto."'  ";
	$sql .= "WHERE id_articulo ='".$id."' LIMIT 1 ";
	$this->conexion->ejecutar($sql);
}

function eliminar($id){

	$sql = "DELETE FROM articulos WHERE id_articulo = '".$id."'";
	$this->conexion->ejecutar($sql);
}

function getUltimo(){

	$sql = "SELECT max(id_articulo) FROM articulos";
	$result = $this->conexion->matrizResultados($sql);
	$ultimo = $result[0][0];
	
	$sql = "SELECT * FROM articulos WHERE id_articulo=".$ultimo;
	$resultado = $this->conexion->matrizResultados($sql);
	$this->id = $resultado[0][0];
	$this->dia = $resultado[0][1];
	$this->hora = $resultado[0][2];
	$this->nombre = $resultado[0][3];
	$this->imagen = $resultado[0][4];
	$this->texto = $resultado[0][5];
}

function getColumna($id_columna){

	$sql = "SELECT * FROM columnas WHERE id_columna=".$id_columna;
	$columna = $this->conexion->matrizResultados($sql);
	return $columna;
}

function getImagen($id_imagen){

	$sql = "SELECT * FROM imagenes WHERE id_imagen=".$id_imagen;
	$imagen = $this->conexion->matrizResultados($sql);
	return $imagen;
}

function lista(){

	$sql = "SELECT * FROM articulos";
	$sql .= " ORDER BY id_articulo DESC";
	$articulos = $this->conexion->matrizResultados($sql);
	/*for ($i=0; $i<=count($articulos); $i++) {
		$sql = "SELECT * FROM bloques WHERE articulo_bloque=".$articulos[$i][0];
		//echo $sql;
		$bloques = $this->conexion->matrizResultados($sql);
		for ($j=0; $j<=count($bloques); $j++) {
			$sql = "SELECT * FROM columna WHERE id_columna=".$bloques[$j][3];
			$columna = $this->conexion->matrizResultados($sql);
			$bloques[$j][6] = $columna;
		}
		$articulos[$i][5] = $bloques;
	}*/
	
	return $articulos;
}

function activarImagen($nombre_imagen){

	$sql = "SELECT * FROM imagenes WHERE nombre_imagen='".$nombre_imagen."'";
	$imagen = $this->conexion->matrizResultados($sql);
	if ($imagen[0][0] == null) {
		$sql = "INSERT INTO imagenes (nombre_imagen, pie_imagen) ";
		$sql .= "VALUES ('".$nombre_imagen."', '')";
		$this->conexion->ejecutar($sql);
	}
	return $imagen;
}

}

?>