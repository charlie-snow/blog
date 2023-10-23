<?php include "menu_script.php"; ?>

<script language="javascript" src="cuenta_atras.js"></script>

<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
	<td><img src="imagenes/ranita.gif" alt="" width="42" height="25" border="0"></td>
	<td width="15"></td>
	<td>
	<a href="index.php?contenido=sant_joan_2006">
	<!-- <blink>sant joan 2006</blink></a> <span class="rojo"></span> <span class="fecha" id="ca_santjoan"></span> |  -->
	<a href="index.php?contenido=portada">2007</a> | <a href="index.php?contenido=pre_moz">2004-2006</a> | 
	<a href="index.php?contenido=mercenarios">A REVOLTA</a> <span class="rojo"><blink><</blink></span> | 
	<a href="coppermine/index.php" target="_blank">album de fotos</a> | 
	<a href="index.php?contenido=musica">m&uacute;sica</a> | 
	<a href="index.php?contenido=videos">v&iacute;deos</a> |
	<!--  
	<a href="#" onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, 
	menu_cosas, '130px')" onMouseout="delayhidemenu()">cosas</a> | -->
	<a href="#" onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, 
	menu_aaventuras, '130px')" onMouseout="delayhidemenu()">aaventuras</a> | 
	<a href="index.php?contenido=mensajes" onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, 
	menu_mensajes, '70px')" onMouseout="delayhidemenu()">mensajes</a> | 
	<a href="index.php?contenido=donde">donde</a> <span class="rojo"><blink><</blink></span>
	<!-- <span class="rojo"><blink><</blink></span> --> | 
	<a href="index.php?contenido=contacto">contacto</a>
	
	<!-- <a href="#" onClick="return clickreturnvalue()" onMouseover="dropdownmenu(this, event, 
	menu_yo, '70px')" onMouseout="delayhidemenu()">yo/eu</a> -->
	
	<?php if (isset ($_SESSION['usuario_online'])){
		if ($_SESSION['usuario_online'] == 'admin') { ?>
			<a href="#" onClick="return clickreturnvalue()" 
			onMouseover="dropdownmenu(this, event, menu_admin, '70px')" 
			onMouseout="delayhidemenu()">admin</a>
	<?php	}
	} ?>
	
	</td>
</tr>
</table>

<script language="javascript" type="text/javascript">
	countdown('ca_santjoan', "June 23, 2006 11:00:00 GMT+2", 3, 'sant joan 2006');
	//countdown('ca_santjoan', "April 12, 2006 14:00:00", 3, 'sant joan 2006');
</script>