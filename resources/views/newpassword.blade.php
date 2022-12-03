<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/fav.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/9bb6913fcf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    
    <!--nuevo script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('Estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reactor ADS</title>


</head>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
       //------ password -> confirmar ----------

       $("#pass2").keyup(function(){
        var txtpass1 = $("#pass").val();
        var txtpass2 = $("#pass2").val();
        console.log(txtpass2);
        if(txtpass1 == txtpass2){
            $("#spass").text("Correcto");
            $("#pass2").css({"border":"2px solid #0f0"}).fadeIn(2000);
        }else{
            $("#spass").text("Incorrecto");
            $("#pass2").css({"border":"2px solid #f00"}).fadeIn(2000);
        }
    });

});
</script>
    <body data-spy="scroll" data-target=".navbar" data-offset="50" onload="deshabilitaRetroceso()" id="one">
    <div class="Container">
        <!--Inicio Barra de Navegacion-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <!-- Marca Navbar -->
            <a class="navbar-brand" href="index.html#Inicio"><img src="{{asset('img/logoads.jpg')}}" width="150" height="60" alt=""
                    loading="lazy"></a>

            <!-- Inicio Botón de contracción -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#Nosotros')}}">Nosotros</a>
                    </li>
                    <!-- Desplegable -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">Servicios</a>
                        <ul class="dropdown-menu">    
                           
                            <li><a class="dropdown-item" href="{{route('productos')}}">Productos</a></li>
                            <li><a class="dropdown-item" href="{{route('servicios')}}">Servicios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#contact')}}">Ayuda y Comentarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Iniciar Sesión</a>
                    </li>
                    
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://m.facebook.com/reactorads/?tsid=0.12083137296877267&source=result"><i class="fab fa-facebook-square"></i>
                            Facebook</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<br>
<br>
<br>
<br>
<br>
<center>
<div class="card" style="width: 40rem;">
  <div class="card-header">
    Cambio de Contraseña
  </div>
  <div class="card-body text-left">
      <form action="{{ route('reset',['id'=>$usu1->id]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
    <label>Escribe tu nueva contraseña {{$usu1->nombre}}</label>
    <input type="password" class="form-control" name="password" id="pass"><br>
    <label>Confirmar Contraseña:</label>
    <input type="password" class="form-control" id="pass2">
    <small id="spass"></small><br>
    <button type="submit" class="btn btn-primary">Aceptar</button>
      </form>
@if (session('status'))
<div class="content">
<small id="emailHelp" class="form-text text-danger">{{(session('status'))}}</small> 
</div>
@endif
  </div>
</div>
</center>

 <!-- Scripts para Bootstrap -->

 <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script>
    <!-- Scripts Nuevos -->
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>