<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logoads3.png">
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

<!-------------- Expiración de CSS -------------->

<link rel="stylesheet" href="/public/Estilos.css?v=<?php echo(rand(1,500)); ?>" />

<!---------------- scripts tiempo de aparicion alertas --------------------->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },5000);
});
</script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div class="Container">
        <!--Inicio Barra de Navegacion-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <!-- Marca Navbar -->
            <a class="navbar-brand" href="index.html#Inicio"><img src="img/logoads.jpg" width="150" height="60" alt=""
                    loading="lazy"></a>
            <!-- Inicio Botón de contracción -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenido -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" id="one">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#Nosotros')}}">Nosotros</a>
                    </li> 
                    <!-- Desplegable --> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">Servicios</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="{{ route('productos') }}">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#contact')}}">Ayuda y Comentarios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">Más</a>
                        <ul class="dropdown-menu">   
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        </ul>
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
<!------------------ tarjetas ---------------------->
<div class="container-fluid">
  <div class="row">
@foreach($prod as $pro)

<div class="col-sm-3 text-center">
<div class="card shadow mb-3 bg-white rounded">
<div class="objetfitcover">
<img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}" data-toggle="modal" data-target="#exampleModal"  data-whatever2="{{ asset('archivos/' .$pro->foto) }}" data-toggle="tooltip" data-placement="top">
</div>
  <div class="card-body">
  <b>{{ $pro->nombre }}</b><br>
    {{ $pro->descripcion }}<br>
    <b>${{ $pro->precio }}</b>
  </div>
  <div class="card-footer text-muted" align="center">
     <button type="button" class="btn btn-link" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Inicie Sesión Antes">Adquirir</button>
  </div>
</div>
</div>

@endforeach
</div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
{{ $prod->links() }}
</ul>
</nav>
    <!-- Scripts para Bootstrap -->
<script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script>
    <!-- Scripts Nuevos -->
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
        $(function () {
$('[data-toggle="popover"]').popover()
})
$('.popover-dismiss').popover({
  trigger: 'focus'
})
$('#element').toast('show')
$('#element2').toast('show')
    </script>
</body>

</html>