<?php
	include'conexion.php';
	session_start();
	$nombre = $_REQUEST['nombre'];
	$consulta = "update alianza_aerea set nombre_alianza = '{$nombre}' where cod_alianza = '{$_SESSION['cod_alianza']}'";
	echo $consulta;
	sqlsrv_query($conexion,$consulta);
	header('Location:../alianza_aerea.php');
?>