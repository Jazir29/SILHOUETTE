<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/conexion_be.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Entrenadores</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">SILHOUETTE GYM</li>
            <li class="breadcrumb-item">DETALLES</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                     <h4>Registros de Entrenadores
                     <a href="register-add.php" class="btn btn-primary float-end"> Agregar Nuevo entrenador</a> 
                     </h4>
                    </div>
                <div class="card-body">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>		
					<th>Especialidad</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>

			</thead>
			<tbody>
				<tr>
					<td>Juan de Dios</td>
					<td>De las casas</td>
					<td>Pesas y piernas</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-success">Borrar</button></td>
				</tr>
				<tr>
					<td>Luis Martin</td>
					<td>Castro éreda</td>
					<td>Abdominales y brazos</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-success">Borrar</button></td>
				</tr>
                <tr>
					<td>Luisa Fernanda</td>
					<td>Castillo Zeta</td>
					<td>Boxeo y Cardio</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-success">Borrar</button></td>
				</tr>

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