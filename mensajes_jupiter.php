<?php

session_start();
require_once("clase.generalista.php");
$generador = new generaLista;
$resultados = $generador->listaMensajesJupiter();
?>

<?php include "estilos-links.php"; ?>

<table width="779" border="0" cellspacing="0" cellpadding="5" class="contenido">
<tr>
	<td align="center"> :.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:. tablón de mensajes intergalácticamente jupiterianos, pasamos de marcian@s :.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.</td>
</tr>
<tr>
	<td valign="top" class="contenido">
        <form name="insertaMensajeJupiter" method="post" action="insertaMensajeJupiter.php">
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nombre:</font>
          <input name="nombre" type="text" size="10" style="height:20">
		  &nbsp;&nbsp;
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:</font>
          <textarea cols="57" rows="1" name="textomensaje" style="height:20"></textarea>
		  &nbsp;&nbsp;
          <input name="submit" type="submit" value="Enviar">
        </form>
	</td>
</tr>
<?php

$cuantos = 30;
for ($i=count($resultados)-1; $i>(count($resultados)-$cuantos); $i--) {
	$dia=substr($resultados[$i][0], 8, 2).".".substr($resultados[$i][0], 5, 2).".".substr($resultados[$i][0], 2, 2);
	$hora=substr($resultados[$i][1], 0, 5);
?>
<tr>
	<td>
	<?php
	echo "<strong>".$resultados[$i][2]."</strong> >>
	<div align='justify'>".$resultados[$i][3]."</div>
	<div align='right'>".$hora." .:. ".$dia."</div>";
	echo "<div align='center'>...................</div>";
	?>
	</td>
</tr>
<?php } ?>
</table>