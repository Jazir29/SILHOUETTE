<?php
session_start();



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

                    <form action="logincode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Correo</label>
                            <input type="email" name="email" placeholder="Ingresar Correo Electronico" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="password" placeholder="Ingresar Contraseña" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                           <button type= "submit" name="login_btn" class="btn btn-primary">Acceder</button>
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