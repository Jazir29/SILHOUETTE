<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "../../Modelo/Conexion/conexion_be.php";

// Obtener los valores del formulario
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contrasena = md5(isset($_POST["contrasena"]) ? $_POST["contrasena"] : "");
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena ='$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    // Inicio de sesión exitoso, almacenar información en la variable de sesión
    $_SESSION['usuario_iniciado'] = true;
    $_SESSION['usuario'] = $usuario;
    header("location: ../../Vista/Home/Index.html");
    exit();
} else {
    echo '
    <script>
        alert("Usuario no existe, por favor verifique los datos introducidos");
        window.location="../../Vista/User/Registro-Login.html";
    </script>
    ';
    exit();
}
?>
