<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title> 
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        font: Arial;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
       
    </style>
    </head>
    <body>
        {{$today}}
        <hr>
<table>
    <tr>
    <td width="160"><img src="img/ads.jpg" width="120" height="60" alt=""></td><td><h1>Factura de Producto</h1></td>
    </tr>
</table>
        <hr>
        <div class="contenido">
           
        @foreach($prod as $pro)
    <table>
        <tr>
            <td width="300"><b>Imagen:</b></td>
            <td><img src="{{ asset('archivos/' .$pro->foto) }}" class="card-img-top img" width="200" alt="{{ $pro->foto }}"></td>
        </tr>
        <tr>
            <td><b>Nombre Cliente:</b></td>
            <td>{{ $usu1->nombre}} {{ $usu1->app}}</td>
        </tr>
        <tr>
            <td><b>Producto/Servicio:</b></td>
            <td>{{ $pro->nombre }}</td>
        </tr>
        <tr>
            <td><b>Descripción:</b></td>
            <td>{{ $pro->descripcion }}</td>
        </tr>
        <tr>
            <td><b>Cantidad:</b></td>
            <td>{{ $ven->cantidad }}</td>
        </tr>
        <tr>
            <td><b>Precio:</b></td>
            <td>${{ $ven->precio}}</td>
        </tr>
    </table>
    
    @endforeach

       </div>
    </body>
</html>