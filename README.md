## ⚠️ Antes de comenzar ⚠️
Importante aclarar que no es una página web real, es un proyecto creado para el módulo de Desarrollo web en Entorno Servidor de segundo de ciclo de Desarrollo de aplicaciones web.

# Game Play - Tienda de Videojuegos
Este proyecto va sobre una web para comprar videojuegos. En el cuál, sus principales funciones serán crear, leer, actualizar y borrar datos (CRUD).

## 📸 Página principal
![Index](/public/build/img/index.png)

## Como iniciarlo
Antes de intentar ejecutarlo hay que ir a la carpeta `/data/bbdd.sql` para coger la base de datos del proyecto. Para poder usar el proyecto de manera local hay que ir instalar la base de datos, en mi caso por ejemplo trabajé utilizando el xampp/mariaDB.

Para poder ver el funcionamiento del proyecto, hay que ir a la carpeta public y abrir en terminal el `index.php`, dentro de la terminal se ejecuta el comando `php -S localhost:3000`, nos va a dar una ruta la cual hay que abrir en el navegador, dicha ruta imprimirá `pagina no encontrada`, para poder ver el index del proyecto, al final de la url hay que poner `/index`;

## Uso de la aplicación
### Usuario sin cuenta
El usuario que aún no tenga cuenta o no haya hecho login con sus datos solo podrá visualizar la página principal para ver un poco las carácteristicas que ofrece la web, si quiere acceder a todas las funcionalidades tiene que tener una cuenta activa y estar logueado.

### 👤Usuario con cuenta
Un usuario ya con cuenta y logueado tiene varias funcionalidades:
* Puede añadir juegos al carrito, en la parte superior hay varios enlaces que dividen los juegos en venta (cada página de una consola distinta), en cada página se muestra un juego, su valoración, su nombre, su precio y justo debajo el botón de añadir al carrito.
* Una vez tenga elementos en el carrito, puede sumar y restar cantidades y borrar elementos.
* Puede editar y borrar su propio perfil

### 👤Administrador
El administrador ya tiene su cuenta creada por defecto, puede ver el index 'común' de la página, a parte tiene su propio apartado en el que puede realizar las siguientes funcionalidad:

* Tiene su propio index.
* A la izquierda del index, en el header tiene un botón `perfil` que le permite ver los datos de su usuario.

* En el index tiene un botón `crear consolas`, el cuál le redirige a un formulario donde inserta nuevas consolas.
* En el index tiene un botón `crear juegos`, el cuál le redirige a un formulario donde inserta nuevas juegos.

* En el index tiene un botón `ver juego (nombre juego)`, el cuál le redirige a otra página donde puede ver los datos de ese juego, cada juego a su lado tiene dos botones, uno redirige a otra página donde puede editar los datos del juego y otro para poder eliminar el juego.
* En el index tiene un botón `ver consolas`, el cuál le redirige a otra página donde puede ver los datos de las consolas,cada una tiene dos botones a su lado dos botones, uno redirige a otra página donde puede editar el nombre de la consola y otro para poder eliminarla.
* En el index tiene un botón `ver usuarios`, el cuál le redirige a otra página donde puede ver los datos de todos los usuarios con ceunta (excepto la contraseña)

## 🪛Tecnologías
Para llevar a cabo la realización de este proyecto, he utilizado:
* HTML
* CSS
* Tailwind
* PHP
* JavaScript
* JQuery
* Ajax
* PDO
* Xampp
* Github

## Autora
Sara Marrero Miranda
