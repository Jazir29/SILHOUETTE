<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/conexion_be.php');
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Panel de Control</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">SILHOUETTE GYM</li>
            <li class="breadcrumb-item">USUARIOS</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                     <h4>Editar usuario</h4>
                </div>
                <div class="card-body">

                <?php
                if(isset($_GET['id']))
                {

                $user_id = $_GET['id'];
                $users = "SELECT * FROM usuarios where id='$user_id' ";
                $users_run = mysqli_query($con,$users);

                if(mysqli_num_rows($users_run)> 0)
                {
                  foreach($users_run as $user )
                  {

                  ?>
                <form action="code-usuario.php" method="POST">
                  <input type="text" name = "user_id" value="<?= $user['id']?>">
                  <div class="row">

                    <div class="col-md-6 mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_completo" value="<?=$user['nombre_completo'];?>" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" value="<?=$user['usuario'];?>"  class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Correo</label>
                    <input type="text" name="correo" value="<?=$user['correo'];?>" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Contraseña</label>
                    <input type="text" name="contrasena" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <button type="submit" name="update_user" class= "btn btn-primary" > Actualizar </button>
                    </div> 

                  </div>

                </form> 

                <?php
                  }
                }
                else
                {
                  ?>
                  <h4> No encontrado</h4>
                  <?php
                }
                
              }

                ?>
                </div>   
             </div> 
          </div>   
        </div>   
</div>   
                        
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>