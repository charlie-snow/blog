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
	<td><a href="index.php?contenido=contactos/contactos_consulta&grupo=<?php	echo $resultados[$i][0] ?>"><?php	echo $resultados[$i][0] ?></a> | </td>
<?php } ?>
	<td><a href="index.php?contenido=contactos/contactos">.volver.</a> | <a href="contactos/dump_display.php" target="_blank">DUMP</a></td>
</tr>
</table>
<br><br>

<?php $resultados = $contacto->lista($grupo); ?>

<table border="2" cellspacing="3" cellpadding="0" align="center">
<tr>
	<td align="center">	nombre </td>
	<td align="center">	email </td>
	<td align="center">	tlf </td>
</tr>
<?php for ($i=0; $i<count($resultados); $i++) { ?>
<tr>
	<td>	
	<?php echo $resultados[$i][1]; ?>
	</td>
	<td>	
	<?php echo $resultados[$i][2]; ?>
	</td>
	<td>	
	<?php echo $resultados[$i][3]; ?>
	</td>
</tr>
<?php } ?>
</table>

<br><br><div align="center">--- CSV ---</div><br><br>

<?php
	$resultados = $contacto->csv($grupo);
	echo $resultados;
?>
