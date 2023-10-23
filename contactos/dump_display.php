<?php

session_start();
require_once("../clase.contacto.php");
$contacto = new contacto; ?>

<!--
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL default '',
  `telefono` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `direccion` varchar(70) default NULL,
  `zona` varchar(50) default NULL,
  `fecha_nacimiento` datetime default NULL,
  `telefono2` varchar(50) default NULL,
  `direcion2` varchar(50) default NULL,
  `zona2` varchar(50) default NULL,
  `e-mail2` varchar(50) default NULL,
  `notas` varchar(200) default NULL,
  `agenda2` tinyint(4) default '0',
  `grupo` varchar(20) NOT NULL default 'principal',
  `fecha` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;
-->

<?php 
	$resultados = $contacto->dump();
?>

INSERT INTO `contactos` (`id`, `nombre`, `telefono`, `email`, `direccion`, `zona`, `fecha_nacimiento`, `telefono2`, `direcion2`, `zona2`, `e-mail2`, `notas`, `agenda2`, `grupo`, `fecha`) VALUES 

<?php for ($i=0; $i<count($resultados); $i++) { ?>

(<?php	echo $resultados[$i][0] ?>, '<?php	echo $resultados[$i][1] ?>', '<?php	echo $resultados[$i][2] ?>', '<?php	echo $resultados[$i][3] ?>', '<?php	echo $resultados[$i][4] ?>', '<?php	echo $resultados[$i][5] ?>', '<?php	echo $resultados[$i][6] ?>', '<?php	echo $resultados[$i][7] ?>', '<?php	echo $resultados[$i][8] ?>', '<?php	echo $resultados[$i][9] ?>', '<?php	echo $resultados[$i][10] ?>', '<?php	echo $resultados[$i][11] ?>', '<?php	echo $resultados[$i][12] ?>', '<?php	echo $resultados[$i][13] ?>', '<?php	echo $resultados[$i][14] ?>')

<?php if ($i+1<count($resultados)) { echo ",<br>"; } else { echo ";"; } ?>

<?php } ?>