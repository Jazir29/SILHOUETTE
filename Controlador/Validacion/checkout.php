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

    <script src="https://www.paypal.com/sdk/js?client-id=AeyL4-yGGfFekC9-ISuX9PXBcanhkyieycEbqPJ1qxoIlQ1H3vQxwgF5UN5UwHG1NLu6gB9BwVbylV6x 
    currency=USD"></script>
    
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
    <main>
        </br></br></br><br><br><br><br><br>
        <div class="conteiner">
            <div class="table_responsive">
                <table class="table">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr>
                            <th>PLANES</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD DE MESES</th>
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
                            $total = 0;
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
                                    <td><?php echo MONEDA . $precio; ?></td>
                                    <td>
                                        <input type="number" min="1" max="12" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $id_planes; ?>" onchange="actualizaCantidad(this.value,<?php echo $id_planes; ?>)">
                                    </td>
                                    <td>
                                        <div id="subtotal<?php echo $id_planes; ?>" name="subtotal[]">
                                            <?php echo MONEDA . number_format($subtotal, 2); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $id_planes; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            } // Fin del foreach
                            ?>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2) ?></p>
                            </td>
                        <?php
                        } // Fin del else
                        ?>
                    </tbody>
                </table>
            </div>
            <?php if ($lista_carrito !== null) { ?>
                <div class="row">
                    <div class="col-md-5 offset-md-6 d-grid gap-2">
                        <a href="pago.php" class="btn btn-primary btn-lg">Realizar Pago</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaModalLabel">Alerta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Deseas eliminar este plan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<style>
        .table {
            width: 100%;
            overflow-x: auto;
        }

        .table thead th {
            white-space: nowrap;
        }
    </style>

 <!-- PAYPAL -->
 <div id="paypal-button-container"></div>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        style: {
            color:  'blue',
            shape:  'pill',
            label:  'pay',
            height: 40
        },
        
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return fetch('/demo/checkout/api/paypal/order/create/', {
                method: 'post'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                method: 'post'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you

                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }

    }).render('#paypal-button-container');
</script>


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


<script>
function addPlanes(id, token){
    let url = '../../Controlador/Validacion/carrito.php'
    let formData = new FormData()
    formData.append('id_planes', id)
    formData.append('token', token)

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors',
    }).then(response => response.json())
    .then(data => {
        if (data.ok) {
            let elemento = document.getElementById("num_cart");
            elemento.innerHTML = data.numero;
        }
    })
}
  
</script>

<script>
    let eliminaModal = document.getElementById('eliminaModal');
eliminaModal.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget;
    let id = button.getAttribute('data-bs-id');
    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
    buttonElimina.setAttribute('data-bs-id', id); // Asignamos el valor de 'id' al atributo 'data-bs-id' del botón eliminar
});


function actualizaCantidad(cantidad, id) {
    let url = '../../Controlador/Validacion/actualizar_carrito.php';
    let formData = new FormData();
    formData.append('action', 'agregar');
    formData.append('id_planes', id);
    formData.append('cantidad', cantidad);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors',
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            let divsubtotal = document.getElementById('subtotal' + id);
            divsubtotal.innerHTML = data.sub;

            // Recalcular el total del carrito
            let total = 0.00;
            let list = document.getElementsByName('subtotal[]');

            for (let i = 0; i < list.length; i++) {
                let subtotal = parseFloat(list[i].innerHTML.replace(/[^\d.,]/g, '').replace(',', '.'));
                total += subtotal;
            }

            total = new Intl.NumberFormat('es-PE', {
                style: 'currency',
                currency: 'PEN',
                minimumFractionDigits: 2
            }).format(total);

            console.log('Total:', total); // Imprimir el valor del total en la consola

            document.getElementById('total').innerHTML = total;
        }
    })
    .catch(error => console.error('Error:', error));
}

function eliminar() {
    let botonElimina = document.getElementById('btn-elimina');
    let id = botonElimina.getAttribute('data-bs-id'); // Obtenemos el valor de 'id' desde el atributo 'data-bs-id'

    let url = '../../Controlador/Validacion/actualizar_carrito.php';
    let formData = new FormData();
    formData.append('action', 'eliminar');
    formData.append('id_planes', id);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors',
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>


</body>

</html>