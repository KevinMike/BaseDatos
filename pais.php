<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pais</title>
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
	#pais{
		border: 1px solid black;
		text-align: center;	
	}
	th{
		text-align: center;

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
		<h1>Registros de Paises</h1>
			<form class="formulario1" action="scripts/registrar_pais.php" method="POST">
				<table class="pais">
					<tr>
						<td>
							<label for="cod_pais">Código de Pais:</label>
						</td>
						<td>
							<input type="text" id="cod_pais" name="cod_pais">
						</td>
					</tr>
					<tr>
						<td>
							<label for="nombre_pais">Nombre :</label>
						</td>
						<td>
							<input type="text" name="nombre_pais" id="nombre_pais">
						</td>
					</tr>	
					<tr>
						<td>
							<label for="descripcion_pais">Descripcion :</label>
						</td>
						<td>
							<input type="text" name="descripcion_pais" id="descripcion_pais">
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
			<table style="color:blue" id='pais'>
				<caption>Lista de Alianzas Aereas</caption>
				<tr>
					<th>Código</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Eliminar</th>
				</tr>
<?php 
	include("scripts/conexion.php");
	$consulta = "select * from pais";
	//Ejecutando consultas
	$resultado = sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	$tabla = "";
	while($linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
				$tabla .="<tr>";
				$tabla .="<td id='pais'>".$linea['cod_pais']."</td>";
				$tabla .="<td id='pais'>".$linea['nombre_pais']."</td>";
				$tabla .="<td id='pais'>".$linea['descripcion_pais']."</td>";
				$tabla .="<td id='pais'><a href='scripts/eliminar_pais.php?cod_pais={$linea['cod_pais']}'>Eliminar</a></td>";
				$tabla .="</tr>";
		}
?>
			<?php echo $tabla; ?>
			</table>
			</div>
			<footer>Derechos reservados</footer>
	</body>
</html>
