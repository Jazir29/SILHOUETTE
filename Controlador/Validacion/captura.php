<?php
date_default_timezone_set('America/Lima');
require_once "../../Vista/config/database.php";
require_once "../../Vista/config/config.php";

// Instancia
$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

if (is_array($datos)) {
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha)); // Convertir la fecha a formato de MySQL
    $name = $datos['detalles']['payer']['name']['given_name']; // Acceso al nombre
    $lastname = $datos['detalles']['payer']['name']['surname']; // Acceso al apellido
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, name, lastname, email, id_cliente, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $name, $lastname, $email, $id_cliente, $total]);

    $id = $con->lastInsertId();

    if ($id > 0) {
        $planes = isset($_SESSION['carrito']['planes']) ? $_SESSION['carrito']['planes'] : null;
    
        if ($planes != null) {
            foreach ($planes as $clave => $cantidad) {
                $sql = $con->prepare("SELECT id_planes, nombre, precio, descripcion FROM planes WHERE id_planes=? AND activo=1");
                $sql->execute([$clave]);
                $row_pla = $sql->fetch(PDO::FETCH_ASSOC);
    
                $precio = $row_pla['precio'];
    
                // Insertamos la fecha en detalle_compra junto con los otros datos
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_planes, nombre, fecha, precio, cantidad) VALUES (?, ?, ?, ?, ?, ?)");
                $sql_insert->execute([$id, $clave, $row_pla['nombre'], $fecha_nueva, $precio, $cantidad]);
            }
            include 'enviar_email.php';
        } 
        unset($_SESSION['carrito']);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener detalles de PayPal desde el cuerpo de la solicitud POST
    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);

    if (is_array($datos)) {
        // ... (código para obtener los datos del pago desde $datos)

        // Configurar los detalles del correo electrónico
        $destinatario = "estebancone060302@gmail.com";
        $asunto = "Detalles de la compra en PayPal";
        $cuerpo = "Hola,\n\nEste es un correo de ejemplo enviado automáticamente desde PayPal.\n\nPuedes personalizar el contenido del correo aquí.";

        // Configurar los datos para enviar a formsubmit.co
        $formData = array(
            '_subject' => $asunto,
            'message' => $cuerpo,
            '_autoresponse' => "Correo enviado automáticamente desde PayPal"
        );

        // Enviar la solicitud POST a formsubmit.co utilizando cURL
        $ch = curl_init('https://formsubmit.co/estebancone060302@gmail.com');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Verificar la respuesta
        if ($response === false) {
            // Error al enviar el correo
            echo "Error al enviar el correo.";
        } else {
            // Correo enviado correctamente
            echo "Correo enviado correctamente.";
        }

        // Redireccionar a la página completado.php
        header("Location: completado.php");
        exit;
    }
} else {
    // Si se accede directamente a captura.php sin una solicitud POST, redireccionar a otra página o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>
