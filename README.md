# g2Unaf
Proyecto de G2 Accesorios 
- PHP
- MySQL
- HTML/CSS
- JavaScript

Clonar el repositorio:

A continuación, proporciona instrucciones sobre cómo clonar el repositorio en la máquina local.

## Clonar el Repositorio

Para empezar, clona este repositorio en tu máquina local:

```bash
git clone https://github.com/nicog2112/g2Unaf.git

## Configuración del entorno:
Si tu proyecto utiliza XAMPP para ejecutar PHP y MySQL localmente, asegúrate de que XAMPP esté instalado y en funcionamiento. También es importante que tengas MySQL configurado en XAMPP.

## Importar la Base de Datos

1. Inicia XAMPP y asegúrate de que Apache y MySQL estén en funcionamiento.

2. Abre un navegador web y visita http://localhost/phpmyadmin/.

3. Inicia sesión en phpMyAdmin con tu usuario y contraseña.

4. Crea una nueva base de datos llamada `g2Accesorios`.

5. En la pestaña "Importar", selecciona el archivo SQL de la base de datos proporcionado en el repositorio (puede estar en una carpeta como `database`).

6. Haz clic en "Ejecutar" para importar la base de datos a tu servidor MySQL local.

## Ejecutar el Proyecto

1. Abre la carpeta del proyecto en tu editor de código favorito.

2. Configura la conexión a la base de datos en tu archivo PHP (por ejemplo, `config.php`) utilizando las credenciales correctas.

```php
$host = 'localhost';
$usuario = 'tu_usuario_mysql';
$contraseña = 'tu_contraseña_mysql';
$base_de_datos = 'g2Accesorios';
