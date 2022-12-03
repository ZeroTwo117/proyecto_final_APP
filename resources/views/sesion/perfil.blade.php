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
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },5000);
});
</script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="one">
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: relative;">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link btn btn-link" href="{{route('home2')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-link" href="{{'home2#Nosotros'}}">Nosotros</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-link" data-toggle="dropdown" href="#" style="position: relative; z-index: 1">Servicios</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="{{ route('servicios2')}}">Servicios</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos2') }}">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-link" href="{{'home2#contact'}}">Ayuda y Comentarios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-link" data-toggle="dropdown" href="#" style="position: relative; z-index: 1">Más</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal2">Eliminar mi cuenta</a></li>
                        </ul>
                    </li>
                 
                </ul>

<!-- Alerta de envio de formulario -->

@if (session('status'))

  <div class="alert alert-success alert-dismissible fade show content" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 80px;">
  <strong>{{session('status')}}{{$usu1->nombre . ' ' . $usu1->app}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@if (session('status3'))

  <div class="alert alert-info alert-dismissible fade show content" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 80px;">
  <strong>{{session('status3')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@if (session('status2'))

  <div class="alert alert-warning alert-dismissible fade show content" role="alert" style="position: absolute; width: auto; height: 50px; z-index: 20; right: 80px;">
  <strong>{{session('status2')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-link" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<br>
<br>
<br>
<br>


<div align="center"><h2 class="text-light bg-dark">Mis Productos/Servicios</h2></div><br>


<!------------------ tarjetas ---------------------->
<div class="container-fluid">
  <div class="row">

@foreach($ventas as $ven)
@foreach($prod as $pro)
@if($ven->id_producto == $pro->id)
@if($ven->adquirido != 'si')
<div class="col-sm-3 text-center">
<div class="card shadow mb-3 bg-white rounded">
<div class="objetfitcover">
<img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}" data-toggle="modal" data-target="#exampleModal"  data-whatever2="{{ asset('archivos/' .$pro->foto) }}" data-toggle="tooltip" data-placement="top">
</div>
  <div class="card-body">
    <b>{{ $pro->nombre }}</b><br>
    {{ $pro->descripcion }}<br>
    <b>Cantidad:</b> {{ $ven->cantidad }}<br>
    <b>Total: ${{ $ven->precio }}</b>
  </div>
  <div class="card-footer text-muted" align="center">
     <a type="button" class="btn btn-link" href="{{ route('borrar2',['id' => $ven->id]) }}" onclick="return confirm('¿Estas seguro de que deseas eliminar este producto de Mis Productos?');">Eliminar</a>
     <a type="button" class="btn btn-link" href="{{ route('pagar',['id' => $ven->precio, 'desc' => $pro->nombre, 'id2' => $ven->id]) }}">Comprar</a>
    </div>
</div>
</div>
@endif
@endif
@endforeach
@endforeach

</div>
</div>
<!---------------- Productos Comprados ------------------>
<br>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Productos Adquiridos
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       
      <div class="container-fluid">
  <div class="row">

@foreach($ventas as $ven)
@foreach($prod as $pro)
@if($ven->id_producto == $pro->id)

@if($ven->adquirido == 'si')

<div class="col-sm-3 text-center text-white">
<div class="card shadow mb-3 bg-dark rounded">
<div class="objetfitcover">
<img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}" data-toggle="modal" data-target="#exampleModal"  data-whatever2="{{ asset('archivos/' .$pro->foto) }}" data-toggle="tooltip" data-placement="top">

</div>
  <div class="card-body">
    <b>{{ $pro->nombre }}</b><br>
    {{ $pro->descripcion }}<br>
    <b>Cantidad:</b> {{ $ven->cantidad }}<br>
    <b>Total: ${{ $ven->precio }}</b>
  </div>
</div>
</div>
@endif

@endif
@endforeach
@endforeach

</div>
</div>
      
      </div>
    </div>
  </div>
</div>
<!-------------------- Modal Eliminar Cuenta de Usuario --------------------->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="borrar" action="{{ route('eliminarcuenta',['id' => $usu1->id]) }}" method="POST">
      {{ csrf_field() }}
      <div class="modal-body">
        ¿Estas seguro que quieres eliminar tu cuenta? Esta acción no podra revertirse.
        <input type="hidden" name="email" value="{{ $usu1->email }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Continuar</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-------------------- Modal Eliminar producto --------------------->

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estas seguro que quieres eliminar este producto de "Mis Productos"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a type="submit" id="id" href="" class="btn btn-primary">Continuar</a>
      </div>
    </div>
  </div>
</div>

 <!-- Scripts para Bootstrap -->

 <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script>
    <!-- Scripts Nuevos -->
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>