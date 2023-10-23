<?php
session_start();
require_once ("mensaje.clase.php");
$mensaje = new mensaje;
$mensaje->get($HTTP_GET_VARS["id_mensaje"], $HTTP_GET_VARS["op"]);
?>

<form name="modifica_mensaje" method="post" action="modifica_mensaje.php">
<input type="hidden" name="id" id="id" value="<?php echo $mensaje->id; ?>">
<input type="hidden" name="op" id="op" value="<?php echo $HTTP_GET_VARS["op"]; ?>">
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
	<td align="center" valign="middle">
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif">nombre</font>
          <input type="text" name="nombre" id="nombre" value="<?php echo $mensaje->nombre; ?>" size="60" style="height:20"> - <input type="submit" name="submit" id="submit" value="ok" style="height:20">
	</td>
</tr>
<tr>
	<td align="center" valign="middle">
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif">texto</font>
		<textarea cols="90" rows="15" name="texto" id="texto"><?php echo $mensaje->texto; ?></textarea>
	</td>
</tr>
</table>
</form>