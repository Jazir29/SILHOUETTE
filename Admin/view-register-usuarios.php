<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/conexion_be.php');
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">USUARIOS</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">SILHOUETTE GYM</li>
            <li class="breadcrumb-item">DETALLES</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
            <?php include('message.php'); ?>
             <div class="card">
                <div class="card-header">
                     <h4>Registros de Usuarios
                    
                     </h4>
                    </div>
                <div class="card-body">
                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOMBRE</th>
                                                <th>USUARIO</th>
                                                <th>CORREO</th>
                                                <th>EDITAR</th>
                                                <th>BORRAR</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM usuarios";
                                            $query_run = mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['nombre_completo']; ?></td>
                                                    <td><?= $row['usuario']; ?></td>
                                                    <td><?= $row['correo']; ?></td>
                                                    <td><a href="register-edit-usuario.php?id=<?= $row['id'];?>" class="btn btn-success">Editar</a></td>
                                                    
                                                    <form action="code-usuario.php" method="POST">
                                                    <td><button type="submit" name="user_delete" value="<?=$row['id'];?>" class="btn btn-danger">Borrar</button></td>
                                                    </form>
                                                     </tr>

                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                            ?>
                                                    <tr>
                                                        <td coldspan="6">No encontrado</td>
                                                    </tr>
                                            
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
               </div>   
             </div> 
          </div>   
        </div>   
</div>   
                        
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>