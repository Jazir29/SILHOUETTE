<?php
require_once "../../Modelo/Conexion/conexion_admi.php";

// Obtener los valores del formulario
$usuario_ad = isset($_POST["usuario_ad"]) ? $_POST["usuario_ad"] : "";
$contrasena_ad = md5(isset($_POST["contrasena_ad"]) ? $_POST["contrasena_ad"] : "");
$validar_login_ad = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario_ad='$usuario_ad' and contrasena_ad ='$contrasena_ad'");

if (mysqli_num_rows($validar_login_ad) > 0) {
    header("location: ../../Vista/Home/index2.html");
    exit();
} else {
    echo '
    <script>
        alert("Usuario no existe, por favor verifique los datos introducidos");
        window.location="../../Vista/User/Login_admi.html";
    </script>
    ';
    exit();
}
?>