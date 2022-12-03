<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prod as $pro)
        <tr>
            <td>{{$pro->nombre}}</td>
            <td>{{$pro->descripcion}}</td>
            <td>{{$pro->precio}}</td>
        </tr>
        @endforeach
    </tbody>
</table>