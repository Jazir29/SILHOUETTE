<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/dbcon.php');
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Hola</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Fuciona Porfavor</li>
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
                $users = "SELECT * FROM users where id='$user_id' ";
                $users_run = mysqli_query($con,$users);

                if(mysqli_num_rows($users_run)> 0)
                {
                  foreach($users_run as $user )
                  {

                  ?>

  


                <form action="code.php" method="POST">
                  <input type="text" name = "user_id" value="<?= $user['id']?>">
                  <div class="row">

                    <div class="col-md-6 mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="fname" value="<?=$user['fname'];?>" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="lname" value="<?=$user['lname'];?>"  class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Correo</label>
                    <input type="text" name="email" value="<?=$user['email'];?>" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Contraseña</label>
                    <input type="text" name="password" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Estado</label>
                    <input type="checkbox" name="status" <?=$user['status']== '1' ? 'checked':''?>  width:"70px" height="70px" />
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