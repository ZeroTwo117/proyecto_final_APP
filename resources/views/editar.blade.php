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

<!-------------- Expiración de CSS -------------->
<link rel="stylesheet" href="/public/Estilos.css?v=<?php echo(rand(1,500)); ?>" />
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="one">
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
                        <a class="nav-link" href="{{route('admin')}}">Inicio</a>
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
<br>

<div class="container col-md-5"> 
<div class="card shadow mb-5 bg-white rounded">
  <div class="card-header">
    <b>Editar Producto/Servicio</b>
  </div>
  <div class="card-body">  
<form action="{{ route('guardar_edicion',['id'=>$pro->id]) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ $pro->nombre }}">
  </div>
  <div class="form-group">
    <label>Descripción</label>
    <textarea type="text" class="form-control" name="descripcion">{{ $pro->descripcion }}</textarea>
  </div>
  <div class="form-group">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ $pro->precio }}">
  </div>
  <label>Tipo</label>
  <div class="input-group mb-3">
  <select class="custom-select" id="inputGroupSelect01" name="id_tabla">
    @if($pro->id_tabla == 1)
    <option value="1">Producto</option>
    <option value="2">Servicio</option>
    @else
    <option value="2">Servicio</option>
    <option value="1">Producto</option>
    @endif
  </select>
</div>
<label>Imagen</label>
  <div class="input-group mb-3">
  <div class="custom-file">
  <input type="file" name="foto" nullable>
  <input type="text" name="foto22" value="{{ $pro->foto }}">
  </div>
</div>
<label>Imagen</label>
  <div class="input-group mb-3">
  <div class="custom-file">
  <input type="file" name="foto2" nullable>
  <input type="text" name="foto23" value="{{ $pro->foto2 }}">
  </div>
</div>
<label>Imagen</label>
  <div class="input-group mb-3">
  <div class="custom-file">
  <input type="file" name="foto3" nullable>
  <input type="text" name="foto24" value="{{ $pro->foto3 }}">
  </div>
</div>
<label>Imagen</label>
  <div class="input-group mb-3">
  <div class="custom-file">
  <input type="file" name="foto4" nullable>
  <input type="text" name="foto25" value="{{ $pro->foto4 }}">
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
     </form>
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