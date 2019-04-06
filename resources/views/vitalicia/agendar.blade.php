
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
    </head>
	<body>
        
        <!--             -->   
        
        <script type="text/javascript">
            $(document).ready(function(){
    
    
            $('#datosotros').hide();
            $('#sipaciente').hide();
            $('#solicitar').hide();
            $('#confirmacion').hide();
            $('#paciente').hide();

            $("#idhc").click(function() {
                 $("#idhora").load('{{url('combocahorario')}}' + '?idhc='  +this.options[this.selectedIndex].value) ;
               });

            $("#mismo").click(function() {
                 $('#datosotros').hide(); 
               });

            $("#otro").click(function() {
                 $('#datosotros').show(); 
               });

            $("#si").click(function() {
                 $('#nopaciente').hide();
                 $('#sipaciente').show();
                 $('#paciente').hide();
               });

            $("#no").click(function() {
                 $('#nopaciente').show();
                 $('#sipaciente').hide();
                 $('#paciente').show();
               });


            $("#ok").click(function() 
                {
                   $('#solicitar').show();
                   $('#ok').hide();
                    var foli = $("input[name='idcitas']").val();
                        alert("GUARDE SU FOLIO ANTES DE CONTINUAR: " + foli);
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
					<h2>Agendar Cita</h2>
				</div>
        </div>
               

  <div class="container">
    <div class="row row-bottom-padded-sm">
        <div class="col-md-12 section-heading text-left">
        <hr>
        <form action="{{route('oki')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <!---------------------->
            <div class="row">
                <h3><strong>Informaci&oacute;n de Cita</strong></h3>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                    Folio de Cita
                        <input type = 'text' name = 'idcitas' id= 'idcitas' value = '{{$idcitas}}' readonly = 'readonly' class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                    Fecha de Cita
                            <input type="date" name="fecha" id='fecha' min="2019-03-18" max="2019-12-31" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Seleccione horario<select name = 'idhc' id= 'idhc' class="form-control input-lg">
                                                    @foreach($chorarios as $hor)
                                                    <option value = '{{$hor->idhc}}'>{{$hor->tipo}}</option>
                                                    @endforeach
                                          </select>
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4" id='idhoras'>
                <div class="form-group">
                        Selecciona la hora de tu cita<select name='idhora' id='idhora' class="form-control input-lg">     </select>
                </div>
            </div>
            <!---------------------->
            
            <div class="col-md-4" id='solicitante'>
                <div class="form-group">
                        ¿Para quién solicita la cita?
                        <br>
                                 <input type = 'radio' value = 'mismo' name = 'persona' id = 'mismo' checked >Usted Mismo
                                 <input type = 'radio' value = 'otro' name = 'persona' id = 'otro' >Otra persona
                        <br>
                </div>
            </div>
            <!---------------------->
            
        <div id='datosotros'>    
            <div class="col-md-4">
                <div class="form-group">
                ¿Cuál es su relación con el paciente?   <select name='relacion' id='relacion' class="form-control input-lg">
                                                        <option>Seleccione una opci&oacute;n</option>
                                                        <option>Abuelo/a</option>
                                                        <option>Padre</option>
                                                        <option>Madre</option>
                                                        <option>Hermano/a</option>
                                                        <option>Esposo/a</option>
                                                        <option>Pareja del paciente</option>
                                                        <option>Tutor legal</option>
                                                    </select>
                </div>
            </div>
            
            
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                    Apellido Paterno
                        <input type = 'text' name ='appotro' id = 'appotro'  placeholder="Apellido Paterno del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Apellido Materno
                            <input type = 'text' name ='apmotro' id = 'apmotro' placeholder="Apellido Materno del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Nombre 
                            <input type = 'text' name ='nombreotro' id = 'nombreotro' placeholder="Nombre del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Direcci&oacute;n
                            <input type = 'text' name ='direotro' id = 'direotro' placeholder="Dirección del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        C&oacute;digo Postal
                            <input type='text' name ='cpotro' id = 'cpotro' placeholder="CP del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Ciudad
                            <input type = 'text' name ='ciudadotro' id = 'ciudadotro' placeholder="Ciudad del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Municipio
                            <input type = 'text' name ='municipiootro' id = 'municipiootro' placeholder="Municipio del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Tel&eacute;fono de Solicitante
                            <input type='text' name ='telotro' id = 'telotro' placeholder="Teléfono del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
            <div class="col-md-4">
                <div class="form-group">
                        Correo electr&oacute;nico
                            <input type='text' name ='correootro' id = 'correootro' placeholder="E-mail del Solicitante" class="form-control input-lg">
                </div>
            </div>
            <!---------------------->
        </div>
            </div>

<div class="col-md-12 section-heading text-left">    
            <hr>
                <div class="row">
                    <h3><strong>Informaci&oacute;n del paciente</strong></h3>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        ¿Ya fue atendido anteriormente por Nosotros?
                        <br>
                                 <input type = 'radio' value = 'si' name = 'atencion' id = 'si'>Si
                                 <input type = 'radio' value = 'no' name = 'atencion' id = 'no'>No
                        <br>
                    </div>
                </div>
                <!------------------->        
                <div id='sipaciente' class="col-md-6">
                    <div class="form-group">
                        ¿Cu&aacute;l es el folio que se le hab&iacute;a asignado?
                            <input type = 'text' name ='folio' id = 'folio' placeholder="Folio que se había asignado" class="form-control input-lg">
                    </div>
                </div>
                <!------------------->        
                <div id='nopaciente' class="col-md-6">
                    <div class="form-group">        
                        Tratamiento de Cortes&iacute;a (se&ntilde;ora, se&ntilde;or, se&ntilde;orita, etc)
                                 <input type = 'text' name ='trato' id = 'trato' placeholder="Señor, Señora, Señorita, etc." class="form-control input-lg">
                    </div>
                </div>
                <!------------------->
</div>
<div id='paciente'>
<div class="col-md-12 section-heading text-left">    
            <hr>
                        <div class="row">
                            <h3><strong>Los Siguientes datos favor de llenar con cuidado</strong></h3>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                Apellido Paterno del paciente
                                    <input type = 'text' name ='app' id = 'app' placeholder="Apellido Paterno del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Apellido Materno del paciente
                                    <input type = 'text' name ='apm' id = 'apm' placeholder="Apellido Materno del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Nombre(s) del paciente
                                    <input type = 'text' name ='nombrepaciente' id = 'nombrepaciente' placeholder="Nombre(s) del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Direcci&oacute;n del paciente
                                    <input type = 'text' name ='direccion' id = 'direccion' placeholder="Dirección del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Ciudad donde recide el paciente
                                    <input type = 'text' name ='ciudad' id = 'ciudad' placeholder="Ciudad del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Estado donde recide el paciente
                                        <select name = 'estado' id= 'estado' class="form-control input-lg">
                                            <option>Seleccione una Opci&oacute;n</option>
                                            <option>Aguascalientes</option>
                                            <option>Baja California</option>
                                            <option>Baja California Sur</option>
                                            <option>Campeche</option>
                                            <option>CDMX</option>
                                            <option>Coahuila de Zaragoza</option>
                                            <option>Colima</option>
                                            <option>Chiapas</option>
                                            <option>Chihuahua</option>
                                            <option>Durango</option>
                                            <option>Estado de M&eacute;xico</option>
                                            <option>Guanajuato</option>
                                            <option>Guerrero</option>
                                            <option>Hidalgo</option>
                                            <option>Jalisco</option>
                                            <option>Michoac&aacute;n de Ocampo</option>
                                            <option>Morelos</option>
                                            <option>Nayarit</option>
                                            <option>Nuevo Le&oacute;n</option>
                                            <option>Oaxaca</option>
                                            <option>Puebla</option>
                                            <option>Quer&eacute;taro</option>
                                            <option>Quintana Roo</option>
                                            <option>San Luis Potos&iacute;</option>
                                            <option>Sinaloa</option>
                                            <option>Sonora</option>
                                            <option>Tabasco</option>
                                            <option>Tamaulipas</option>
                                            <option>Tlaxcala</option>
                                            <option>Veracruz</option>
                                            <option>Yucat&aacute;n</option>
                                            <option>Zacatecas</option>
                                        </select>
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                C&oacute;digo Postal
                                    <input type = 'text' name ='cp' id = 'cp' placeholder="CP del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Tel&eacute;fono del paciente
                                    <input type='text' name ='tlpaciente' id='tlpaciente' placeholder="Teléfono del Paciente" class="form-control input-lg" >
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Fecha de Nacimiento
                                    <input type="date" name="fnacimiento" id='fnacimiento' max="2010-12-31" class="form-control input-lg">
                            </div>
                        </div>
                        <!------------------>
                        <div class="col-md-4">
                            <div class="form-group">
                                Sexo
                                <br>
                                    <input type = 'radio' value = 'H' name = 'sexo' id = 'H' checked>H
                                    <input type = 'radio' value = 'M' name = 'sexo' id = 'M'>M
                                <br>
                            </div>
                        </div>            
</div>
</div>
<div class="col-md-12 section-heading text-left">    
            <hr>
            <div class="row">
                <h3><strong>Motivo de la cita</strong></h3>
            </div>
            <!-------------------->
            <div class="col-md-12">
                    <div class="form-group">
                    <textarea placeholder="¿Cuál es la molestia o motivo de su cita?" class="form-control input-lg" name="motivo" id='motivo' rows="5" cols="40" maxlength='300' required></textarea>
                    </div>	
            <!-------------------->
            <Input type='button' class='btn btn-outline' value='¿Toda la información es correcta?' name='ok' id='ok'>
            <br>
            <input type='submit' class='btn btn-primary ' value='Guardar' id='solicitar'>
            <br>
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