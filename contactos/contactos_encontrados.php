<?php include "estilos-links.php"; ?>

<?php

session_start();
require_once("clase.contacto.php");
$contacto = new contacto;
$resultados = $contacto->buscar($_POST["nombre"]);
?>

<table border="0" cellspacing="3" cellpadding="0">
<tr>
	<td width="80"></td>
	<td align="center">	nombre </td>
	<td align="center">	tlf </td>
	<td align="center">	email </td>
	<td align="center"> tlf2 </td>
	<td align="center"> grupo </td>
	<td align="center"> loqse </td>
</tr>
<?php
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
	<td>	
	<?php echo $resultados[$i][13]; ?>
	</td>
	<td title="<?php echo $resultados[$i][15]; ?>">	
	<?php echo substr($resultados[$i][15], 0, 30); ?>...
	</td>
</tr>
<?php } ?>
</table>