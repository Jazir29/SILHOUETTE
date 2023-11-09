<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/conexion_be.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Planes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">SILHOUETTE GYM</li>
            <li class="breadcrumb-item">DETALLES</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                     <h4>Registros de Planes
                     <a href="register-add.php" class="btn btn-primary float-end"> Cambiar Plan</a> 
                     </h4>
                    </div>
                <div class="card-body">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>		
					<th>Detalles</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>

			</thead>
			<tbody>
				<tr>
					<td>Plan Comun</td>
					<td>$/ 59.90</td>
					<td>Maquinaria + Acceso a las duchas + Acceso al sauna + Acceso a las clases de zumba</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
				<tr>
					<td>Plan Premium</td>
					<td>$/ 79.90</td>
					<td>Plan Comun + Entrenador + Plan nutricional </td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
                <tr>
					<td>Plan Vip</td>
					<td>$/ 99.90</td>
					<td>Plan VIP + Personal crossfit + Acceso a las clases de full body + Acceso a las sillas de masaje</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
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