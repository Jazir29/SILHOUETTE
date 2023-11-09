<?php
$host = "localhost"; // Nombre del host de la base de datos
$user = "root"; // Nombre de usuario de la base de datos
$password = "paola200604"; // Contraseña de la base de datos
$dbname = "admi_db"; // Nombre de la base de datos
$port = '3306'; //Puerto de la Base de Datos

// Crear una conexión a la base de datos
$conexion = mysqli_connect($host, $user, $password, $dbname, $port);

// Verificar si la conexión a la base de datos se estableció correctamente
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>