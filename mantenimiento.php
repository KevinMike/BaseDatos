<?php   
      include('scripts/validar.php');

 ?><!DOCTYPE html>
<html lang="es">
		<head>
		<title>MANTENIMIENTO</title>
		<meta charset="utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
<style type="text/css">
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
		<h1>TABLAS DE MANTENIMIENTO</h1>
		  <table>
        <tr>
            <ol>
              <li><a href="alianza_aerea.php">Registro de Alianzas Aereas</a></li>
              <li><a href="aerolineas.php">Registro de Nuevas Aerolineas</a></li>
              <li><a href="pais.php">Registro de Paises</a></li>
              <li><a href="ciudad.php">Registro de ciudades</a></li>
              <li><a href="promocion.php">Registro de promociones</a></li>
              <li><a href="tarifas.php">Registro de Tarifas</a></li>
              <li><a href="tripulante.php">Registro de Tripulantes</a></li>
              <h1>REPORTES</h1>
              <li><a href="ejemplo.php">Reporte sobre lista de Pasajeros</a></li>
              <li><a href="rpt_aerolineas.php">Reporte sobre lista de aerolineas</a></li>
            </ol>
        </tr>
      </table>

    </div>	
		<footer class="footer"><div class="container"><p class=" ">Derechos reservados - 2014</p></div></footer>
	</body>
</html>
