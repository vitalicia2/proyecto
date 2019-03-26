
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vitalicia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Centro de Asistencia Gerontológica" />
	<meta name="keywords" content="estancia, adultos mayores, gerontología, cuidado" />
	<meta name="author" content="Victor Díaz" />

	<!-- favicon -->
	<link rel="shortcut icon" href="vitalicia/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="../css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<link rel="stylesheet" href="../css/orange.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../js/respond.min.js"></script>
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
        
        <div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12 section-heading text-center">
            <img src="../images/ook.png" alt="Ok!" width="250" height="250" >
                <div class="col-md-12 section-heading text-center">

<?php
	
	$email = $_POST['email'];
	
	function validateEmail($email) {
	   if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		  return false;
	   else
		  return true;
	}


	if((strlen($_POST['name']) < 1 ) || (strlen($email) < 1 )  || (strlen($_POST['message']) < 1 ) || validateEmail($email) == FALSE) {
		$emailerror .= 'Error:';

		if(strlen($_POST['name']) < 1 ){
			$emailerror .= '<li>Ingresa tu nombre</li>';
		}
	
		if(strlen($email) < 1 ){
			$emailerror .= '<li>Ingresa un correo electr&oacute;nico</li>';
		}
	
		if(validateEmail($email) == FALSE) {
			$emailerror .= '<li>Ingresa un correo electr&oacute;nico v&aacute;lido</li>';
		}
	
		if(strlen($_POST['message']) < 1 ){
			$emailerror .= '<li>Ingresa tu mensaje</li>';
		}
		echo '
		<div id="emailerror">
			<ul>'.
		 $emailerror.
			'</ul>
		</div>';

	} else {
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['message'];
		
		require("class.phpmailer.php");
		$mail = new PHPMailer();
        $mail->Host = "localhost";
		$mail->From = "noreply@vitalicia.com.mx";
		$mail->Subject = "Contacto Vitalicia";
		$mail->ReplyTo = $email;
		$mail->AddAddress("contacto@vitalicia.com.mx");
		
		
		//var_dump($mail);
		
		
		$body  = "Nombre: ".$name."<br>";
		$body  .= "Email: ".$email."<br>";
		$body  .= $msg."<br>";
		
		$mail->Body = $body;
		$mail->AltBody = "Saludos";
		
		if($mail->Send()){
			
			
			echo '<div id="emailsuccess">¡Gracias por tu mensaje!</div>';
			 
			header('refresh: 2; url= http://vitalicia.com.mx');
			exit();
			 
			/* Make sure that code below does not get executed when we redirect. 
			exit;*/
			
		}else{
			echo '
				<div id="emailerror">
					Error al enviar mensaje!
				</div>';
		}
	
	}
	
	

?>
           
            </div>
            </div>
        </div>
     </div>
        
<!--Inicio Footer--->
        

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12">
					<p class="copyright text-center">Derechos reservados &copy; 2018 | Vitalicia.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="social social-circle">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="https://goo.gl/Bc1qmz"><i class="icon-facebook"></i></a></li>
						<!--li><a href="#"><i class="icon-youtube"></i></a></li-->
					</ul>
				</div>
			</div>
		</div>
	</footer>
	
<!--Fin Footer--->
        
        
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="../js/owl.carousel.min.js"></script>


	<!-- Main JS (Do not remove) -->
	<script src="../js/main.js"></script>

	</body>
</html>