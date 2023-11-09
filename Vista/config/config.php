<?php
session_start();
define("CLIENT_ID", "AeyL4-yGGfFekC9-ISuX9PXBcanhkyieycEbqPJ1qxoIlQ1H3vQxwgF5UN5UwHG1NLu6gB9BwVbylV6x");
define("CURRENCY", "USD");
define("KEY_TOKEN", "APR.WQC-354*");
define("MONEDA", "S/ ");

$num_cart=0;
if (isset($_SESSION['carrito']['planes'])) {
    $num_cart = count($_SESSION['carrito']['planes']);
}
?>