<?php
	include('scripts/conexion.php');
	$consulta="select * from vuelo";
	$resultado = sqlsrv_query($conexion,$consulta);
	$opciones1 = "";
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$opciones1 .= "<option value='{$linea['cod_vuelo']}'>{$linea['cod_vuelo']}</option> ";
	}
	$consulta="select * from aerolinea";
	$resultado = sqlsrv_query($conexion,$consulta);
	$opciones2 = "";
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$opciones2 .= "<option value='{$linea['RUC']}'>{$linea['nombre']}</option> ";
	}
		$consulta="select * from clase_cabina";
	$resultado = sqlsrv_query($conexion,$consulta);
	$opciones3 = "";
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$opciones3 .= "<option value='{$linea['cod_clase']}'>{$linea['nombre_servicio_clase']}</option> ";
	}
	$consulta="select * from descuento_promocion";
	$resultado = sqlsrv_query($conexion,$consulta);
	$opciones4 = "";
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$opciones4 .= "<option value='{$linea['cod_promocion']}'>{$linea['nombre_promocion']}</option> ";
	}

?>		
<!DOCTYPE html>
<html lang="es">
		<head>
		<title>Tarifas</title>
		<meta charset="utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<style type="text/css">
		td,th,tr,table{
		text-align: left;
		border: none;
	}

	table{
		margin: 10px;
	}

	.botones{
		padding: 10px;
		margin: 10px;
	}

	td{
		padding: 5px;
	}

		.footer{
		background: #000000;
	}

</style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/logo.png" width="70" height="30" alt=""></a>
          <a class="navbar-brand" href="#">Agencia de viajes</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
 
            <li><a href="ayuda.php">Ayuda</a></li>
          </ul>
           <ul class="nav navbar-nav navbar-right">
              <ul class="nav navbar-nav navbar-right">
              <li class="active" ><a href="scripts/salir.php">Cerrar sesión</a></li>
           
            </ul>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="cabecera">
		<img class="logo" src="img/logo.png" width="250" height="130" alt="">
 
  </div>
	<div class="separacion"></div>
	<div class="cuerpo">
		<h1>REGISTRO DE TARIFAS</h1>
			<form action="scripts/registrar_tarifa.php" method="POST">
				<table width=400px>
					<tr>
						<td>
							<label for="cod_vuelo">Vuelo : </label>
						</td>
						<td>
							<select id="cod_vuelo" name="cod_vuelo">
								<?php echo $opciones1 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="RUC">Aerolinea : </label>
						</td>
						<td>
							<select id="RUC" name="RUC">
								<?php echo $opciones2 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="cod_clase">Clase : </label>
						</td>
						<td>
							<select id="cod_clase" name="cod_clase">
								<?php echo $opciones3 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="tipo_persona">Tipo de persona : </label>
						</td>
						<td>
							<select id="tipo_persona" name="tipo_persona">
								<option value="Niño">Niño</option>
								<option value="Adulto">Adulto</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="monto">Monto :</label>
						</td>
						<td>
							<input type="text" name="monto" id="monto">
						</td>
					</tr>
					<tr>
						<td>
							<label for="cod_promocion">Código de Promocion : </label>
						</td>
						<td>
							<select id="cod_promocion" name="cod_promocion">
								<?php echo $opciones4 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input class="btn btn-primary" type="submit" value="Registrar">
							<input class="btn btn-primary" type="reset">
						</td>
					</tr>	
				</table>
			</form>
			<table class="table table-hover" >
				<caption>Lista de Tarifas</caption>
				<tr>
					<th style='text-align:center;'>Vuelo</th>
					<th style='text-align:center;'>Aerolinea</th>
					<th style='text-align:center;'>Clase</th>
					<th style='text-align:center;'>Persona</th>
					<th style='text-align:center;'>Monto</th>
					<th style='text-align:center;'>Promocion</th>
					<th style='text-align:center;'>Eliminar</th>
				</tr>
<?php 
	include("scripts/conexion.php");
	$consulta = "select * from tarifa";
	$resultado = sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	$tabla = "";
	while($linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
				$tabla .="<tr>";
				$tabla .="<td style='text-align:center;'>".$linea['cod_vuelo']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['RUC']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['cod_clase']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['tipo_persona']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['monto']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['cod_promocion']."</td>";
				$tabla .="<td style='text-align:center;'><a href='scripts/eliminar_tarifa.php?RUC={$linea['RUC']}&cod_vuelo={$linea['cod_vuelo']}&cod_clase={$linea['cod_clase']}&tipo_persona={$linea['tipo_persona']}'>Eliminar</a></td>";
				$tabla .="</tr>";
		}
?>
			<?php echo $tabla; ?>
			</table>
	</div>
	</body>
	<footer class='footer'>Derechos reservados - 2014</footer>
</html>
