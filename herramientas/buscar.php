<?php
$frase = $_POST['frase'];
$ir_a = "index.php";
if ($frase == "noe") {
	$ir_a = "../albums/noe/page_01.htm";
}
header ("Location: ".$ir_a);
?>