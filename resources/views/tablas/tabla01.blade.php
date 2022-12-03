<style>
    #borde{
        border-style: solid;
        border-color: black; 
        font-family: arial;
    }

    #borde2{
        border-bottom: solid;

    }
</style>

<table id="borde">
    <tr>
        <th colspan="8" id="borde2">Reactor ADS <img src="https://reactor-ads.com/img/ads.jpg" height="15" alt="logo"></th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Imagen 2</th>
        <th>Imagen 3</th>
        <th>Imagen 4</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
    </tr>

    @foreach($prod as $pro)
    <tr>
        <th scope="row">{{ $pro->id }}</th>
        <td width="55"><img src="{{ asset('archivos/' .$pro->foto) }}" width="50" alt="{{ $pro->foto }}"></td>
        <td width="55"><img src="{{ asset('archivos/' .$pro->foto2) }}" width="50" alt="{{ $pro->foto2 }}"></td>
        <td width="55"><img src="{{ asset('archivos/' .$pro->foto3) }}" width="50" alt="{{ $pro->foto3 }}"></td>
        <td width="55"><img src="{{ asset('archivos/' .$pro->foto4) }}" width="50" alt="{{ $pro->foto4 }}"></td>
        <td>{{ $pro->nombre }}</td>
        <td>{{ $pro->descripcion }}</td>
        <td>${{ $pro->precio }}</td>
    </tr>
    @endforeach
</table>  
