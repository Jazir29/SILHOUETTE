<?php
include('includes/header.php');
include('includes/navbar.php');
include('config/conexion_be.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tienda/Productos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">SILHOUETTE GYM</li>
            <li class="breadcrumb-item">DETALLES</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                     <h4>Registros de los productos
                     <a href="register-add.php" class="btn btn-primary float-end"> Cambiar Plan</a> 
                     </h4>
                    </div>
                <div class="card-body">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>		
					<th>Cantidad</th>
                    <th>Imagen de Referencia</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>

			</thead>
			<tbody>
				<tr>
					<td>POLO NEGROS</td>
					<td>$/ 70.00</td>
					<td>30</td>
                    <td>Futura Imagen</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
				<tr>
					<td>SHORT AZUL HOMBRES</td>
					<td>$/ 55.00</td>
					<td>40</td>
                    <td>Futura Imagen</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
                <tr>
					<td>PANTALON GRIS HOMBRE</td>
					<td>$/ 85.00</td>
					<td>26</td>
                    <td>Futura Imagen</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
                <tr>
					<td>LYCRA MUJER</td>
					<td>$/ 75.00</td>
					<td>11</td>
                    <td>Futura Imagen</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
                <tr>
					<td>POLO BLANCO</td>
					<td>$/ 70.00</td>
					<td>15</td>
                    <td>Futura Imagen</td>
					<td><a class="btn btn-success">Editar</a></td>
					<td><button type="button" class="btn btn-danger">Borrar</button></td>
				</tr>
                <tr>
					<td>GORRA BLANCA</td>
					<td>$/ 60.00</td>
					<td>26</td>
                    <td>Futura Imagen</td>
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