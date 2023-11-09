<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/dbcon.php');
?>
<!-- Codigo para la estructura de agregar Administardor -->

<div class="container-fluid px-4">
    <h1 class="mt-4">Administrador</h1>
        <div class="row mt-4">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                     <h4>Agregar Administrador
                        <a href="view-register.php" class="btn btn-danger float-end" >Volver</a>
                     </h4>
                </div>
                <div class="card-body">
                    
                <form action="code.php" method="POST">
                    
                  <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="fname"  class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="lname"   class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Correo</label>
                    <input type="text" name="email" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Contraseña</label>
                    <input type="text" name="password" class="form-control">
                    </div> 

                    <div class="col-md-6 mb-3">
                    <label for="">Estado</label>
                    <input type="checkbox" name="status" width:"70px" height="70px" />
                    </div> 

                    <div class="col-md-12 mb-3">
                    <button type="submit" name="add_user" class= "btn btn-primary">Agregar Administrador</button>
                    </div> 

                  </div>

                </form> 

                </div>   
             </div> 
          </div>   
        </div>   
</div>   
                        
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>