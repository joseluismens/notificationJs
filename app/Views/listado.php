<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo base_url();?>public/notification.js" ></script>

</head>
<body>
		
		<div class="card mx-auto mt-4 col-md-6">
			<div class="card-header">
				<h2 class="card-text">Listado de tickets</h2>
			</div>
			<div class="card-body">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>#</th>
								<th>Descripcion</th>
								<th>estado</th>
								<th>Actualizar</th>
                                <th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($datos as $key): ?>


						<tr>
							<td><?php echo $key->id; ?></td>
							<td><?php echo $key->description; ?></td>
							<td><?php echo $key->estado; ?></td>
                            <td> <a href="<?php echo base_url().'/ticket/'.$key->id ?>" class="btn btn-warning btn-sm">Editar</a></td>
                            <td> <a id="delete" href="<?php echo base_url().'/eliminar/'.$key->id ?>" class="btn btn-danger btn-sm">Eliminar</a></td>

						</tr>	

                        <?php endforeach; ?>
						</tbody>

					</table>
			</div>
		</div>
    	<div class="card  mx-auto mt-4 col-md-6">
		<div class="card-header">
			<h2 class="card-text">Ingresar ticket</h2>
		</div>
		<div class="card-body">
			<form  method="POST" action="<?php  echo base_url().'/crear'?>" >
			<label for="description">Descripción</label>
			<input type="text" name="description" class="form-control">
			
			<label for="estado ">Estado</label>
			<input type="number" name="estado" class="form-control">
			<br>
			<input type="submit" value="Enviar" class="btn btn-primary">
			</form>
			
		</div>    
  
</body>


</html>
