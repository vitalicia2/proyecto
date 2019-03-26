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
	<link rel="stylesheet" href="../../../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../../css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="../../../css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../../css/bootstrap.css">

	<link rel="stylesheet" href="../../../css/orange.css">

	<!-- Modernizr JS -->
	<script src="../../../js/modernizr-2.6.2.min.js"></script>
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
		          	<a class="navbar-brand">Net IT Solutions | Modificar datos del Empleado</a>  
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../../modificaciones.html" ><span>Regresar</span></a></li> 
		          </ul>
		        </div>
			    </nav>
			  </div>
	</header>

<div id="insideV-our-services">
<div class="container">
<div class="row row-bottom-padded-sm">
    <div class="col-md-12 section-heading text-center">
            <h2 class="to-animate">Modificar datos del Empleado</h2>
    </div>
</div>
<div align=center>
<div class="row">
<div class="col-md-8 section-heading">

<?php
$con = mysqli_connect("localhost","root","","u435473506_netit");
   if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysqli_error());}

   $database = mysqli_select_db($con,"u435473506_netit");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error());}
$result = mysqli_query ($con,"SELECT id_emp,nombre,localidad,telefono FROM empleados");
if (! $result){
   echo "La consulta SQL contiene errores.".mysqli_error();
   exit();
}else {
    echo "<table border=’1’><tr><td>Id empleado</td><td>Nombre</td><td>Localidad</td><td>Telefono</td>
         </tr><tr>";
    while ($imprime = mysqli_fetch_row($result)){
                echo "<td>".$imprime[0]."</td>";
				echo "<td>".$imprime[1]."</td>";
				echo "<td>".$imprime[2]."</td>";
				echo "<td>".$imprime[3]."</td>";
				echo "<tr></tr>";
   }
   echo "</tr></table>";
 }

   // $con = mysql_connect("localhost","root","");
   // if (!$con){die('ERROR DE CONEXION CON LA BASE: ' . mysql_error());}

   // $database = mysql_select_db("netitsolutions",$con);
   // if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}

// $sql = "SELECT id_emp,nombre,localidad,telefono FROM empleados";
// $result = mysql_query ($sql);
// if (! $result){
   // echo "La consulta SQL contiene errores.".mysql_error();
   // exit();
// }else {
    // echo "<table border=’1’><tr><td>Id empleado</td><td>Nombre</td><td>Localidad</td><td>Telefono</td>
         // </tr><tr>";
    // while ($imprime = mysql_fetch_row($result)){
                // echo "<td>".$imprime[0]."</td>";
				// echo "<td>".$imprime[1]."</td>";
				// echo "<td>".$imprime[2]."</td>";
				// echo "<td>".$imprime[3]."</td>";
				// echo "<tr></tr>";
   // }
   // echo "</tr></table>";
 // }
?> 
</div>
    </div>
    </div>
    </div>

    
<div class="container">
<div class="row">
<div class="col-md-12">        
<div class="box to-animate">
    <div align=center>
<form name="modifi_emple" method="post" action="modi_emple.php">
 <table>
    <td><label>Id de empleado:</label></td><td><input type="text" name="idemp"></td>
    <td><label>Nombre:</label></td><td><input type="text" name="nom"></td>
	<td><label>Localidad:</label></td><td><input type="text" name="loca" ></td>
	<td><label>Telefono:</label></td><td><input type="text" name="tel">
	<td><label><input type="submit" value="Modificar"></td><td>
    </table>
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
	<script src="../../../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../../../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../../../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../../../js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="../../../js/owl.carousel.min.js"></script>


	<!-- Main JS  -->
	<script src="../../../js/main.js"></script>

	</body>
</html>