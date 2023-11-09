<?php
require_once "../../Vista/config/database.php";
//Instancia
$db = new Database();
$con = $db -> conectar();

$sql = $con ->prepare("SELECT id_planes, nombre, precio, descripcion FROM planes WHERE activo=1");
$sql -> execute();
$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Controlador/CSS/style.css">
    <script src="https://kit.fontawesome.com/887a83504.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/Controlador/IMAGENES/icono1.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
        async>(function (w, d) { var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.setAttribute("src", "https://app.bluecaribu.com/conversion/integration/0e65d7d5a070ab97b7ad1ffd489a20d0"); h.appendChild(s); })(window, document);</script>
    <title>SILHOUETTE GYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-zWbq3GqEJ13xjtC+Wh9gI7RQD92RkJL7Hw2Mfl6U8D6gIj14TetJv0sLeY9ZojE1C0m4FwO1uW7y8o3jdzVpEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Insertando Bibliotecas Externas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Insertando tu script personalizado -->
    <script src="../../Controlador/JS/script.js"></script>

</head>

<body>
    <div class="menu_arriba">
        <header>
            <h1 class="nom_gym">SILHOUETTE <span class="txtRojo">GYM</span></h1>
            <ul class="imagen1">
                <img src="/Controlador/img.menu/icono1.svg">
            </ul>
            <nav id="nav">
                <a href="./Index.html" onclick="seleccionar()">inicio</a>
                <a href="./Nosotros.html" onclick="seleccionar()">Nosotros</a>
                <a href="./index3.html" onclick="seleccionar()">Planes</a>
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
        
             <!-- Icono del menu responsive -->
             <div class="nav-responsive" id="icono-nav" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </header>
    </div>

    
    <seccion class="seccion_titulo">
        <article class="texto_titulo">
            <h1 class="titulo">ELIGE EL MEJOR PLAN PARA TI</h1>
            <p class="eslogan">Únete a nuestra familia</p>
        </article>
    </seccion>

    <main>
        <section class="planes_contenido">
            <div class="planes_texto"><br></br>
                <a class="pesas"><i class="fas fa-dumbbell"></i><i class="fas fa-weight-lifter"></i></a>
                <h2 input class="subtitulo"><?php echo $row['nombre']; ?></h2>
                <h2 input class="costo"><sup>S/</sup><?php echo $row['nombre']; ?></h2>
                <p input class="parrafo"><?php echo $row['nombre']; ?></p><br></br>

                <div id="conte_items_carrusel">
                    <div class="item_carrusel" id="item_carrusel-01">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono2.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-31">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-11">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-11">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono3.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-01">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-21">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-21">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono4.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-11">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-31">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-31">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono5.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-21">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-01">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="preguntas">
                    <a href="../../Vista/Home/Pago_planes.html"><button class="boton1">SELECCIONAR PLAN</button></a>
                    <ul class="depla1"><br></br>
                      <div class="contenedor-preguntas activo" data-categoria="metodos-pago">
                        <div class="contenedor-pregunta">
                          <p class="pregunta">Detalles del plan<img src="../../Controlador/img/bx-plus.svg" alt="Abrir Respuesta" /></p>
                          <ul class="respuesta">
                            <li>Maquinaria</li>
                            <li>Acceso a las duchas</li>
                            <li>Acceso al sauna</li>
                            <li>Acceso a las clases de zumba</li>
                          </ul>
                        </div>
                      </div>
                    </ul>
                  </div>
                  
                
            </div>
            </div><br></br>
            <div class="planes_texto"><br></br>
                <a class="pesas"><i class="fas fa-dumbbell"></i><i class="fas fa-weight-lifter"></i></a>
                <h2 class="subtitulo">PLAN VIP</h2>
                <h2 class="costo"> <sup>S/</sup>79.90</h2>
                <p class="parrafo">Por un mes</p><br></br>
                <div id="conte_items_carrusel">
                    <div class="item_carrusel" id="item_carrusel-12">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono2.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-18">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-13">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-13">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono3.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-12">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-14">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-14">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono4.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-13">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-15">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-15">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono5.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-14">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-16">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-16">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono6.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-15">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-17">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-17">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono7.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-16">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-18">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-18">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono8.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-17">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-12">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="preguntas">
                    <a href="../../Vista/Home/Pago_planes.html"><button class="boton2">SELECCIONAR PLAN</button></a>
                    <ul class="depla1"><br></br>
                      <div class="contenedor-preguntas activo" data-categoria="metodos-pago">
                        <div class="contenedor-pregunta">
                          <p class="pregunta">Detalles del plan<img src="../../Controlador/img/bx-plus.svg" alt="Abrir Respuesta" /></p>
                          <ul class="respuesta">
                            <li>Plan común</li>
                            <li>Entrenador</li>
                            <li>Plan nutricional</li>
                          </ul>
                        </div>
                      </div>
                    </ul>
                  </div>
            </div><br></br>
            <div class="planes_texto"><br></br>
                <a class="pesas"><i class="fas fa-dumbbell"></i><i class="fas fa-weight-lifter"></i></a>
                <h2 class="subtitulo">PLAN PREMIUM</h2>
                <h2 class="costo"><sup>S/</sup> 99.90</h2>
                <p class="parrafo">Por un mes</p><br></br>
                <div id="conte_items_carrusel">
                    <div class="item_carrusel" id="item_carrusel-0">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono2.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-8">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-1">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-1">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono3.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-0">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-2">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-2">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono4.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-1">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-3">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-3">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono5.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-2">
                                <img src="./IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-4">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-4">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono6.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-3">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-5">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-5">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono7.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-4">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-6">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-6">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono8.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-5">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-7">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-7">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono9.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-6">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-8">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>
                        </div>
                    </div>
                    <div class="item_carrusel" id="item_carrusel-8">
                        <div class="tarjeta_carrusel">
                            <img src="../../Controlador/IMAGENES/icono10.jpg">
                        </div>
                        <div class="flechas_carrusel">
                            <a href="#item_carrusel-7">
                                <img src="../../Controlador/IMAGENES/icono12.ico">
                            </a>
                            <a href="#item_carrusel-0">
                                <img src="../../Controlador/IMAGENES/icono11.ico">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="preguntas">
                    <a href="../../Vista/Home/Pago_planes.html"><button class="boton3">SELECCIONAR PLAN</button></a>
                    <ul class="depla1"><br></br>
                      <div class="contenedor-preguntas activo" data-categoria="metodos-pago">
                        <div class="contenedor-pregunta">
                          <p class="pregunta">Detalles del plan<img src="../../Controlador/img/bx-plus.svg" alt="Abrir Respuesta" /></p>
                          <ul class="respuesta">
                            <li>Plan VIP</li>
                            <li>Personal crossfit</li>
                            <li>Acceso a las clases de full body</li>
                            <li>Acceso a las sillas de masaje</li>
                          </ul>
                        </div>
                      </div>
                    </ul>
                  </div>
            </div><br></br>
        </section>
    </main>

    <script src="../../Controlador/JS/app.js"></script>

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
    <script src="../../Controlador/JS/planes_detalles.js"></script>
</body>

</html>