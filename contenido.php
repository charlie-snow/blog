<?php
	if (!isset($_REQUEST["contenido"])) {
		//$_REQUEST["contenido"] = "pre_moz";
		$_REQUEST["contenido"] = "portada";
		//$_REQUEST["contenido"] = "donde";
	}
?>


<?php include $_REQUEST["contenido"].".php" ?>
