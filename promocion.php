<html lang="es">
		<head>
		<title>Promociones</title>
		<meta charset="utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
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
		<h1>Promociones</h1>
			<form action="scripts/registrar_promocion.php" method="POST">
				<table width=400px>
					<tr>
						<td>
							<label for="cod_promocion">Código de Promocion:</label>
						</td>
						<td>
							<input type="text" id="cod_promocion" name="cod_promocion">
						</td>
					</tr>
					<tr>
						<td>
							<label for="nombre">Nombre :</label>
						</td>
						<td>
							<input type="text" name="nombre" id="nombre">
						</td>
					</tr>	
					<tr>
						<td>
							<label for="porcentaje_descuento">Porcentaje de Descuento :</label>
						</td>
						<td>
							<input type="text" name="porcentaje_descuento" id="porcentaje_descuento">
						</td>
					</tr>	
					<tr>
						<td>
							<label for="descripcion">Descripción :</label>
						</td>
						<td>
							<input type="text" name="descripcion" id="descripcion">
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
			<table class="table table-hover">
				<caption>Lista de Promociones</caption>
				<tr>
					<th style='text-align:center;' >Código</th>
					<th style='text-align:center;'>Nombre</th>
					<th style='text-align:center;' >Descuento(%)</th>
					<th style='text-align:center;'>Descripcion</th>
					<th style='text-align:center;'>Eliminar</th>
				</tr>
<?php 
	include("scripts/conexion.php");
	$consulta = "select * from descuento_promocion";
	//Ejecutando consultas
	$resultado = sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	$tabla = "";
	while($linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
				$tabla .="<tr>";
				$tabla .="<td style='text-align:center;'>".$linea['cod_promocion']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['nombre_promocion']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['porcentaje_descuento']."</td>";
				$tabla .="<td style='text-align:center;'>".$linea['descripcion']."</td>";
				$tabla .="<td style='text-align:center;'><a href='scripts/eliminar_promocion.php?cod_promocion={$linea['cod_promocion']}'>Eliminar</a></td>";
				$tabla .="</tr>";
		}
?>
			<?php echo $tabla; ?>
			</table>
		</div>
	</body>
	<footer class='footer'>Derechos reservados - 2014</footer>
</html>
