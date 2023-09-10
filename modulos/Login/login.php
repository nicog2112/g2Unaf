<?php 
$mensaje = "";
if (isset($_GET["validacion"])) {
    // code...
    switch ($_GET["validacion"]) {

        case 'true':
            $mensaje = "<div class='correcto'>"."¡Su registro se proceso correctamente! Puede iniciar sesion en el apartado Login"."</div>";
            break;
        case 'false':
            $mensaje = "<div class='error'>"."¡Ups ha ocurrido un error!"."</div>";
            break;
        case '2':
            $mensaje = "<div class='error'>"."¡Ups se encontro mas de un usuario con esos datos!"."</div>";
            break;
        case '1':
            $mensaje = "<div class='error'>"."¡Ups el usuario o contraseña son incorrectos!"."</div>";
            break;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro/Inicio Sesion</title>
        <link rel="stylesheet" href="css/stye.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>
    <body> 
           <div class="main">
           <?php echo $mensaje; ?>	  
            <input type="checkbox" id="chk" aria-hidden="true" checked="true">
                <div class="signup">
                    <form  method="POST" action="registrar.php">
                        <label for="chk" aria-hidden="true">Registro</label>
                        <input type="text" name="usuario" placeholder="Usuario" required="">
                        <input type="email" name="correo" placeholder="Correo" required="">
                        <input type="password" name="contraseña" placeholder="Contraseña" required="">
                        <button  type="submit">Registrarse</button>
                    </form>
                </div>

                <div class="login">
                    <form  method="POST" action="iniciar_sesion.php">
                        <label for="chk" aria-hidden="true">Login</label>
                        <input type="text" name="usuario" placeholder="Usuario" required="">
                        <input type="password" name="contraseña" placeholder="Contraseña" required="">
                        <button type="submit">Iniciar Sesion</button>
                        <!-- <input type="submit" value="Agregar" class="btn-bootstrap" > -->
                    </form>
                </div>
        </div>
    </body>
</html>