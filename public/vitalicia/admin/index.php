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
                    <li><a href="modificaciones.php"><span>Modificaciones</span></a></li>
                    <li class="active"><a href="index.php"><span>Registrar Usuario</span></a></li>
                    <li><a href="logout.php"><span>Cerrar Sesión</span></a></li>
		          </ul>
		        </div>
			    </nav>
			  </div>
	</header>
        
<br>
<br>      
<br>
<br>        
<br>
        
<div class="container">
<div class="row">
<div class="col-md-12 section-heading" align=center>
<div class="container">

 <form action="registrar-usuario.php" method="post"> 

 <hr />
 <h3>Crea una cuenta</h3>

 <!--Nombre Usuario-->
 <label for="nombre">Nombre de Usuario:</label><br>
 <input type="text" name="username" maxlength="32" required>
 <br/><br/>

 <!--Password-->
 <label for="pass">Password:</label><br>
 <input type="password" name="password" maxlength="8" required>

 <br/><br/>
 <input class="btn btn primary" type="submit" name="submit" value="Registrarme">
 <input class="btn btn primary" type="reset" name="clear" value="Borrar">

 </form>
 </div>
 </div>
 </div>
 </div>

        
<br>        
<br>
<br> 
<br>
<br>        
<br>
<br>
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