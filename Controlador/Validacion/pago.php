<?php
require_once "../../Vista/config/database.php";
require_once "../../Vista/config/config.php";

// Instancia
$db = new Database();
$con = $db->conectar();

$planes = isset($_SESSION['carrito']['planes']) ? $_SESSION['carrito']['planes'] : null;

$lista_carrito = array();
$num_cart = isset($_SESSION['num_cart']) ? $_SESSION['num_cart'] : 0;

if ($planes != null) {
    foreach ($planes as $clave => $cantidad) {
        $sql = $con->prepare("SELECT id_planes, nombre, precio, descripcion, $cantidad AS cantidad 
        FROM planes WHERE id_planes=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../Controlador/CSS/Planes.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/887a83504.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/Controlador/IMAGENES/icono1.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-zWbq3GqEJ13xjtC+Wh9gI7RQD92RkJL7Hw2Mfl6U8D6gIj14TetJv0sLeY9ZojE1C0m4FwO1uW7y8o3jdzVpEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SILHOUETTE GYM</title>

    <script
        async>(function (w, d) { var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.setAttribute("src", "https://app.bluecaribu.com/conversion/integration/0e65d7d5a070ab97b7ad1ffd489a20d0"); h.appendChild(s); })(window, document);</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-zWbq3GqEJ13xjtC+Wh9gI7RQD92RkJL7Hw2Mfl6U8D6gIj14TetJv0sLeY9ZojE1C0m4FwO1uW7y8o3jdzVpEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Insertando Bibliotecas Externas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../../Controlador/JS/script.js"></script>
</head>

<body>
    <!--Barra de navegación-->

    <div class="menu_arriba">
      <h1 class="nom_gym">SILHOUETTE <span class="txtRojo">GYM</span></h1>
      <ul class="imagen1">
        <img src="/Controlador/img.menu/icono1.svg">
      </ul>
      <nav id="nav">
        <a href="./Index.html" onclick="seleccionar()">Inicio</a>
        <a href="./Nosotros.html" onclick="seleccionar()">Nosotros</a>
        <a href="./Planes.php" onclick="seleccionar()">Planes</a>
        <a href="./Tienda.html" onclick="seleccionar()">Tienda</a>
        <a href="./Entrenadores.html" onclick="seleccionar()">Entrenadores</a>
      </nav>

      <a class="nav-link itemText" id="sesionLink" href="#">
        <i class="fas" id="sesionIcon"></i>
      </a>

      <a class="usuario"><span id="nombre-usuario"></span></a>
      <a href="../../Controlador/Validacion/checkout.php" class="btn btn-primary">Carrito
        <span id= "num_cart" class="badge bg_secondary"> <?php echo $num_cart;   ?></span>
      </a>

      <!-- Icono del menu responsive -->
      <div class="nav-responsive" id="icono-nav" onclick="mostrarOcultarMenu()">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>


    <!--Contenido-->
    <main></br></br></br><br><br><br><br><br>
    <div class="conteiner">
        <div class="row">
            <div class="col-6">
                <h4>DETALLES DE PAGO</h4>
                <div id="paypal-button-container"></div>
            </div>

        <div class="col-6">
            <div class="table_responsive">
                <table class="table">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr>
                            <th>PLANES</th>
                            <th>SUBTOTAL</th>
                            <th> </th>
                        </tr>
                    </thead>

                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        <?php
                        if ($lista_carrito == null) {
                            echo '<tr><td colspan="3" class="text_center"><b>Lista vacía</b></td></tr>';
                        } else {

                            $total=0;
                            foreach ($lista_carrito as $planes) {
                                $id_planes = $planes['id_planes'];
                                $nombre = $planes['nombre'];
                                $precio = $planes['precio'];
                                $cantidad = $planes['cantidad'];
                                $subtotal = $cantidad * $precio;
                                $total += $subtotal;
                        ?>
                                <tr>
                                    <!-- Datos de cada plan en el carrito -->
                                    <td><?php echo $nombre; ?></td>
                                    <td>
                                        <div id="subtotal<?php echo $id_planes; ?>" name="subtotal[]">
                                            <?php echo MONEDA . number_format($subtotal, 2); ?>
                                        </div>
                                    </td>
                                </tr>
                        <?php }?>
                            <td colspan="2">
                                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,2)?></p>
                        </td>
                    </tbody>
                    <?php }?>
                </table>
            </div>
        </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<script>
        // Realizar una solicitud AJAX al archivo PHP que obtiene el nombre de usuario
        // Asegúrate de ajustar la ruta del archivo PHP según tu estructura de archivos
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.logged_in && response.nombre) {
                    var nombreUsuario = document.getElementById('nombre-usuario');
                    nombreUsuario.textContent = 'Usuario: ' + response.nombre;
                }
            }
        };
        xhttp.open('GET', '/Controlador/Validacion/check_login.php', true);
        xhttp.send();
    </script>
    <script src="../../Controlador/JS/app.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID;?>&currency=USD"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount:{
                            value:<?php echo $total;?>
                        }
                    }]
                })
            },

            onApprove: function(data, actions){
                let URL = 'captura.php'
                actions.order.capture().then(function(detalles){
                    console.log(detalles)

                    let url='captura.php'

                    return fetch(url,{
                        method: 'POST',
                        headers: {
                            'content-type' : 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function(response) {
                        window.location.href="completado.php";
                    })
                });
            },

            onCancel: function(data){
                alert("Pago Cancelado")
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>