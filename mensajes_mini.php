<?php

session_start();
require_once("clase.generalista.php");
$generador = new generaLista;
$resultados = $generador->listaMensajes();
?>

<?php include "estilos-links.php"; ?>

<table width="134" border="0" cellspacing="4" cellpadding="5" class="contenido" bgcolor="black">
<?php
$cuantos = 10;
for ($i=count($resultados)-1; $i>(count($resultados)-$cuantos); $i--) {
	$dia=substr($resultados[$i][0], 8, 2).".".substr($resultados[$i][0], 5, 2).".".substr($resultados[$i][0], 2, 2);
	$hora=substr($resultados[$i][1], 0, 5);
?>
<tr>
	<td align="justify" valign="top" class="texto_pequeno" bgcolor="#cdfcab">
	<?php
	echo "<strong>".$resultados[$i][2]."</strong> >> ".$resultados[$i][3]."
	<div align='right'>".$hora." .:. ".$dia."</div>";
	?>
	</td>
</tr>
<?php } ?>
<tr>
	<td align="center" valign="top" bgcolor="#ADEEB6" class="texto_pequeno">
        <form name="insertaMensaje" method="post" action="insertaMensaje.php">
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nombre:</font>
          <input name="nombre" type="text" size="7" style="height:20">
		  &nbsp;&nbsp;
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:</font>
          <textarea cols="12" rows="5" name="textomensaje" style="height:100"></textarea>
		  &nbsp;&nbsp;
          <input name="submit" type="submit" value="Enviar">
        </form>
	</td>
</tr>
</table>