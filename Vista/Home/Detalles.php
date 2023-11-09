<?php
require_once "../../Vista/config/database.php";
require_once "../../Vista/config/config.php";

// Instancia
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id_planes']) ? $_GET['id_planes'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    
    if ($token_tmp==$token) {
        // El token coincide, continuar con el resto del código
        $sql = $con->prepare("SELECT count(id_planes) FROM planes WHERE id_planes=? AND activo=1");
        $sql->execute([$id]);

        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT nombre, descripcion, precio, detalles FROM planes WHERE id_planes=? AND activo=1 ");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $detalles = $row['detalles'];
            $dir_images='../../Controlador/IMAGENES/' . $id . '/';
            $rutaImg = $dir_images . 'principal.jpg';

            $imagenes=array();
            $dir = dir($dir_images);

            while(($archivo=$dir->read()) != false){
                if($archivo != 'princiapl.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
                    $imagenes[]= $dir_images . $archivo;
                }
            }
            $dir->close();

        } else {
            echo "No se encontró ningún plan con el ID proporcionado.";
            exit();
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
}
?>


<!-- Resto del código HTML -->



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

    <header class="cabezera" id="inicio">
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

      <div class="redes">
        <a href="https://www.facebook.com/profile.php?id=100091614803805">
          <i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://twitter.com/SILHOUETTE_GYM">
          <i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.instagram.com/silhouette_gym01/">
          <i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/51981486877"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.tiktok.com/@silhouette_gym01?is_from_webapp=1&sender_device=pc">
          <i class="fa-brands fa-tiktok"></i></a>
      </div>
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
  </header>

    <seccion class="seccion_titulo">
        <article class="texto_titulo">
            <h1 class="titulo">ELIGE EL MEJOR PLAN PARA TI</h1>
            <p class="eslogan">Únete a nuestra familia</p>
        </article>
    </seccion>

    

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src = "<?php echo $rutaImg?>" class="d-block w-100">
                            </div>

                            <?php foreach($imagenes as $img) {?>

                            <div class="carousel-item ">
                                <img src = "<?php echo $img?>" class="d-block w-100">
                            </div>
                            <?php } ?>



                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <h1> <?php echo $nombre; ?> </h1>
                    <h2> <?php echo MONEDA . $precio; ?> </h2>
                    <p>
                    <?php echo $descripcion; ?> <br></br>
                    <p> Detalles del <?php echo $nombre; ?></p>
                    <?php echo $detalles; ?> 
                    </p>
                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-primary" type="button">Comprar ahora</button>
                        <button class="btn btn-outline-primary" type="button" onclick="addPlanes(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>

                    </div>
                </div>
            </div>
        </div>
            
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

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
        console.log(data); // Verificar la respuesta del servidor
        if (data.ok) {
            let elemento = document.getElementById("num_cart");
            elemento.innerHTML = data.numero;
        }
    })
}

    
    </script>

</body>

</html>