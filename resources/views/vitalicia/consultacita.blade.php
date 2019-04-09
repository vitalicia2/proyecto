
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vitalicia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Centro de Asistencia Gerontológica" />
	<meta name="keywords" content="estancia, adultos mayores, gerontología, cuidado" />
	<meta name="author" content="Victor Díaz" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- favicon -->
	<link rel="shortcut icon" href="vitalicia/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="vitalicia/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="vitalicia/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="vitalicia/css/simple-line-icons.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="vitalicia/css/owl.carousel.min.css">
	<link rel="stylesheet" href="vitalicia/css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="vitalicia/css/bootstrap.css">

	<link rel="stylesheet" href="vitalicia/css/orange.css">

	<!-- Modernizr JS -->
	<script src="vitalicia/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
	<body>
        
        <!--             -->   
        
        <script type="text/javascript">
            $(document).ready(function(){
    
                $("#consulta").click(function() {
   
                
                    var con = $("input[name='consult']").val();        
                
                        if (con == '')
                            {
                                $('#consult').prop("required", true);
                            }
           // $("#idhc").click(function() {
               //  $("#idhora").load('{{url('combocahorario')}}' + '?idhc='  +this.options[this.selectedIndex].value) ;
               //});
            
             //$("#infoconsulta").load('{{url('cfolio')}}' + '?' + $(this).closest('form').serialize()) ;   
            //$("#infoconsulta").load('{{url('cfolio')}}' + '?'  + $('input[name=consult]').val());
                                    
                                    //+ '?'  + $(this).closest('form').serialize()) ;   
                });

        });
        </script>
        
        
        
        <!--                       -->
        
	<header role="banner" id="insideV-header">
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-insideV-nav-toggle insideV-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		          	<a class="navbar-brand" href="http://vitalicia.com.mx"><img src="logo.png" alt="Vitalicia"></a>  
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="{{URL::action('vitalicia@inicio')}}">Inicio</a></li>
		            <li><a href="{{URL::action('ControlCitas@cita')}}">Agendar Cita</a></li>
                    <li><a href="{{URL::action('vitalicia@galeria')}}">Galer&iacute;a</a></li>
                    <li><a href="{{URL::action('usuariosc@login')}}">Iniciar Sesión</a></li>
		          </ul>
		        </div>
			    </nav>
			  </div>
	</header>

        <br>
        <br>
        <br>
        <br>
        
                <div class="container">  
				<div class="col-md-12 section-heading text-center">
					<h2>Consultar Cita</h2>
				</div>
                </div>
               

  <div class="container">
    <div class="row row-bottom-padded-sm">
        <div class="col-md-12 section-heading text-left">
            
                <hr>


                <form action="{{route('cfolio')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
             
                    <!---------------------->
                    <div class="row">
                        <h3><strong>Información de Cita</strong></h3>
                    </div>
                    <!---------------------->
                    <div id='info'>
                    <!---------------------->
                    <div class="col-md-4">
                        <div class="form-group">
                            Folio de Cita
                                <input type = 'text' name = 'consult' id= 'consult' class="form-control input-lg" pattern='[0-9]{5}'>
                        </div>
                    </div>
                    <!---------------------->
                    <div class="col-md-4">
                        <div class="form-group">
                                <br><!--button type="button" class='btn btn-primary ' name = "consulta" id="consulta" >Consultar</button--><input type='submit' class='btn btn-primary ' value='Consultar' id='consulta'>  <a href="{{URL::action('ControlCitas@cita')}}" type="button" class='btn btn-outline' name="cancelar" id="cancelar" >Cancelar</a>
                        </div>
                    </div>
                    <!-------------------->
                    </div>    
                    <!-------------------->
        </div>
        <div class="col-md-12 section-heading text-left">
                    <div id='infoconsulta'>
                        <div class="col-md-12">
                            <div class="form-group">
                                
                            
                            </div>
                        </div>
                    </div>

                    <!-------------------->
                </form>

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
	<script src="vitalicia/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="vitalicia/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="vitalicia/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="vitalicia/js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="vitalicia/js/owl.carousel.min.js"></script>


	<!-- Main JS (Do not remove) -->
	<script src="vitalicia/js/main.js"></script>

	</body>
</html>