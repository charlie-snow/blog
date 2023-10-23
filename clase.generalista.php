<?php

class generaLista {

function generaLista() {

	require_once ("clase.conexion.php");
	$this->conexion = new conexionMYSQL;
	$this->conexion->conectar();

}

function generarListaLogs(){

	$sql = "SELECT id_log, dia_log, hora_log, texto_log FROM noticias ";
	$sql .= "ORDER BY dia_log DESC, hora_log DESC";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaMensajes(){

	$sql = "SELECT dia_mensaje, hora_mensaje, nombre, texto_mensaje FROM mensajes";
	$sql .= " ORDER BY dia_mensaje, hora_mensaje";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaMensajesJupiter(){

	$sql = "SELECT dia_mensaje, hora_mensaje, nombre, texto_mensaje FROM mensajes_jupiter";
	$sql .= " ORDER BY dia_mensaje, hora_mensaje";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaArticulos_ant(){

	$sql = "SELECT dia_articulo, hora_articulo, nombre_articulo, texto_articulo FROM articulos";
	$sql .= " ORDER BY id_articulo DESC";
	// $sql .= " ORDER BY dia_articulo, hora_articulo";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaArticulos(){

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

function listaBloques($articulo){

	$sql = "SELECT * FROM bloques WHERE articulo_bloque=".$articulo;
	$bloques = $this->conexion->matrizResultados($sql);
	
	return $bloques;
}

function listaContactos($grupo){

	$sql = "SELECT nombre,telefono,email FROM contactos";
	$sql .= " WHERE grupo='".$grupo."' ORDER BY nombre";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaCitas($activas){

	$sql = "SELECT C.id_cita, C.codigo, C.texto_cita, A.nombre_autor, A.imagen_autor ";
	$sql .= "FROM citas C INNER JOIN autores_citas A ON C.id_autor = A.id_autor";
	//$sql = "SELECT id_cita, codigo, texto_cita, autor_cita, imagen_cita FROM citas";
	if ($activas = true) {
		$sql .= " WHERE activa_cita=1";
	}
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

function listaImagenes(){

	$sql = "SELECT * FROM imagenes";
	$resultados = $this->conexion->matrizResultados($sql);
	return $resultados;
}

}

?>