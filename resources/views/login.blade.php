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
    <!--reCaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Reactor ADS</title>

<!-------------- Expiración de CSS -------------->

<link rel="stylesheet" href="/public/Estilos.css?v=<?php echo(rand(1,500)); ?>" />

<!---------------- scripts tiempo de aparicion alertas --------------------->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },5000);

//----- mail -> formato generico -------

$("#email").blur(function(){
        var txtmail = $("#email").val();
        var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (valmail.test(txtmail)){
            $("#smail").text("");
        }else{
            $("#smail").text("Correo Electronico Incorrecto").css({"color":"red"});
        }
    });

    $("#nom").keyup(function(){
            var txtnom = $("#nom").val();
            var formato = /^[A-Za-z\xF1\xD1]+$/;

            if (formato.test(txtnom)){
                $("#snom").text("");
                $("#nom").css({"border":"2px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#snom").text("Este campo solo puede contener letras")
                $("#nom").css({"border":"2px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });

        $("#app").keyup(function(){
            var txtapp = $("#app").val();
            var formato = /^[A-Za-z\xF1\xD1]+$/;

            if (formato.test(txtapp)){
                $("#sapp").text("");
                $("#app").css({"border":"2px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#sapp").text("Este campo solo puede contener letras")
                $("#app").css({"border":"2px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });

        $("#mail").blur(function(){
        var txtmail = $("#mail").val();
        var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (valmail.test(txtmail)){
            $("#mail").css({"border":"2px solid #0f0"});
            $("#guarda").prop("disabled", false);
        }else{
            $("#semail").text("Formato de correo incorrecto");
            $("#mail").css({"border":"2px solid red"});
            $("#guarda").prop("disabled", true);
        }
    });

    $("#tel").keyup(function(){
            var txttel = $("#tel").val();
            var formato = /^[0-9\xF1\xD1]+$/;

            if (formato.test(txttel)){
                $("#stel").text("");
                $("#tel").css({"border":"2px solid #0f0"}).fadeIn(2000);
                $("#guarda").prop("disabled", false);
            }
            else{
                $("#stel").text("Este campo solo puede contener numeros")
                $("#tel").css({"border":"2px solid red"}).fadeIn(2000);
                $("#guarda").prop("disabled", true);
            }
        });
    
        $("#direc").keyup(function(){
            var txtdirec = $("#direc").val();
            var formato = /^[A-Za-z0-9\_\-\.\,\s\xF1\xD1]+$/;

            if (formato.test(txtdirec)){
                $("#sdirec").text("")
                $("#direc").css({"border":"1px solid #0f0"}).fadeIn(2000)
                $("#guarda").prop("disabled", false)
            }
            else{
                $("#sdirec").text("Este campo no puede contener caracteres especiales")
                $("#direc").css({"border":"1px solid red"}).fadeIn(2000)
                $("#guarda").prop("disabled", true)
            }
        });

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
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" id="one">
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: relative;">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#Nosotros')}}">Nosotros</a>
                    </li>
                    <!-- Desplegable -->
                    <li class="nav-item dropdown" style="position: relative; z-index: 2">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" style="position: relative; z-index: 1">Servicios</a>
                        <ul class="dropdown-menu">    
                           
                            <li><a class="dropdown-item" href="{{route('productos')}}">Productos</a></li>
                            <li><a class="dropdown-item" href="{{route('servicios')}}">Servicios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home#contact')}}">Ayuda y Comentarios</a>
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
<!-- Alerta de envio de formulario -->

@if (session('status3'))

  <div class="alert alert-success alert-dismissible fade show content position-fixed" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 20px;">
  <strong>{{session('status3')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@if (session('status5'))

  <div class="alert alert-warning alert-dismissible fade show content position-fixed" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 20px;">
  <strong>{{session('status5')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<!-------------------- alerta de inicio de sesión -------------------->
@if (session('alerta'))

<div class="container-fluid content" id="two">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('alerta')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif

<br>
<br>

<!------------------------- Formulario Login --------------------------->
<center> 
<div class="card shadow p-3 mb-5 bg-white rounded" style="width: 30rem;">
  <div class="card-body">
    <h3 class="font-weight-bold">Iniciar Sesión</h3>
    <form action="{{ route('validar') }}" method="POST" class="mt-3" name="nuevo" onsubmit="return miFuncion(this)" >
      {{ csrf_field() }}
      @if (session('status'))
        <div class="content">
        <small id="emailHelp" class="form-text text-danger">{{(session('status'))}}</small> 
        </div>
      @endif
      <span id="smail" class="smail"></span>
      <hr>
        <div class="form-group text-left">
          <label for="exampleInputEmail1"><i class="bi bi-envelope-fill"></i> Correo Electronico</label>
          <input name="email" type="email" class="form-control mail" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group text-left">
          <label for="exampleInputPassword1"><i class="bi bi-key-fill"></i> Contraseña</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group" style="margin: auto;">
                  
                      <div class="g-recaptcha" data-sitekey="6Lf0fvgeAAAAAHawZNuvtn8pSd221ebauxApYbnb"></div>
                <br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm container-fluid">
              <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#exampleModal">Registrarse</button>
            </div>
            <div class="col-sm container-fluid">
              <button type="submit" id="enviar" class="btn btn-primary btn-block" >Iniciar Sesión</button>
            </div>
          </div>
            <hr> 
          <div class="row">
            <button type="button" class="btn btn-sm btn-link" style="margin-left: auto; margin-right: auto;" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Olvide mi contraseña</button>
          </div>
        </div>
    </form>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form action="{{ route('validar2') }}" method="POST" class="mt-3">
              {{ csrf_field() }}
            <p>Escriba su Correo Electronico</p>
            <input type="email" class="form-control" name="email"><br>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          </form>
        </div>
      </div>
  </div>
</div>

</center>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form name="registro" action="{{ route('save') }}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div>
            <div class="row">
                <div class="col-sm">
                    <label><i class="bi bi-person-fill"></i> Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nom" autocomplete="off">
                    <small id="snom"></small>
                </div>   
                <div class="col-sm">
                    <label><i class="bi bi-person-fill"></i> Apellido</label>
                    <input name="app" type="text" class="form-control" id="app" autocomplete="off">
                    <small id="sapp"></small>
                </div>
                <div class="col-sm-3">
                    <label><i class="bi bi-gender-ambiguous"></i> Genero</label>
                    <select name="gen" class="form-control" required="required">
                        <option value="">Eliga una opción</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
             </div>
        </div>
        <br>
         <div>
            <div class="row">
                <div class="col-sm-5">
                    <label><i class="bi bi-envelope-fill"></i> Correo</label>
                    <input name="email" type="text" class="form-control" id="mail" autocomplete="off">
                    <small id="semail"></small>
                </div>
                <div class="col-sm-3">
                    <label><i class="bi bi-telephone-fill"></i> Telefono</label>
                    <input name="tel" type="text" class="form-control" id="tel" autocomplete="off">
                    <small id="stel"></small>
                </div>
                <div class="col-sm-4">
                    <label><i class="bi bi-calendar-event-fill"></i> Fecha de Nacimiento</label>
                    <input name="fn" type="date" class="form-control" id="fecha">
                    <small id=""></small>
                </div>
             </div>
        </div>
        <br>
         <div>
            <div class="row">
                 <div class="col-sm-5">
                    <label><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direc" autocomplete="off">
                    <small id="sdirec"></small>
                </div>
                <div class="col-sm-3">
                    <label><i class="bi bi-key-fill"></i> Contraseña </label>
                    <input name="password" type="password" class="form-control" id="pass">
                    <small id=""></small>
                </div>
                <div class="col-sm-3">
                    <label><i class="bi bi-key-fill"></i> Confirmar</label>
                    <input type="password" class="form-control" id="pass2">
                    <small id="spass"></small>
                </div>
                <div class="col-sm-1">
                     <label id="icono"><i class="bi bi-eye-fill"></i></label><br>
                    <input id="ver" type="checkbox" onChange="hideOrShowPassword()"/>
                </div>
                <input name="tipo" value="2" class="" hidden>
             </div>
        </div>
        <br>

     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="guarda" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Registrarse</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso de Privacidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        Los datos personales que recabamos de usted, seran utilizados para la siguientes finalidades que son necesarias para los servicios que solicite:
        &bull; Solicitar alta &bull; Solicitar servicios y/o productos &bull; Informar sobre promociones, actividades o eventos &bull; Evaluar calidad en
        el servicio &bull; De manera adicional, utilizaremos su información personal para las siguientes finalidades secundarias que no son necesarias
        para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención &bull; Mercadotecnia o publicitaria &bull; Prospeccion 
        comercial.
<br><br>
        En caso que no desee que sus datos personales sean tratados paraa estos fines secundarios, desde este momento usted nos puede comunicar lo anterior 
        a traves del siguiente mecanismo: Sus datos podran ser proporcionados a terceros limitativamente refiriendo a fabricantes y/o a provedores de Reactoor 
        ADS S.A. de C.V, que mantengan una relación lícita y ética de negocios para efectos de marketing, siempre con las limitaciones señaladas en la Ley Federal 
        de Protección de Datos Personales en Posesión de Particulares.
<br><br>
        En caso de que usted desee acceder, rectificar sus datos, hacer ejercicio de sus derechos ARCO, solicitar información acerca del tratamiento de sus 
        datos y/o de los procedimientos para el ejercicio de los derechos previamente mencionados y/o ser removido de la base de datos de <b>https://reactorads.com/mx/</b>
        , podrá en cualquier momento (a menos que se encuentre en alguno de los supuestos establecidos en el articulo 26 de la Ley aplicable), solicitar la baja de sus datos 
        mediante correo electronico a <b>contacto@reactorads.com</b> o por escrito en nuestra sucursal. La negativa para el uso de sus datos personales para estas 
        finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros.
<br><br>
<center>
Acepto que mis datos sean recabados <input type="checkbox" name="aviso_privacidad" id="acept" onChange="aviso()" value="Aceptado" checked>
</center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"id="boton" class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>

    </form>
      </div>
    </div>
  </div>
</div>
    
<script type="text/javascript">
    function hideOrShowPassword() {
  var password1, password2, check;

  password1 = document.getElementById("pass");
  password2 = document.getElementById("pass2");
  check = document.getElementById("ver");

  if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
  {
    password1.type = "text";
    password2.type = "text";
    document.getElementById('icono').innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
  } else // Si no está activada 
  {
    password1.type = "password";
    password2.type = "password";
    document.getElementById('icono').innerHTML = '<i class="bi bi-eye-fill"></i>';
  }
}

function aviso() {
  var acept, boton, check;

  acept = document.getElementById("acept");
  boton = document.getElementById("boton");
  check = document.getElementById("acept");
  
  if (check.checked == false) // Si la checkbox de mostrar contraseña está activada
  {
    boton.disabled = true;

  } else // Si no está activada 
  {
    boton.disabled = false;
  }
}

</script>
<!-- Script Recaptcha -->
<script>
  function miFuncion(a) {
    var response = grecaptcha.getResponse();

    if(response.length == 0){
        alert("Captcha no verificado");
        return false;
      event.preventDefault();
    } else {
  
      return true;
    }
  }
</script>
    <!-- Scripts para Bootstrap -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script>
    <!-- Scripts Nuevos -->
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
</body>

</html>