<?php include "estilos-links.php"; ?>

<form name="inserta_contacto" method="post" action="contactos/inserta_contacto.php">
<table width="779" border="0" cellspacing="0" cellpadding="5" class="contenido">
<tr>
	<td>nombre</td>
	<td>telefono</td>
	<td>email</td>
	<td>direccion</td>
	<td>grupo</td>
	<td rowspan="2"><input name="submit" type="submit" value="1+"></td>
</tr>
<tr>
	<td><input type="text" name="nombre" id="nombre" size="30" style="height:20"></td>
	<td><input type="text" name="telefono" id="telefono" size="10" style="height:20"></td>
	<td><input type="text" name="email" id="email" size="15" style="height:20"></td>
	<td><input type="text" name="direccion" id="direccion" size="25" style="height:20"></td>
	<td><input type="text" name="grupo" id="grupo" value="<?php echo $grupo; ?>" size=10" style="height:20"></td>
</tr>
<tr>
	<td colspan="6"><input type="textarea" name="loqse" id="loqse" value="" size="120"></td>
</tr>
</table>
</form>
