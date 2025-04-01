## Introducción
El proyecto esta realizado en Laravel 11 con php 8.1.10 y MariaDB 10.4.13

## Inicialización
Clonar el proyecto o extraerlo.
Ingresar a la carpeta tascon
<code>cd tascon</code>
<br/>
Crear un archivo .env a partir del archivo .env.example configurando la parte relativa a la conexión a la base de datos.
<br />
Una vez en la carpeta ejecutar los sigueintes comandos:
<br />
<code>php artisan key:generate</code>
<br/>
<code>php arstisan migrate</code>
<br />
Cuando pregunte la consola, teclear si para crear la base de datos.
<br />
<code>php artisan db:seed</code>
<br />
<coce>php artisan serve -o</code>
<br />
Una vez inicializado el proyecto ingresar a la siguiente ruta
<a href="http://localhost:8000/tasks">http://localhost:8000/tasks</a>

## Uso a través de API
El sistema esta preparado para interconectarse con otras aplicaciones a través de una API.
Para hacer uso de esta api, se puede realizar desde POSTMAN, las rutas son las siguientes
<code>GET http://localhost:8000/api/v10/tasks</code>
<code>GET http://localhost:8000/api/v10/tasks/{id}</code>
<code>POST http://localhost:8000/api/v10/tasks</code>
<code>POST|PUT http://localhost:8000/api/v10/tasks/{id}</code>
<code>DELETE http://localhost:8000/api/v10/tasks/{id}</code>
