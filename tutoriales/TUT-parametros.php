<?php
	// recoger el id_articulo por parametro, si no es ninguno, poner el ultimo
	if ($_GET['id_articulo'] != '') {
		$articulo->get($_GET['id_articulo']);
	} else {
		$articulo->getUltimo();
	}
?>