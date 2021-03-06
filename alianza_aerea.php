<!DOCTYPE html>
<html lang="es">
		<head>
		<title>Compra</title>
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
	#lista_alianzas>tr{
		border: 1px solid black;
		text-align: center;	
	}

	.footer{
		background: #000000;
	}

   .form-data{
 	border: none;
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
		<h1>Registros de Alianzas Aéreas</h1>
			<form action="scripts/registrar_alianza.php" method="POST">
				<table class="form-data" width=400px>
					<tr class="form-data">
						<td class="form-data">
							<label for="cod_aliaza">Código de Alianza:</label>
						</td>
						<td class="form-data">
							<input type="text" id="identificacion" name="cod_alianza">
						</td>
					</tr>
					<tr class="form-data">
						<td class="form-data">
							<label for="nombre">Nombre :</label>
						</td>
						<td class="form-data">
							<input type="text" name="nombre" id="nombre">
						</td>
					</tr>		
					<tr class="form-data">
						<td class="form-data">
							<input class="btn btn-primary" type="submit" value="Registrar">
							<input class="btn btn-primary" type="reset">
						</td>
					</tr>
				</table>
			</form>
			<table  class="table table-hover">
				<caption>Lista de Alianzas Aereas</caption>
				<tr>
					<th  >Código de la Alianza Aerea</th>
					<th >Nombre de la Alianza Aerea</th>
					<th >Editar Nombre</th>
					<th >Eliminar</th>
				</tr>
<?php 
	include("scripts/conexion.php");
	$consulta = "select * from alianza_aerea";
	//Ejecutando consultas
	$resultado = sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	$tabla = "";
	while($linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
				$tabla .="<tr>";
				$tabla .="<td>".$linea['cod_alianza']."</td>";
				$tabla .="<td>".$linea['nombre_alianza']."</td>";
				$tabla .="<td><a href='editaralianza.php?cod_alianza={$linea['cod_alianza']}'>Editar Nombre</a></td>";
				$tabla .="<td><a href='scripts/eliminar_alianza.php?cod_alianza={$linea['cod_alianza']}'>Eliminar</a></td>";
				$tabla .="</tr>";
		}
?>
			<?php echo $tabla; ?>
			</table>
		</div>
	</body>
		<footer class='footer'>Derechos reservados - 2014</footer>

</html>
