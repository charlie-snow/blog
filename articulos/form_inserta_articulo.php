<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas"
});
</script>

<div align="center" class="contenido">
        <form name="inserta_articulo" method="post" action="inserta_articulo.php" enctype="multipart/form-data">
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">nombre</font>
          <input type="text" name="nombre" id="nombre" size="50" style="height:20">
		  &nbsp;&nbsp;
		  <!-- <font size="1" face="Verdana, Arial, Helvetica, sans-serif">imagen</font>
		  <input type="file" name="pictures[]" />
		  <input type="text" name="nombre_imagen" id="nombre_imagen" size="10" style="height:20"> -->
		  <br>
		  <textarea cols="90" rows="15" name="texto" id="texto"></textarea>
		  &nbsp;&nbsp;
          <input name="submit" type="submit" value="insertar">
        </form>
</div>