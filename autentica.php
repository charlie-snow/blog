<?php

session_start();
$login = $_POST['usr'];
$password_introducido = $_POST['password'];
require_once ("clase.conexion.php");
//require_once ("usuario.clase.php");
require_once ("comprobarDatos.php");
if (validarAutentica($login, $password_introducido)) {
	$conexion = new conexionMYSQL;
	$conexion->conectar ();
	$sql = "SELECT password, activo FROM usuarios WHERE login = '".$login."'";
	$resultados = $conexion->matrizResultados($sql);
	if (sizeof($resultados) == 0) {
		$_SESSION['usuario_online'] = "visitante";
		$_SESSION['id_usuario_online'] = -1;
		$error = "usuario no registrado";
		$ir_a = "generaErrorInicio.php?error=".$error;
	} else {
		$password = $resultados[0][0];
		$activo = $resultados[0][1];
		if (($activo) AND ($password_introducido == $password)) {
			$sql = "SELECT id_usuario FROM usuarios WHERE login = '".$login."'";
			$resultados = $conexion->matrizResultados($sql);
			$_SESSION['usuario_online'] = $login;
			$_SESSION['id_usuario_online'] = $resultados[0][0];
			if ($login == 'admin') {
				$ir_a = "index.php";
			} else {
				$ir_a = "index.php";
			}
		} else {
			$_SESSION['usuario_online'] = "visitante";
			$_SESSION['id_usuario_online'] = -1;
			$error = "password erróneo o usuario inactivo";
			$ir_a = "generaErrorInicio.php?error=".$error;
		}
	}
} else {
	$error = "caracteres no permitidos";
	$ir_a = "generaErrorInicio.php?error=".$error;
}
header ("Location: ".$ir_a);
?>