
<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();

$conex=mysqli_connect("localhost","root","","g2Accesorios");
$consulta="SELECT * FROM Usuarios where username='$usuario' and password='$contraseña'";

$resultado=mysqli_query($conex,$consulta);

$neta=mysqli_num_rows($resultado);

if($neta == 1)
{ 
    header("location: ../../Inicio.php");
}else
if($neta == 2){ 
    header("location: login.php?validacion=2");
}
else{
    ?>
    <?php
     header("location: login.php?validacion=1");
    
}
mysqli_free_result($resultado);
mysqli_close($conex);