<?php
session_start();

if(isset($_SESSION['auth']))
{
    
    $_SESSION['message'] = "Tu ya estas registrado";
    header("Location: index.php");
    exit(0); 
}

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php
                include('message.php');
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Registrate</h4>
                    </div>
                    <div class="card-body">
                    <form action="registercode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Nombre</label>
                            <input required type="text" name="fname" placeholder="Ingresar Nombre" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Apellido</label>
                            <input required type="text" name="lname" placeholder="Ingresar Apellido" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Correo</label>
                            <input required type="email" name="email" placeholder="Ingresar Correo Electronico" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Contraseña</label>
                            <input required type="password" name="password" placeholder="Ingresar Contraseña" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirmar Contraseña</label>
                            <input required type="password" name="cpassword" placeholder="Confirmar Contraseña" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                           <button type= "submit" name="register_btn" class="btn btn-primary">Acceder</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php')
?>