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

    $("#guarda").prop("disabled", false);//<-- desactiva el submit
    var valor = 0;  


 // -------- Apellido materno: solo texto y texto lateral --------------
        
    $("#nom").keyup(function(){
            var txtnom = $("#nom").val();
            var formato = /^[A-Za-z\xF1\xD1]+$/;

            if (formato.test(txtnom)){
                $("#snom").text("");
                $("#nom").css({"border":"1px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#snom").text("Este campo solo puede contener letras")
                $("#nom").css({"border":"1px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });

    $("#app").keyup(function(){
            var txtapp = $("#app").val();
            var formato = /^[A-Za-z\xF1\xD1]+$/;

            if (formato.test(txtapp)){
                $("#sapp").text("");
                $("#app").css({"border":"1px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#sapp").text("Este campo solo puede contener letras")
                $("#app").css({"border":"1px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });

    $("#apm").keyup(function(){
            var txtapm = $("#apm").val();
            var formato = /^[A-Za-z\xF1\xD1]+$/;

            if (formato.test(txtapm)){
                $("#sapm").text("");
                $("#apm").css({"border":"1px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#sapm").text("Este campo solo puede contener letras")
                $("#apm").css({"border":"1px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });

    $("#mail").blur(function(){
        var txtmail = $("#mail").val();
        var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (valmail.test(txtmail)){
            $("#smail").text("")
            $("#mail").css({"border":"1px solid #0f0"}).fadeIn(2000);
            $("#guarda").prop("disabled", false);
        }else{
            $("#smail").text("Formato incorrecto")
            $("#mail").css({"border":"1px solid red"}).fadeIn(2000)
            $("#guarda").prop("disabled", true);
        }
    });

    $("#msg").keyup(function(){
            var txtmsg = $("#msg").val();
            var formato = /^[A-Za-z0-9\_\-\.\,\s\xF1\xD1]+$/;

            if (formato.test(txtmsg)){
                $("#smsg").text("")
                $("#msg").css({"border":"1px solid #0f0"}).fadeIn(2000)
                $("#guarda").prop("disabled", false)
            }
            else{
                $("#smsg").text("Este campo no puede contener caracteres especiales")
                $("#msg").css({"border":"1px solid red"}).fadeIn(2000)
                $("#guarda").prop("disabled", true)
            }
        });

});
</script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div class="Container">
        <!--Inicio Barra de Navegacion-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <!-- Marca Navbar -->
            <a class="navbar-brand" href="index.html#Inicio"><img src="img/logoads.jpg" width="120" height="60" alt=""
                    loading="lazy"></a>
            <!-- Inicio Botón de contracción -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenido -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" id="one" style="position: relative;">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#Inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Nosotros">Nosotros</a>
                    </li> 
                    <!-- Desplegable --> 
                    <li class="nav-item dropdown" style="position: relative; z-index: 2">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="position: relative; z-index: 1">Servicios</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="{{ route('servicios2')}}">Servicios</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos2') }}">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Ayuda y Comentarios</a>
                    </li>
                  
                </ul>
<!-- Alerta de envio de formulario -->
 
@if (session('status'))

  <div class="alert alert-success alert-dismissible fade show content" role="alert" style="position: absolute; width: 450px; height: 50px; z-index: 20; margin-left: 730px;">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@if (session('status2'))

  <div class="alert alert-danger alert-dismissible fade show content" role="alert" style="position: absolute; width: 450px; height: 50px; z-index: 20; margin-left: 730px;">
  <strong>{{session('status2')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
                <ul class="navbar-nav ml-auto abajo">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">{{$usu1->nombre . ' ' . $usu1->app}}</a>
                        <ul class="dropdown-menu">   
                            <li><a class="dropdown-item" href="{{ route('perfil') }}">Mis Productos</a></li>  
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://m.facebook.com/reactorads/?tsid=0.12083137296877267&source=result"><i class="fab fa-facebook-square"></i>
                            Facebook</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<!---------------------------- Slider ---------------------------->
<div id="Inicio" class="carousel slide carousel-fade mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#Inicio" data-slide-to="0" class="active"></li>
            <li data-target="#Inicio" data-slide-to="1"></li>
            <li data-target="#Inicio" data-slide-to="2"></li>
            <li data-target="#Inicio" data-slide-to="3"></li>
        </ol>
<div class="carousel-inner" style="position: relative; z-index: 1;">

    <div class="carousel-item active"><img src="img/ads1.jpg" height="600" class="d-block w-100" alt="...">
        <div class="background-overlay">  </div>
        <div class="carousel-caption">
            <h5 class="display-4 h4-md mb-4 font-weight-bold">Bienvenido</h5>
            <p class="h4 mb-5 pb-3 text-white-50">REACTOR ADS</p>
        </div>
    </div>
    <div class="carousel-item"> <img src="img/ads2.jpg" height="600" class="d-block w-100" alt="...">
        <div class="background-overlay"></div>
        <div class="carousel-caption">
            <h5 class="display-4 mb-4 font-weight-bold">Somos tu mejor opcion</h5>
            <p class="h4 mb-5 pb-3 text-white-50"></p>
        </div>
    </div>
    <div class="carousel-item"> <img src="img/ads3.jpg" height="600" class="d-block w-100" alt="...">
        <div class="background-overlay"></div>
        <div class="carousel-caption">
            <h5 class="display-4 mb-4 font-weight-bold">Equipos de Computo</h5>
            <p class="h4 mb-5 pb-3 text-white-50"></p>
        </div>
    </div>
    <div class="carousel-item"> <img src="img/ads4.jpg" height="600" class="d-block w-100" alt="...">
        <div class="background-overlay"></div>
        <div class="carousel-caption">
            <h5 class="display-4 mb-4 font-weight-bold">Servidores</h5>
            <p class="h4 mb-5 pb-3 text-white-50"></p>
        </div>
    </div>
</div><a name="servicio2"></a>
        <a class="carousel-control-prev" href="#Inicio" role="button" data-slide="prev" style="position: absolute; z-index: 2; height: 100px; top: 250px"> <span
                class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
        <a class="carousel-control-next" href="#Inicio" role="button" data-slide="next" style="position: absolute; z-index: 2; height: 100px; top: 250px"> <span
                class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>

    <!-- Primer contenedor -->
    <div class="jumbotron jumbotron-sm mb-0" id="Nosotros">
        <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 col-lg-12">
        <h1 class="h1">
                Nosotros
        </h1>
        </div>
        </div>
        </div>
    </div>
    <div class="container-fluid patata2">
        <div class="row align-items-center">
        <div class="col-md-8 text-justify p-5">
            <p>Somos una empresa 100% mexicana fundada en 2006 con la misión de brindar soluciones integrales en tecnologías de la información a las empresas, garantizando servicios de calidad y productos de vanguardia.
Nuestras alianzas con las mejores marcas nos permiten ofrecerle un excelente precio, una amplia disponibilidad y la capacidad de manejar cualquier producto de tecnología que esté buscando, desde el más común hasta el más especializado.
Contamos con una área de soporte técnico y personal calificado para responder a sus necesidades de mantenimiento preventivo y correctivo y otros servicios.
Somos distribuidores autorizados de (Correo electrónico, Google Drive, Calendario, etc.) y de (Servicios de publicidad por internet).</p>
        </div>
        <div class="col-md-4 text-center p-2">
        <p><img height="150" width="260" src="img/ads.jpg"></p>
        </div>
        </div>
    </div>

    <!-- Transportes 
    <div class="jumbotron jumbotron-sm mb-0" id="Transportes">
        <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 col-lg-12">
        <h1 class="h1">
                Servicios
        </h1>
        </div>
        </div>
        </div>
    </div>
-->
<!------------- tarjetas galeria -----------------
<div class="container-fluid patata2">
        <br>
    <div class="row align-items-center">
        <div class="row mb-5 ml-auto mr-auto">        
            <a type="button" href="" class="btn btn-primary">Ver Todo</a>
        </div>
    </div>
</div>-->
<!------------- Productos ------------------->

    <div class="jumbotron jumbotron-sm mb-0" id="Comercializadora">
        <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 col-lg-12">
        <h1 class="h1">
                Productos/Servicios
        </h1>
        </div>
        </div>
        </div>
    </div>

<!------------- tarjetas productos ------------------->
<div class="container-fluid patata2">
        <br>
    <div class="row align-items-center">

        @foreach($prod as $pro)
            <div class="col-md-6 p-2 text-center col-sm-6 col-lg-4 col-xl-3">
                <div class="card mb-3 shadow mb-5 bg-white rounded">
                    <div class="objetfitcover">
                        <img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}">
                    </div>
                    <div class="card-body">
                        <p class="card-text"><b>{{$pro->descripcion}}</b></p>
                    </div>                         
                </div>
            </div>    
        @endforeach
    </div>
</div>

<!------------------------ Ayuda y comentarios ------------------------->
    <div class="jumbotron jumbotron-sm mb-0" id="contact">
    <div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 col-lg-12">
    <h1 class="h1">
            Contactanos <small>Sientete Libre de Contactarnos</small>
    </h1>
    </div>
    </div>
    </div>
    </div>

    <div class="container-fluid patata2 p-5">
        <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-8">
        <div class="well well-sm">
        <form action="{{ route('contactanos') }}" method="post">
        {{ csrf_field() }} 
        <div class="row align-items-center">
        <div class="col-md-6">
    <div class="form-group">
        <label for="Nombre"><i class="fas fa-user"></i> Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nom" placeholder="Ingresa tu Nombre" required="required" autocomplete="off" />
            <small id="snom"></small>
    </div>
    <div class="form-group">
        <label for="Apellido Paterno"><i class="fas fa-user"></i> Apellido Paterno</label>
            <input name="a_paterno" type="text" class="form-control" id="app" placeholder="Ingresa tu Apellido Paterno" required="required" autocomplete="off" />
            <small id="sapp"></small>
    </div>
    <div class="form-group">
        <label for="Apellido Materno"><i class="fas fa-user"></i> Apellido Materno</label>
            <input name="a_materno" type="text" class="form-control" id="apm" placeholder="Ingresa tu Apellido Materno" required="required" autocomplete="off" />
            <small id="sapm"></small>
    </div>
    <div class="form-group">
        <label for="email"><i class="fas fa-envelope"></i> Correo Electronico</label>
            <input name="correo" type="email" class="form-control" id="mail" placeholder="Ingresa Correo Electronico" required="required" autocomplete="off" />
            <small id="smail"></small>
    </div>
    <div class="form-group">
        <label for="subject"><i class="fas fa-hand-pointer"></i> Tema</label>
        <select name="asunto" id="subject" class="form-control" required="required">
            <option value="na" selected="">Elige Una:</option>
            <option value="Servicios Generales al Cliente">Servicios Generales al Cliente</option>
            <option value="Sugerencias">Sugerencias</option>
            <option value="Soporte de Producto">Soporte de Producto</option>
        </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="name"><i class="fas fa-comment"></i> Mensaje</label>
        <textarea name="mensaje" id="msg" class="form-control" rows="16" cols="25" required="required" placeholder="Escribe tu Mensaje..."></textarea>
        <small id="smsg"></small>
    </div>
    </div>
        <div class="col-md-12">
        <button type="submit" class="btn btn-primary pull-right" data-trigger="focus" id="guarda" data-container="body" tabindex="0" data-placement="bottom">
                Enviar Mensaje</button>
        </div>
        </div>
        </form>
        </div>
        </div> 
        <div class="col-md-12 col-lg-12 col-xl-4">
        <form>
        <legend class="text-center"><i class="fas fa-map-marked-alt"></i> Nuestra Oficina
        </legend>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30126.19623387459!2d-99.63366697357179!3d19.292168893278443!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad784fd7c0c117e3!2sReactor%20ADS%2C%20SA%20de%20CV!5e0!3m2!1ses!2smx!4v1644982415497!5m2!1ses!2smx" width="410" height="460" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </form>
        </div>
        </div>
    </div>           

    <footer class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Reactor ADS</small><br>
        </div>
    </footer>

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