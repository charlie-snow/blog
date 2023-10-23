<?php

session_start();
require_once ("clase.cita.php");
$cita = new cita;
$cita->unaCita('');
?>

<?php include "estilos-links.php"; ?>

<table cellspacing="0" align="center" style="background-color:transparent;">
<tr>
	<td width="350"><?php echo $cita->texto; ?><br><br>
		<div align="right"><?php echo $cita->autor; ?></div></td>
	<td width="150" align="center">
	<img src="imagenes/<?php echo $cita->imagen; ?>" alt="" border="0">
	</td>
</tr>
</table>
