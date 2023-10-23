<?php
	session_start();
	session_register('usuario_online');
	session_register('id_usuario_online');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>login</title>
</head>

<body>

<?php include "formAutentica.html"; ?>

</body>
</html>
