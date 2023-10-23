<?php

session_start();
require_once ("clase.generalista.php");
$generador = new generaLista;
$resultados = $generador->generarListaLogs ();
?>

<?php include "estilos-links.php"; ?>
<table border="0" cellspacing="0" cellpadding="0" align="center">

<?php
for ($i=0/*count($resultados)-5*/; $i<count($resultados); $i++){
	$dia=substr($resultados[$i][1], 8, 2).".".substr($resultados[$i][1], 5, 2).".".substr($resultados[$i][1], 2, 2);
	$hora=substr($resultados[$i][2], 0, 5);
?>

<tr>
	<td align="left" class="fecha">
	<?php
	echo $dia;
	echo " - ";
	echo $hora;
	?>
	_________________________________________________________________________________________________________________
	</td>
</tr>
<tr>
	<td class="contenido"><?php echo $resultados[$i][3]; ?><br><br></td>
</tr>

<?php } ?>

</table>
