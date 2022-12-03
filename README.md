# Bienvenido al Repositorio de Axel Palacios Peña
####Instalacion del proyecto final (CRUD con LOGIN)

Requisitos para la ejecucion correcta del proyecto en su computadora.

1.- Deberas contar con XAMPP  ya que esta ayudara con los modulos de Apache y MYSQL que son esenciales para el proyecto, adjunto el link para su descarga utilizando la version 8.1.12.
**https://www.apachefriends.org/es/index.html**
2.- Contar con COMPOSER en tu sistema para la ejecucion del proyecto.
3.- Contar con GIT instalado en nuestros sistemas esto para poder usar los comandos para clonar el proyecto, adjunto el link para su descarga(NO IMPORTA LA VERSION).
**https://git-scm.com/**
4.- Contar con algún marco de trabajo como Visual Studio Code o Sublime Text.
5.- Descargar la BD que se encuentra dentro del repositorio en la carpeta **BASE DE DATOS** con el nombre **paginaads.sql**
6.- Tener instalado algun gestor de Base de datos como SQLyog o en el mismo XAMPP.

######Una vez cumplidos los requisitos anteriores  estaremos listos para la clonacion y ejecucion del proyecto.
- 1  Entraremos al repositorio donde clonarenos el proyecto, esto haciendo clic en la parte superior derechar que dice **CODE** , daremos en la parte de HTTPS y copiaremos el LINK.

- 2  Una vez copiado el LINK del repositorio, iremos a nuestro cmd y nos ubicaremos en la carpeta de ** xampp/htdocs ** y digitaremos el siguiente comando.

>git clone (INGRESAR EL LINK DEL REPOSITORIO)

- 3 Dependiendo de nuestra conexion a internet y nuestro equipo a algunos puede tardarles más que a otros. 

- 4 Terminada la clonación del proyecto a nuestros equipos abriremos **VISUAL STUDIO CODE** y nos ubicaremos en la carpeta donde clonamos el archivo **(xampp/htdocs/nameproject)** o bien en la misma terminal podremos entrar a la carpeta digitando **cd (nameproject)**  y una vez dentro poniendo **code .**

- 5 Antes de iniciar el proyecto es necesario iniciar los servicios de **XAMPP** los cuales son  el de **APACHE Y MySQL** estos dos servicios deberan estar prendidos todo el tiempo mientras se este ejecutando el proyecto.

- 6 Una vez activado XAMPP procederemos a abrir SQLyog e importaremos nuestra base de datos que se encuentra en la carpeta **BaseDeDatos**.

> Una vez dentro de SQLyog navegaremos a la pestaña **DATABASE** y dentro de ella a la opcion **IMPORT*** y  EXECUTE SQL Script, se nos desplegara una ventana que nos pedira la ruta para importar la BD del proyecto **xampp/htdocs/nameproject/BaseDeDatos/BD**

- 7  Terminada la importacion de la BD del proyecto, actualizaremos SQLyog para que nos aparezca. 

- 8 Una vez arriba la BD de datos regresaremos a  **VISUAL STUDIO CODE** y abriremos el archivo **.env**

> Una vez dentro del archivo **.env** nos ubicaremos en la linea **14** con el texto **DB_DATABASE=** dentro de esa linea pondremos el nombre de la base de datos que importamos quedando de la siguiente manera **DB_DATABASE=(nombre de la base)**

- 9 Concluidos estos pasos de forma satisfactoria toca iniciar el servidor de LARAVEL

- 10 Usando el comando (este levantara el servidor para visualizar el proyecto)
> **php artisan serve

- 11 Una vez ejecutado el comando nos lanzara una  direccion local 

> [Fri Dec 2 23:11:26] PHP 8.1.12 Development server (RUTA o Link para la visualizacion del archivo).

-  12 Si entramos directo a 127.0.0.1:8000 nos aparecera una ventana de 404 NOT FUND no se preocupen  solo con agregar /home este funcionara quedando de la siguiente manera.
> **127.0.0.1:8000/home**

- 13  Listo nuestro proyecto quedara listo para iniciar sesion y registrarnos dentro de nuestro sitio web.
