&nbsp;&nbsp;&nbsp;&nbsp;caj�n de sastre
<br><br>
<?php
$activefolder = $HTTP_GET_VARS["activefolder"];

require_once('FileDisplayClass.inc.php');

$fileDisplay = New FileDisplay("../cousas/cajon");  // initiate new object

$fileDisplay->showContents($activefolder);
?>

