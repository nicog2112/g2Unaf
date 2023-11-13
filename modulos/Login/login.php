<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/styleLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();

                var usuario = $("#usuario").val();
                var contrasenia = $("#contrasenia").val();

                var data = {
                    usuario: usuario,
                    contrasenia: contrasenia,
                };

                // Realizar la solicitud AJAX para verificar la autenticación
                $.ajax({
                    type: "POST",
                    url: "iniciar_sesion.php",
                    data: data,
                    success: function(response) {
                        if (response === "success") {
                            $("#mensajeSuccess").html("Inicio de Sesión Exitoso!");
                            $("#mensajeSuccess").show(); // Mostrar mensaje de éxito
                            $("#mensajeError").hide(); // Ocultar mensaje de error
                            window.location.href = "../../Inicio.php";
                        } else {
                            $("#mensajeError").html("Usuario o contraseña incorrectos.");
                            $("#mensajeError").show(); // Mostrar mensaje de error
                            $("#mensajeSuccess").hide(); // Ocultar mensaje de éxito
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="main">
        <label>Iniciar Sesión</label>
        <div class="login">
            <div class='correcto' id="mensajeSuccess"></div>
            <div class='error' id="mensajeError"></div>
            <form id="loginForm">
                <div class='divForm'>
                    <input class='primerInput' type="text" name="usuario" id="usuario" placeholder="Usuario" required>
                    <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña" required>
                    <button type="submit">Iniciar Sesión</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>