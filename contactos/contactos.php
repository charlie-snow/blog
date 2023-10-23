<?php include "estilos-links.php"; ?>

<?php

session_start();
require_once("clase.contacto.php");
$contacto = new contacto;

$grupo = $HTTP_GET_VARS["grupo"]; ?>
<table border="0" align="center">
<tr>
<?php
	$resultados = $contacto->grupos();
	for ($i=0; $i<count($resultados); $i++) {
?>
	<td><a href="index.php?contenido=contactos/contactos&grupo=<?php	echo $resultados[$i][0] ?>"><?php	echo $resultados[$i][0] ?></a> | </td>

<?php } ?>
	<td><a href="index.php?contenido=contactos/contactos_consulta">.consulta.</a> | <a href="contactos/dump_display.php" target="_blank">DUMP</a> | 
	<a href="index.php?contenido=contactos/form_busca_contacto">buscar</a> | 
	N <?php echo $contacto->cuantos(); ?></td>
</tr>
</table>


<?php 
	$resultados = $contacto->lista($grupo);
?>

<?php require_once("contactos/form_inserta_contacto.php"); ?>

<table border="0" cellspacing="3" cellpadding="0">
<tr>
	<td width="80"></td>
	<td align="center">	nombre </td>
	<td align="center">	tlf </td>
	<td align="center">	email </td>
	<td align="center"> tlf2 </td>
	<td align="center"> loqse </td>
</tr>
<?php
//(-$cuantos)
//$cuantos = 30;
for ($i=0; $i<count($resultados); $i++) {
?>
<tr>
	<td>
	<a href="index.php?contenido=contactos/form_modifica_contacto&id_contacto=<?php	echo $resultados[$i][0] ?>">ed</a> | 
	<a href="index.php?contenido=contactos/elimina_contacto&id_contacto=<?php	echo $resultados[$i][0]	?>">del</a> | 
	<a href="index.php?contenido=contactos/a_secundario&id_contacto=<?php	echo $resultados[$i][0] ?>">A2</a>
	</td>
	</td>
	<td>	
	<?php echo $resultados[$i][1]; ?>
	</td>
	<td>	
	<?php echo $resultados[$i][2]; ?>
	</td>
	<td>	
	<?php echo $resultados[$i][3]; ?>
	</td>
	<td>	
	<?php echo $resultados[$i][7]; ?>
	</td>
	<td title="<?php echo $resultados[$i][15]; ?>">	
	<?php echo substr($resultados[$i][15], 0, 30); ?>...
	</td>
</tr>
<?php } ?>
</table>