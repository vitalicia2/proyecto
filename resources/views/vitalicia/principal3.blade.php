<!doctype html>
<html lang="es" dir="ltr">

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


      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>
  
  <body>
    
    
            
    <div class="row large-10" align="center">
            @yield('encabezado')
    </div>
        
        
    <div class="row medium-8 large-5 columns">
            @yield('contenido')
    </div>
      
    <div class="row medium-8 large-3 columns">
            @yield('contenido2')
    </div>
    
    <div class="row">
            <div class="medium-4 columns">
            @yield('form1')
            </div>
            <div class="medium-4 columns">
            @yield('form2')
            </div>
            <div class="medium-4 columns">
            @yield('form3')
            </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-5"></div>
      <div class="col-sm-3 col-md-2">@yield('form4')</div>
      <div class="col-sm-3 col-md-2">@yield('form5')</div>
      <div class="col-sm-3 col-md-3 "></div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-3 ">@yield('form6')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-3 ">@yield('form6.1')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-3 ">@yield('form6.2')</div>
      <div class="col-sm-3 col-md-4 "></div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-1 ">@yield('form7')</div>
      <div class="col-sm-3 col-md-1 ">@yield('form7.1')</div>
      <div class="col-sm-3 col-md-1 ">@yield('form7.2')</div>
      <div class="col-sm-3 col-md-1 ">@yield('form7.3')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-3 ">@yield('form8')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-2 ">@yield('form9')</div>
      <div class="col-sm-3 col-md-2 ">@yield('form10')</div>
      <div class="col-sm-3 col-md-6 "></div>
      <div class="col-sm-3 col-md-2 ">@yield('form11')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-3 ">@yield('form12')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-4 ">@yield('form13')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-4 ">@yield('form14')</div>
      <div class="col-sm-3 col-md-6 "></div>
      <div class="col-sm-3 col-md-4 ">@yield('form15')</div>
      <div class="col-sm-3 col-md-5 "></div>
      <div class="col-sm-3 col-md-4 ">@yield('form16')</div>
      
      
    </div>  
  </div>
</div>


    
    <div class="row">
            <div class="large-4 columns">
            @yield('box1')
            </div>
            <div class="large-8 columns">
            @yield('box2')
            </div>
    </div>
    
    <div class="row">
        <div class="medium-8 large-5 columns">
        @yield('espacio')
        </div> 
    </div> 
    
    <div class="row">
        <div class="large-12 large-!2 columns">
        @yield('complete')
        </div> 
    </div>
      
  
  

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
