<?php
session_start();
require_once ("clase.articulo.php");
$articulo = new articulo;
$articulo->get($HTTP_GET_VARS["id_articulo"]);
?>

<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas"
});
</script>

<form name="modifica_articulo" method="post" action="modifica_articulo.php">
<input type="hidden" name="id" id="id" value="<?php echo $articulo->id; ?>">
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
	<td align="center" valign="middle">
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif">nombre</font>
          <input type="text" name="nombre" id="nombre" value="<?php echo $articulo->nombre; ?>" size="60" style="height:20"> - <input type="submit" name="submit" id="submit" value="ok" style="height:20">
	</td>
</tr>
<tr>
	<td align="center" valign="middle">
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif">texto</font>
		<textarea cols="90" rows="15" name="texto" id="texto"><?php echo $articulo->texto; ?></textarea>
	</td>
</tr>
</table>
</form>