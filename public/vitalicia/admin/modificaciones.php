<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('refresh: 0; url= http://localhost/netit/admin/login.html');
			exit();

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Net It | Solutions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Web de servicios tecnológicos" />
	<meta name="keywords" content="Network, Information, technology, networking, source, responsive" />
	<meta name="author" content="Net IT Solutions"/>

	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/orange.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<header role="banner" >
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-insideV-nav-toggle insideV-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		          	<a class="navbar-brand">Net IT Solutions | Bienvenido</a> 
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		           <ul class="nav navbar-nav navbar-right">
                    <li><a href="administrador.php" ><span>Altas</span></a></li>
                    <li><a href="bajas.php" ><span>Bajas</span></a></li>
                    <li><a href="consultas.php" ><span>Consultas</span></a></li>
                    <li class="active"><a href="modificaciones.php"><span>Modificaciones</span></a></li>
                    <li><a href="index.php"><span>Registrar Usuario</span></a></li>
                    <li><a href="logout.php"><span>Cerrar Sesión</span></a></li>
		          </ul>
		        </div>
			    </nav>
			  </div>
	</header>
        
        
        
    <div id="insideV-our-services">
		<div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Modificaciones</h2>
				</div>
			</div>
            <div class="row">
              <div class="col-md-12 section-heading">
                <div class="box to-animate">	
                <h3 align="center">Selecciona el apartado a modificar</h3>
                <div align="center">
                <a href="php/modificaciones/cliente/indice_modificar.php"><input class="btn btn-primary" type="submit" value="Cliente"></a>
                <a href="php/modificaciones/departamento/modificar_depa.php"><input class="btn btn-primary" type="submit" value="Departamento"></a> 
                <a href="php/modificaciones/empleado/indice_empleado.php"><input class="btn btn-primary" type="submit" value="Empleado"></a> 
                <a href="php/modificaciones/encargado/indice_enca.php"><input class="btn btn-primary" type="submit" value="Encargado"></a> 
                <a href="php/modificaciones/servicios/indice_serv.php"><input class="btn btn-primary" type="submit" value="Servicio"></a>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
        
        
	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12">
					<p class="copyright text-center">Derechos reservados &copy; 2016 | Net IT Solutions.</p>
				</div>
			</div>
		</div>
	</footer>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>


	<!-- Main JS  -->
	<script src="js/main.js"></script>

	</body>
</html>


        <!--form>
        <select name="urlmodificacion" onChange="location=this.form.urlmodificacion.value" size="6">
                <option>Seleccione una opcion</option>
                <option value="php/modificaciones/cliente/indice_modificar.php" class="pag">Modificar cliente</option>
                <option value="php/modificaciones/departamento/modificar_depa.php" class="pag">Modificar departamento</option>
                <option value="php/modificaciones/empleado/indice_empleado.php" class="pag">Modificar empleado</option>
                <option value="php/modificaciones/encargado/indice_enca.php" class="pag">Modificar encargado</option>
                <option value="php/modificaciones/servicios/indice_serv.php" class="pag">Modificar servicio</option>

            </select>
            </form-->