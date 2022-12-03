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
            <a class="navbar-brand" href="index.html#Inicio"><img src="img/logoads.jpg" width="120" height="60" alt=""
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
                        <a class="nav-link" href="{{ route('home2') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home2#Nosotros')}}">Nosotros</a>
                    </li> 
                    <!-- Desplegable --> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">Servicios</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="{{ route('productos2') }}">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('home2#contact')}}">Ayuda y Comentarios</a>
                    </li>
                   
                </ul>
                <ul class="navbar-nav ml-auto">
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
<br>
<br>
<br>
<br>
<br>
<!------------------ mensaje -------------------->
@if (session('status'))
<div class="alert alert-info alert-dismissible fade show content position-fixed" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 10px;">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!------------------ tarjetas ---------------------->
<div class="container-fluid">
  <div class="row">

  
@foreach($prod as $pro)
@if($pro->id_tabla == 2)
<div class="col-sm-3 text-center">
<div class="card shadow mb-3 bg-white rounded">
<div class="objetfitcover">
<img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}">
</div>
  <div class="card-body">
    <b>{{ $pro->nombre }}</b><br>
    {{ $pro->descripcion }}<br>
    <b>${{ $pro->precio }}</b>
  </div>
  <div class="card-footer text-muted" align="center">
     <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2" data-whatever="{{ $pro->nombre}}"  data-whatever2="{{ asset('archivos/' .$pro->foto) }}" data-whatever3="{{ $pro->descripcion }}" data-whatever4="{{ $pro->id }}" data-whatever5="{{$pro->precio}}" data-whatever6="{{ asset('archivos/' .$pro->foto2) }}"  data-whatever7="{{ asset('archivos/' .$pro->foto3) }}"  data-whatever8="{{ asset('archivos/' .$pro->foto4) }}">Adquirir</button>
  </div>
</div>
</div>
@else
@endif
@endforeach
</div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
{{ $prod->links() }}
</ul>
</nav>
<!--------------------- Modal -------------------------->

<div class="modal fade" id="exampleModal2" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contratar</h5>
        <button type="button" class="close" data-dismiss="modal" id="cerrar" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 400px;">
      <form name="guardar" action="{{ route('adquirir2') }}" method="post" enctype='multipart/form-data'>
            {{ csrf_field() }}
        <div class="row">
        <div class="col-md-7 align-self-center"> 
        <center>
        <div id="carrusel" class="carousel" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" id="pausa">
    <img id="imagen" class="img-fluid zoom" style="max-height: 380px;"/>
    </div>
    <div class="carousel-item">
    <img id="imagen2" class="img-fluid zoom" style="max-height: 380px;"/>
    </div>
    <div class="carousel-item">
    <img id="imagen3" class="img-fluid zoom" style="max-height: 380px;"/>
    </div>
      <div class="carousel-item">
    <img id="imagen4" class="img-fluid zoom" style="max-height: 380px;"/>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" id="back"> 
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" id="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </center>
        </div>
        <div class="col-md-5">    
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripción:</label>
            <div id="descripcion"></div>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio:</label><br>
            <div id="precio"></div>
             <input type="hidden" name="preciooriginal" class="form-control" id="precio2">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="text" name="cantidad" class="form-control" id="cantidad" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio Total:</label><br>
            <b><div id="total"></div></b>
          </div>
         
            <input type="hidden" name="id_usuario" value="{{$usu1->id}}" class="form-control align-self-center mr-3">
            <input type="hidden" id="id" name="id_producto" class="form-control align-self-center mr-3">
          
        </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar2">Cerrar</button>
        <button type="submit" class="btn btn-primary">Adquirir</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
             const $input1 = document.querySelector("#cantidad");
        const patron1 = /[0-9]+/;

        $input1.addEventListener("keydown", event => {
            if(patron1.test(event.key)) {
                document.getElementById('cantidad').style.border = "";
            }
            else{
                if(event.keyCode==8){
                    //console.log("backspace"); <-  Indica cuando se emple un sapacion en blanco
                }
                else{
                    event.preventDefault();
                    //var tlca = event.KeyCode;    <- Captura la tecla presionada
                    //consolo.log(tcla);           <- Muestra la tecla presionada 
                }
            }

        });
</script>
<script type="text/javascript">
    $('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var recipient2 = button.data('whatever2')
  var recipient3 = button.data('whatever3')
  var recipient4 = button.data('whatever4')
  var recipient5 = button.data('whatever5')
  var recipient6 = button.data('whatever6')
  var recipient7 = button.data('whatever7')
  var recipient8 = button.data('whatever8')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('#nombre').val(recipient)
  modal.find('#id').val(recipient4)
  modal.find('#precio').text("$" + recipient5)
  modal.find('#precio2').val(recipient5)
  modal.find('#imagen').attr('src',recipient2)
  modal.find('#imagen2').attr('src',recipient6)
  modal.find('#imagen3').attr('src',recipient7)
  modal.find('#imagen4').attr('src',recipient8)
  modal.find('#descripcion').text(recipient3)
  modal.find('.modal-title').text(recipient)
});

$("#cantidad").keyup(function(){
     
        var txtprecio = $("#precio2").val();
        var txtcantidad = $("#cantidad").val();
        if(txtcantidad == 0){
          $("#total").text("$" + 0);
        }else{
        var total = parseFloat(txtprecio) * parseFloat(txtcantidad);
       
        $("#total").text("$" + total);}
    });

    $("#cerrar").click(function(){
   
       $("#cantidad").val("");
       $('#total').text("$")
     
 });

 $("#cerrar2").click(function(){
   
   $("#cantidad").val("");
   $('#total').text("$")
 
});

$('#pausa').focus(function(){
$('.carousel').carousel('pause')
});

$('#next').click(function(){
$('.carousel').carousel('next')
});

$('#back').click(function(){
$('.carousel').carousel('prev')
});

 
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