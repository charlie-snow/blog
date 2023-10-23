<?php

session_start();
require_once("clase.generalista.php");
$generador = new generaLista;
$resultados = $generador->listaImagenes();
?>

<?php include "estilos-links.php"; ?>

<table border="0" cellspacing="3" cellpadding="0" align="center">
<?php
for ($i=1; $i<count($resultados); $i++) {
?>
<tr>
	<td align="center" title="<?php echo $resultados[$i][0]; ?>">
	<?php echo $resultados[$i][1]; ?>
	</td>
</tr>
<tr>
	<td align="center">
	<a href="#" onClick="seleccionar('<?php echo $resultados[$i][1]; ?>');">
	<img src="imagenes/<?php echo $resultados[$i][1]; ?>" alt="" width="200" border="0"></a>
	</td>
</tr>
<tr>
	<td align="center" class="pie"><?php echo $resultados[$i][2]; ?></td>
</tr>
<?php } ?>
</table>

<script>

function seleccionar (imagen) {
	opener.document.getElementById('imagen'+opener.columna).value=imagen;
	opener.document.getElementById('arx_img'+opener.columna).src='imagenes/'+imagen;
	this.close();
}

</script>