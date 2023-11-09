<?php
// Esta función inicia o reanuda una sesión existente. Permite almacenar y acceder a variables de sesión.
session_start();

// Destruir la sesión
session_destroy();

// Registrar mensaje de error si ocurre alguno
error_log("Sesión cerrada correctamente");

// Redireccionar a la página de inicio de sesión
header("Location: /Vista/User/Registro-Login.html");
exit();
?>
