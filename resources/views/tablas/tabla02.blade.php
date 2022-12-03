<table>
    <thead>
        <tr>
            <th colspan="8">Reactor ADS</th>
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
    </thead>
    <tbody>
        @foreach($prod as $pro)
        <tr>
            <th scope="row">{{ $pro->id }}</th>
            <td>{{ $pro->foto }}</td>
            <td>{{ $pro->foto2 }}</td>
            <td>{{ $pro->foto3 }}</td>
            <td>{{ $pro->foto4 }}</td>
            <td>{{ $pro->nombre }}</td>
            <td>{{ $pro->descripcion }}</td>
            <td>${{ $pro->precio }}</td>
        </tr>
        @endforeach
    </tbody>
</table>  
