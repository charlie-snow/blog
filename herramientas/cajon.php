&nbsp;&nbsp;&nbsp;&nbsp;cajón de sastre
<br><br>
<?php
$activefolder = $HTTP_GET_VARS["activefolder"];

require_once('FileDisplayClass.inc.php');

$fileDisplay = New FileDisplay("../cousas/cajon");  // initiate new object

$fileDisplay->showContents($activefolder);
?>

