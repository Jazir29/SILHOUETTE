<?php
require_once "../../Vista/config/database.php";
require_once "../../Vista/config/config.php";
//Instancia
$db = new Database();
$con = $db -> conectar();

$sql = $con ->prepare("SELECT id_planes, nombre, precio, descripcion FROM planes WHERE activo=1");
$sql -> execute();
$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);

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

    <section class="seccion_titulo">
        <article class="texto_titulo">
            <h1 class="titulo">ELIGE EL MEJOR PLAN PARA TI</h1>
            <p class="eslogan">Únete a nuestra familia</p>
        </article>
    </section>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row){?>
                <div class="col">
                    <div class="card shadow-sm">
                    <?php 
                    $id= $row['id_planes'];
                    $imagen = "../../Controlador/IMAGENES/" . $id . "/principal.jpg"
                    ?>
                        <img src="<?php echo $imagen; ?>">
                        <div class="card-body">
                            <h2 input class="subtitulo"><?php echo $row['nombre']; ?></h2>
                            <h2 input class="costo"><sup>S/</sup><?php echo $row['precio']; ?></h2>
                            <p input class="parrafo"><?php echo $row['descripcion']; ?></p><br></br>

                            <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
        <a href="Detalles.php?id_planes=<?php echo $row['id_planes']; 
        ?>&token=<?php echo hash_hmac('sha1', $row['id_planes'], KEY_TOKEN); ?>"
         class="btn btn-primary">Detalles</a>
    </div>
    <button class="btn btn-outline-success" type="button" onclick="addPlanes(<?php echo $row['id_planes']; ?>, 
     '<?php echo hash_hmac('sha1', $row['id_planes'], KEY_TOKEN); ?>')">Agregar al carrito</button>
</div>

                        </div>
                    </div>
                </div>
                <?php }?>
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
    <script>
    
    function addPlanes(id, token) {
    let url = '../../Controlador/Validacion/carrito.php';
    let formData = new FormData();
    formData.append('id_planes', id);
    formData.append('token', token);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors',
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Verificar la respuesta del servidor
        if (data.ok) {
            let elemento = document.getElementById("num_cart");
            elemento.innerHTML = data.numero;
        }
    })
    .catch(error => console.error('Error:', error));
}


    
    </script>
</body>

</html>