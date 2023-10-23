<?php

session_start();
require_once("clase.articulo.php");
$articulo = new articulo;
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
	include "form_inserta_articulo.php";
} ?>

<table width="800" border="0" cellspacing="10" cellpadding="0">
	
	<?php
	$articulos = $articulo->lista();
	?>
	
	<?php include "estilos-links.php"; ?>
	
	<?php
	/*$cuantos = 100;
	for ($i=count($resultados)-1; $i>(count($resultados)-$cuantos); $i--) {*/
	for ($i=0; $i<=count($articulos)-1; $i++) {
		/*$dia=substr($articulos[$i][1], 8, 2).".".substr($articulos[$i][1], 5, 2).".".substr($articulos[$i][1], 2, 2);
		$hora=substr($articulos[$i][2], 0, 5);*/

		$articulo->id = $articulos[$i][0];
		$articulo->dia = $articulos[$i][1];
		$articulo->hora = $articulos[$i][2];
		$articulo->nombre = $articulos[$i][3];
		$articulo->imagen = $articulos[$i][4];
		$articulo->texto = $articulos[$i][5];
		$dia=substr($articulo->dia, 8, 2).".".substr($articulo->dia, 5, 2).".".substr($articulo->dia, 2, 2);
		$hora=substr($articulo->hora, 0, 5);
	?>
	
	<?php if ($articulo->nombre == '') { ?>
	
	<tr>
		<td>
		
		<table width="780" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="30"><img src="imagenes/news.gif" alt="" width="48" height="33" border="0"></td>
			<td width="5"></td>
			<td width="675"><?php	echo $articulo->texto	?></td>
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
		<p class="titulo">:: <?php	echo $articulo->nombre	?> ::</p>
		</td>
	</tr>
	<!--
	<tr>
		<td align="center">
		<img src="imagenes/auto/<?php	echo $articulo->imagen	?>" alt="" border="0">
		</td>
	</tr>
	-->
	<tr>
		<td align="center"><?php	echo $articulo->texto	?></td>
	</tr>
	<tr>
		<td align="right"><?php echo $hora." .:. ".$dia; ?></td>
	</tr>
	
	<?php } ?>
	
		<?php if ($usuario == 'admin') { ?>
		
		<tr>
			<td align="center">
			<a href="index.php?contenido=form_modifica_articulo&id_articulo=<?php	echo $articulo->id ?>">editar</a> | 
			<a href="index.php?contenido=elimina_articulo&id_articulo=<?php	echo $articulo->id	?>">eliminar</a>
			</td>
		</tr>
		
		<?php } ?>
	
	<?php } ?>
		
</table>