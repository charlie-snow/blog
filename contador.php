<?php
include("clase.count_visitors.php");
$IP_REMOTA = getenv('REMOTE_ADDR');
$my_visitors = new count_visitors($IP_REMOTA);

if (isset ($_SESSION['usuario_online'])){
	if ($_SESSION['usuario_online'] == 'admin') {
		echo "<a href='logout.php'>logout</a>";
	} else {
		echo "<a href='login.php'><font color='#ADEEB6'>X</font></a>";
		$my_visitors->process_visitor();
	}
} else {
	echo "<a href='login.php'><font color='#ADEEB6'>X</font></a>";
}

$all_visitors = $my_visitors->show_all_visits();
$all_visitors = $all_visitors + 980 + 700;
echo $all_visitors;
?>