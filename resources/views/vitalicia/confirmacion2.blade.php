<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vitalicia | Inicio</title>
    <!--link rel="stylesheet" href="css/foundation.css"-->
      <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <!--link rel="stylesheet" href="css/foundation.min.css"-->
      <link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}">
    <!--link rel="stylesheet" href="css/app.css"-->
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--link rel="shortcut icon" href="favicon.ico"-->  
      <link rel="stylesheet" href="{{ asset('favicon.ico') }}">
  </head>
  <body>
    
   
      
    <hr>
        
            
            
    <div class="row large-8" align="center">
    <br>
    <br>
        <img src="ok.jpg" width="400" height="200" alt="Vitalicia">
        <H2>DATOS GUARDADOS EXITOSAMENTE</H2>
        <a href="{{route('certi')}}"><input class="button" value="Continuar"></a>
    <br>
    <br>
    </div>
        
     <hr>
      
    <footer>
        <div class="row">
            <div class="small-12 medium-6 columns">
                <p>Copyright &reg; {{date('Y')}} | Vitalicia</p>
                @yield('pie')
            </div>
        </div>
    </footer>

    <!--script src="js/vendor/jquery.js"></script-->
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <!--script src="js/vendor/what-input.js"></script-->
    <script src="{{ asset('js/vendor/what-input.js') }}"></script>
    <!--script src="js/vendor/foundation.js"></script-->
    <script src="{{ asset('js/vendor/foundation.js') }}"></script>
    <!--script src="js/app.js"></script-->
    <script src="{{ asset('js/app.js') }}"></script>
      
      </body>
</html>
