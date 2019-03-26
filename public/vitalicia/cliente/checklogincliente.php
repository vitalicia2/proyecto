<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Net It | Solutions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Web de servicios tecnológicos" />
	<meta name="keywords" content="Network, Information, technology, networking, source, responsive" />
	<meta name="author" content="Net IT Solutions" />

	<!-- favicon -->
	<link rel="shortcut icon" href="../favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
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
		          	<a class="navbar-brand" href="http://net-itmx.xyz"><img src="../images/logo.png" alt="Net IT Solutions"></a>  
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
    <h2>
    
<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "u435473506_netit";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if (password_verify($password, $row['password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "¡Bienvenido! En un momento te redireccionaremos: " .$_SESSION['username'];
    header('refresh: 3; url= http://localhost/netit/cliente/consultas_cliente.php');
			exit(); 

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login_cliente.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>
    </h2>
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