<!DOCTYPE html>
<html>
<head>
	<title>MAESTRO PROVEEDORES</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-inverse">
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="agregarEmpresa.php">Alta</a></li>
			<li><a href="actualizarEmpresa.php">Modificacion y baja</a></li>
			<li><a href="armarListado.php">Listado</a></li>
			<li><a href="listadosArmados.php">Listados Armados</a></li>
		</ul>

	<!-- 	###################
		####### BUSCAR ########
		####################### -->

	 	<form action="vistaEmpresa.php" class="navbar-form navbar-left" method="GET">
		    <div class="form-group">
		    	<input type="text" name="buscarEmpresa" class="form-control" placeholder="Buscador empresa">
		    </div>
		    <button type="submit" class="btn btn-default">Buscar</button>
	    </form>

			<li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
	</nav>
