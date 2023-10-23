<?php

session_start();
require_once("mensaje.clase.php");
$mensaje = new mensaje;
$usuario = 'visitante';
if (isset ($_SESSION['usuario_online'])){
	if ($_SESSION['usuario_online'] == 'admin') {
		$usuario = 'admin';
	}
}
?>

<?php include "estilos-links.php"; ?>

<?php
if ($usuario == 'admin') {
	include "form_inserta_mensaje.php";
} ?>

<table width="800" border="0" cellspacing="10" cellpadding="0">
	
	<?php	$mensajes = $mensaje->lista('');	?>
	
	<?php include "estilos-links.php"; ?>
	
	<?php
	/*$cuantos = 100;
	for ($i=count($resultados)-1; $i>(count($resultados)-$cuantos); $i--) {*/
	for ($i=0; $i<=count($mensajes)-1; $i++) {
		/*$dia=substr($mensajes[$i][1], 8, 2).".".substr($mensajes[$i][1], 5, 2).".".substr($mensajes[$i][1], 2, 2);
		$hora=substr($mensajes[$i][2], 0, 5);*/

		$mensaje->id = $mensajes[$i][0];
		$mensaje->dia = $mensajes[$i][1];
		$mensaje->hora = $mensajes[$i][2];
		$mensaje->nombre = $mensajes[$i][3];
		$mensaje->imagen = $mensajes[$i][4];
		$mensaje->texto = $mensajes[$i][5];
		$dia=substr($mensaje->dia, 8, 2).".".substr($mensaje->dia, 5, 2).".".substr($mensaje->dia, 2, 2);
		$hora=substr($mensaje->hora, 0, 5);
	?>
	
	<?php if ($mensaje->nombre == '') { ?>
	
	<tr>
		<td>
		
		<table width="780" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="30"><img src="imagenes/news.gif" alt="" width="48" height="33" border="0"></td>
			<td width="5"></td>
			<td width="675"><?php	echo $mensaje->texto	?></td>
		</tr>
		<tr>
			<td colspan="3" align="right"><?php echo $hora." .:. ".$dia; ?></td>
		</tr>
		</table>
		
		</td>
		
	</tr>
	
	<?php } else { ?>
	
	<tr>
		<td align="center" valign="middle">
		<p class="titulo">:: <?php	echo $mensaje->nombre	?> ::</p>
		</td>
	</tr>
	<tr>
		<td align="center">
		<img src="imagenes/auto/<?php	echo $mensaje->imagen	?>" alt="" border="0">
		</td>
	</tr>
	<tr>
		<td align="center"><?php	echo $mensaje->texto	?></td>
	</tr>
	<tr>
		<td align="right"><?php echo $hora." .:. ".$dia; ?></td>
	</tr>
	
	<?php } ?>
	
		<?php if ($usuario == 'admin') { ?>
		
		<tr>
			<td align="center">
			<a href="index.php?contenido=form_modifica_mensaje&id_mensaje=<?php	echo $mensaje->id ?>">editar</a> | 
			<a href="index.php?contenido=elimina_mensaje&id_mensaje=<?php	echo $mensaje->id	?>">eliminar</a>
			</td>
		</tr>
		
		<?php } ?>
	
	<?php } ?>
		
</table>