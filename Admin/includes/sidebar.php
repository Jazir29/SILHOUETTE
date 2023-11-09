<!-- Barra lateral de opciones del Intranet -->
<div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- Codigo para inicio (Panel de control/Administradores) -->
                            <div class="sb-sidenav-menu-heading">Inicio</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Panel de Control
                            </a>
                            <a class="nav-link" href="view-register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Administradores
                            </a>
                            <!-- Codigo para inicio (Falta implementarlo) -->
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Personas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view-register-entrenador.php">Entrenadores</a>
                                    <a class="nav-link" href="view-register-usuarios.php">Usuarios</a>
                                </nav>
                            </div>
                            <!-- Codigo para las ventas de miembros y pago -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link collapsed" href="view-register-planes.php" >Planes</a>
                                    <!-- Citas y reservaciones(Falta implementarlo) -->
                                    <a class="nav-link collapsed" href="view-register-tienda.php">Tienda </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Pagina 1</a>
                                            <a class="nav-link" href="404.html">Pagina 2</a>
                                            <a class="nav-link" href="500.html">Pagina 3</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Otros</div>
                            <!-- Notificaciones(Falta implementarlo) -->
                            <a class="nav-link" href="view-register-notificacion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Notificaciones
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <!-- Registrado por el nombre SILHOUETTE GYM (Marca de agua) -->
                        <div class="small">Conectado por</div>
                        SILHOUETTE GYM
                    </div>
                </nav>
            </div>