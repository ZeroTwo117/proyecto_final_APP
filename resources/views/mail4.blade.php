<!DOCTYPE html>
<html lang="es">
<header>
       <title>Laravel - Mail</title>
       <meta charset="UTF-8">
       <meta name="title" content="Laravel.DSM">
       <meta name="description" content="Descripcion del correo">
       
</header>

<body>
<center>
<h1 style="font-family: sans-serif;">{{ $ejemplo }}</h1>
</center>
<div style="background: linear-gradient(to right, #6072c4, #0516fac0); margin-right: auto; margin-left: auto; margin-top: auto; width: auto; font-family: sans-serif; padding: 10px;">
<center>
<img width="100" src="https://reactorads.com/img/reactor-ads-logo-1622658598.jpg"><br><br>
</center>
<div style="background-color: white; margin-right: auto; margin-left: auto; width: auto; font-family: sans-serif; padding: 5px;">
<p>Hola ({{ $email }}) se ha eliminado tu cuenta de Reactor ADS de forma exitosa. </p>
<p>:(.<p> 
<hr>
<b>Redes Sociales:</b>
<table>
<tr>
<td><a href="https://m.facebook.com/reactorads/?tsid=0.12083137296877267&source=result" target="_blank"><img width="30" src="https://emprodemy.com/wp-content/uploads/2019/06/icono-facebook-negro.png"></a></td><td><a href="https://m.facebook.com/reactorads/?tsid=0.12083137296877267&source=result" target="_blank">Facebook</a></td>
</tr>
</table>
</div>
</div>
</body>
</html>