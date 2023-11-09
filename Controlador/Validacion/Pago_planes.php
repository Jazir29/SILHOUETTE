<?php
require_once 'conexion_be.php';

// Procesar el formulario de pago
$tarjeta = isset($_POST["NumeroTarjeta"]) ? $_POST["NumeroTarjeta"] : "";
$fecha = isset($_POST["FechaExpiracion"]) ? $_POST["FechaExpiracion"] : "";
$cvv = isset($_POST["CCV"]) ? $_POST["CCV"] : "";

// Insertar los detalles de pago en la base de datos
$validar_tarjeta= mysqli_query($conexion, "SELECT * FROM Visa WHERE (NumeroTarjeta='$tarjeta' || FechaExpiracion ='$fecha' || CCV='$cvv'");
$validar_tarjeta= mysqli_query($conexion, "SELECT * FROM PayPal WHERE (NumeroTarjeta='$tarjeta' || FechaExpiracion ='$fecha' || CCV='$cvv'");

if (mysqli_num_rows($validar_tarjeta) > 0) {
    echo "Pago realizado exitosamente";
    exit();
} else {
    echo '
    <script>
        alert("Verifique los datos de la trajeta introducida");
        window.location="../../Vista/User/Pago_planes.html";
    </script>
    ';
    exit();
}
?>