<?php
session_start();
require_once ("clase.contacto.php");
$contacto = new contacto;
$contacto->consultar($HTTP_GET_VARS["id_contacto"]);
?>

<form name="contactos/modifica_contacto" method="post" action="contactos/modifica_contacto.php">
<input type="hidden" name="id" id="id" value="<?php echo $contacto->id; ?>">
<table width="779" border="0" cellspacing="0" cellpadding="5" class="contenido">
<tr>
	<td>nombre</td>
	<td>telefono</td>
	<td>email</td>
	<td>direccion</td>
	<td>grupo</td>
	<td rowspan="2"><input name="submit" type="submit" value="modif"></td>
</tr>
<tr>
	<td><input type="text" name="nombre" id="nombre" value="<?php echo $contacto->nombre; ?>" size="30" style="height:20"></td>
	<td><input type="text" name="telefono" id="telefono" value="<?php echo $contacto->telefono; ?>" size="10" style="height:20"></td>
	<td><input type="text" name="email" id="email" value="<?php echo $contacto->email; ?>" size="15" style="height:20"></td>
	<td><input type="text" name="direccion" id="direccion" value="<?php echo $contacto->direccion; ?>" size="25" style="height:20"></td>
	<td>
	<select name="grupo">
	<?php
		$resultados = $contacto->grupos();
		for ($i=0; $i<count($resultados); $i++) { ?>
		<option value="<?php echo $resultados[$i][0] ?>" 
		<?php if ($resultados[$i][0] == $contacto->grupo) { echo 'SELECTED'; } ?>><?php	echo $resultados[$i][0] ?></option>	
	<?php } ?>
	</select>
	</td>
</tr>
<tr>
	<td colspan="6"><input type="textarea" name="loqse" id="loqse" value="<?php echo $contacto->loqse; ?>" size="120"></td>
</tr>
</table>
</form>