<?php
	include("conexion.php");
	session_start();
	$cod_reserva = $_GET['cod_reserva'];
	$consulta = "exec nueva_compra ";
	sqlsrv_query($conexion,$consulta);
	$consulta="select max(cod_compra) as cod_compra from compra";
	$resultado = sqlsrv_query($conexion,$consulta);
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$_SESSION['cod_compra'] = $linea['cod_compra'];
	}
	$consulta = "select * from reserva where cod_reserva = {$cod_reserva}";
	echo $consulta;
	$resultado = sqlsrv_query($conexion,$consulta);
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$cod_pasaje = $linea['cod_pasaje'];
		$identificacion = $linea['cod_pasajero'];
	}
			$consulta2 = "insert into detalle_compra values('{$cod_pasaje}','{$_SESSION['cod_compra']}','{$identificacion}')";
			echo $consulta2;
			$resultado2 = sqlsrv_query($conexion,$consulta2) or
						die('No se pudo ejecutar la consulta de la compra'.print_r( sqlsrv_errors(), true));
	$query = "update reserva set cod_estado_reserva = '1' where cod_reserva ='{$cod_reserva}'";
	sqlsrv_query($conexion,$query);
	header("Location: ../resultado_compra.php");
?>