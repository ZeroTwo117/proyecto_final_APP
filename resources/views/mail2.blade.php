<!DOCTYPE html>
<html lang="es">
<header>
       <title>Laravel - Mail</title>
       <meta charset="UTF-8">
       <meta name="title" content="Laravel.DSM">
       <meta name="description" content="Descripcion del correo">
       
</header>

<body>
<table><tr><td>
<img width="100" src="https://reactorads.com/img/reactor-ads-logo-1622658598.jpg"></td>
<td><h1>{{ $ejemplo }}</h1></td></tr></table> 
<br>
<p>Hola <b>{{ $usu1->nombre }}</b> da click en el siguiente link para cambiar tu contraseña.</p>
<br>
<a type="button" class="btn btn-link" href="{{ route('newpassword',['id' => $usu1->id]) }}" target="_blank">Cambiar Contraseña</a>
<br>

</body>
</html>