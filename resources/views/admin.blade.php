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
<script type="text/javascript">
$(document).ready(function() {
  $("#nom").keyup(function(){
      var txtnom = $("#nom").val();
      var formato = /^[A-Za-z0-9\s\xF1\xD1]+$/;

      if (formato.test(txtnom)){
          $("#snom").text("");
          $("#nom").css({"border":"2px solid #0f0"}).fadeIn(2000);
          //$("#guarda").prop("disabled", false);
          $("#chek").prop("checked", false);
      }
      else{
          $("#snom").text("Este campo solo puede contener letras y numeros")
          $("#nom").css({"border":"2px solid red"}).fadeIn(2000);
          //$("#guarda").prop("disabled", true);
          $("#chek").prop("checked", true);
      }
  });

  $("#des").keyup(function(){
      var txtdes = $("#des").val();
      var formato = /^[A-Za-z0-9\-\.\,\s\xF1\xD1]+$/;

      if (formato.test(txtdes)){
          $("#sdes").text("");
          $("#des").css({"border":"2px solid #0f0"}).fadeIn(2000);
          //$("#guarda").prop("disabled", false);
      }
      else{
          $("#sdes").text("Este campo no puede contener caracteres especiales")
          $("#des").css({"border":"2px solid red"}).fadeIn(2000);
          //$("#guarda").prop("disabled", true);
      }
  });

  $("#pre").keyup(function(){
      var txtpre = $("#pre").val();
      var formato = /^[0-9\xF1\xD1]+$/;

      if (formato.test(txtpre)){
          $("#spre").text("");
          $("#pre").css({"border":"2px solid #0f0"}).fadeIn(2000);
          //$("#guarda").prop("disabled", false);
      }
      else{
          $("#spre").text("Este campo solo puede contener numeros")
          $("#pre").css({"border":"2px solid red"}).fadeIn(2000);
          //$("#guarda").prop("disabled", true);
      }
  });

  $("#chek").change(function(){
    var chek = $("#chek").prop();

    if(chek == checked){
        $("#guarda").prop("disabled", true);
    }

  });
      });
</script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="one">
    <div class="Container">
        <!--Inicio Barra de Navegacion-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <!-- Marca Navbar -->
            <a class="navbar-brand" href="index.html#Inicio"><img src="img/ads.jpg" width="120" height="60" alt=""
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
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Nuevo Producto/Servicio</a>
                    </li>
                    <li class="nav-item dropdown" style="position: relative; z-index: 2">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="position: relative; z-index: 1">Tablas</a>
                        <ul class="dropdown-menu">    
                            <li><a class="dropdown-item" href="">Usuarios</a></li>
                            <li><a class="dropdown-item" href="">Productos</a></li>
                        </ul>
                    </li>
                 
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
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

<form name="nombre" action="{{ route('admin') }}" method="GET" class="form-inline">
           {{ csrf_field() }}
           <div class="form-group mb-2">
           <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre"><br>
          </div>
          <div class="form-group mx-sm-3 mb-2">
           <select name="tipo" class="form-control">
               <option value="">Selecciona el tipo de producto</option>
               <option value="1">Producto</option>
               <option value="2">Servicio</option>
           </select><br>
          </div>
           <input type="submit" value="Buscar" class="btn btn-info btn-sm mb-2">
</form>

<table border="1" class="table table-light">
<thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Imagen 2</th> 
        <th scope="col">Imagen 3</th>
        <th scope="col">Imagen 4</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
    </tr>
</thead>
<tbody>
    @foreach($productos as $pro)
    <tr>
        <th scope="row">{{ $pro->id }}</th>
        <td width="140"><img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" alt="{{ $pro->foto }}" width="auto" height="auto"></td>
        <td width="140"><img src="{{ asset('archivos/' .$pro->foto2) }}" class="card-img-top img" alt="{{ $pro->foto2 }}" width="auto" height="auto"></td>
        <td width="140"><img src="{{ asset('archivos/' .$pro->foto3) }}" class="card-img-top img" alt="{{ $pro->foto3 }}" width="auto" height="auto"></td>
        <td width="140"><img src="{{ asset('archivos/' .$pro->foto4) }}" class="card-img-top img" alt="{{ $pro->foto4 }}" width="auto" height="auto"></td>
        <td>{{ $pro->nombre }}</td>
        <td>{{ $pro->descripcion }}</td>
        <td>${{ $pro->precio }}</td>
        <td><a class="btn btn-link"href="{{ route('editar',['id' => $pro->id]) }}" ><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
</svg></a></td>
        <td><a class="btn btn-link" href="{{ route('borrar',['id' => $pro->id]) }}" onclick="return confirm('Estás seguro que deseas eliminar la descripción?');"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
    </tr>
  
    @endforeach
</tbody>
</table>  

<a type="button" class="btn btn-success" href="{{ route('exportar') }}">Exportar Excel</a>
<a type="button" class="btn btn-danger" href="{{ route('pdf') }}">Exportar PDF</a>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
{{ $productos->links() }}
</ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto/Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nom">
    <small id="snom"></small>
    @if($errors->first('nombre'))<small class="text-danger">Se requiere este campo</small>@endif
  </div>
  <div class="form-group">
    <label>Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" id="des"></textarea>
    <small id="sdes"></small>
    @if($errors->first('descripcion'))<small class="text-danger">Se requiere este campo</small>@endif
  </div>
  <div class="form-group">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" id="pre">
    <small id="spre"></small>
    @if($errors->first('precio'))<small class="text-danger">Se requiere este campo</small>@endif
  </div>
  <label>Tipo</label>
  <div class="form-group">
  <select class="custom-select" id="inputGroupSelect01" name="id_tabla">
    <option value="" selected>Choose...</option>
    <option value="1">Producto</option>
    <option value="2">Servicio</option>
  </select>
      @if($errors->first('id_tabla'))<small class="text-danger">Seleccione una opción </small>@endif
</div>
<label>Imagen</label>
  <div class="form-group">
      <input type="file" name="foto" class="form-control" multiple>
      @if($errors->first('foto'))<small class="text-danger">Campo no llenado o formato de archivo incorrecto</small>@endif
</div>
<label>Imagen 2</label>
  <div class="form-group">
      <input type="file" name="foto2" class="form-control">
      @if($errors->first('foto2'))<small class="text-danger">Campo no llenado o formato de archivo incorrecto</small>@endif
</div>
<label>Imagen 3</label>
  <div class="form-group">
      <input type="file" name="foto3" class="form-control">
      @if($errors->first('foto3'))<small class="text-danger">Campo no llenado o formato de archivo incorrecto</small>@endif
</div>
<label>Imagen 4</label>
  <div class="form-group">
      <input type="file" name="foto4" class="form-control">
      @if($errors->first('foto4'))<small class="text-danger">Campo no llenado o formato de archivo incorrecto</small>@endif
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary" id="guarda">Guardar cambios</button>
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