<?php
	include('scripts/conexion.php');
	$consulta="select * from alianza_aerea";
	$resultado = sqlsrv_query($conexion,$consulta);
	$opciones = "";
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$opciones .= "<option value='{$linea['cod_alianza']}'>{$linea['nombre_alianza']}</option> ";
	}
?>		
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
	
 .form-data{
 	border: none;
 	text-align: center;
 }
 .footer{
  
    background: #000000;
  }

  .table{
  	text-align: center;
  }

  .table-hover{
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
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="cabecera">
		<img class="logo" src="img/logo.png" width="250" height="130" alt="">
 
  </div>
	<div class="separacion"></div>
	<div class="cuerpo">
		<h1>REGISTRO DE AEROLINEAS</h1>
			<form action="scripts/registrar_aerolinea.php" method="POST">
				<table class="form-data"   width=400px>
					<tr class="form-data">
						<td class="form-data">
							<label for="ruc">RUC :</label>
						</td>
						<td class="form-data">
							<input type="text" name="ruc" id="ruc">
						</td>
					</tr>
					<tr class="form-data">
						<td class="form-data">
							<label for="nombre">Nombre de la aerolinea :</label>
						</td class="form-data">
						<td class="form-data">
							<input type="text" name="nombre" id="nombre">
						</td>
					</tr>
					<tr class="form-data">
						<td class="form-data">
							<label for="cod_alianza">Alianza Aerea : </label>
						</td>
						<td class="form-data">
							<select id="cod_alianza" name="cod_alianza">
								<?php echo $opciones ?>
							</select>
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
			<table class="table table-hover">
				<caption>Lista de Aerolineas</caption>
				<tr>
					<th  >Ruc</th>
					<th  >Nombre</th>
					<th  >Eliminar</th>
				</tr>
<?php 
	include("scripts/conexion.php");
	$consulta = "select * from aerolinea";
	$resultado = sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	$tabla = "";
	while($linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
				$tabla .="<tr>";
				$tabla .="<td  >".$linea['RUC']."</td>";
				$tabla .="<td  >".$linea['nombre']."</td>";
				$tabla .="<td  ><a href='scripts/eliminar_aerolinea.php?ruc={$linea['RUC']}'>Eliminar</a></td>";
				$tabla .="</tr>";
		}
?>
			<?php echo $tabla; ?>
			</table>
	</div>
	</body>
	<footer class='footer'>Derechos reservados - 2014</footer>
</html>
