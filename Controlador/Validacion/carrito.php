<?php
session_start();
define("KEY_TOKEN", "APR.WQC-354*");
define("MONEDA", "S/.");

if (isset($_POST['id_planes'])) {
    $id = $_POST['id_planes'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    
    if ($token_tmp == $token) {
        // Verificar e inicializar la variable de sesión
        if (!isset($_SESSION['carrito']['planes'])) {
            $_SESSION['carrito']['planes'] = array();
        }

        if (isset($_SESSION['carrito']['planes'][$id])) {
            $_SESSION['carrito']['planes'][$id] += 1;
        } else {
            $_SESSION['carrito']['planes'][$id] = 1;
        }

        $datos['numero'] = count($_SESSION['carrito']['planes']);
        $datos['ok'] = true;
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);
?>
