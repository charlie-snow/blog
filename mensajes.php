<?php

session_start();
require_once("mensaje.clase.php");
$op = $HTTP_GET_VARS["op"];
$mensaje = new mensaje;
$resultados = $mensaje->lista($op);
$usuario = 'visitante';
if (isset ($_SESSION['usuario_online'])){
	if ($_SESSION['usuario_online'] == 'admin') {
		$usuario = 'admin';
	}
}
?>

<?php include "estilos-links.php"; ?>

<table width="779" border="0" cellspacing="0" cellpadding="5" class="contenido">
<tr>
	<td valign="top" class="contenido">
        <form name="insertaMensaje" method="post" action="insertaMensaje.php">
		  <input type="hidden" name="op" id="op" value="<?php echo $op; ?>">
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

$cuantos = 10;
for ($i=count($resultados)-1; $i>(count($resultados)-$cuantos); $i--) {
	$dia=substr($resultados[$i][1], 8, 2).".".substr($resultados[$i][1], 5, 2).".".substr($resultados[$i][1], 2, 2);
	$hora=substr($resultados[$i][2], 0, 5);
?>
<tr>
	<td align="justify" valign="top">
	<?php
	echo "<strong>".$resultados[$i][3]."</strong> >> ".$resultados[$i][4]."
	<div align='right'>".$hora." .:. ".$dia."</div>";
	?>
	</td>
</tr>
<tr>
	<td align="justify" valign="top">
	<?php if ($usuario == 'admin') { ?>
		
	<tr>
		<td align="center">
		<a href="index.php?contenido=form_modifica_mensaje&id_mensaje=<?php	echo $resultados[$i][0] ?>&op=<?php	echo $op ?>">editar</a> | 
		<a href="index.php?contenido=elimina_mensaje&id_mensaje=<?php	echo $resultados[$i][0]	?>&op=<?php	echo $op ?>">eliminar</a>
		</td>
	</tr>
	
	<?php } ?>
	</td>
</tr>
<?php } ?>
</table>