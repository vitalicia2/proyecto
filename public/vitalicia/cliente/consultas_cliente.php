<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('refresh: 0; url= http://localhost/netit/cliente/login_cliente.html');
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
	<link rel="shortcut icon" href="../favicon.ico">

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
                    <li class="active"><a href="consultas_cliente.php"><span>Consultas</span></a></li>
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
					<h2 class="to-animate">Consultas</h2>
				</div>
			</div>
			<div class="row">
            
            <div class="col-md-12 text-left">
            <div class="col-md-4">
          	<div class="box to-animate">	
                <h3>Consulta de Encargado</h3>
            	<form name="consulta_encargado" method="post" action="php/consultas/consulta_enc.php">
                Datos de encargado :<input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" value="Buscar">
                </form>
            </div>  
            </div>
            
            <div class="col-md-4">
            <div class="box to-animate">
                <h3>Consulta de Servicio</h3>
                <form name="consulta_servicio" method="post" action="php/consultas/consulta_serv.php">
                Nombre del servicio :<input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" value="Buscar">
                </form>
            </div>
            </div>
                
                
            <div class="col-md-4">                      
            <div class="box to-animate">
            <h3>Consulta de Cliente</h3>
              <form name="consulta_cliente" method="post" action="php/consultas/consulta_cli.php">
                información del cliente :<input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" value="Buscar">
                </form>
            </div>  
            </div>  
            </div>
                
                
            <div class="col-md-12 text-left">    
            <div class="col-md-6">
            <div class="box to-animate">
                <h3>Consulta de Departamento</h3>
            	<form name="consulta_nombre" method="post" action="php/consultas/consulta_dep.php">
                Nombre del departamento :<input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" value="Buscar">
                </form>
            </div>  
            </div>
                
                
                
            <div class="col-md-6">
            <div class="box to-animate">
                <h3>Consulta de Empleado</h3>
            	<form name="consulta_empleados" method="post" action="php/consultas/consulta_emp.php">
                Nombre del empleado :<input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" value="Buscar">
                </form>
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