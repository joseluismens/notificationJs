<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo base_url();?>public/notification.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body>

<?php 

$id = $datos[0]['id'];
$description = $datos[0]['description'];
$estado = $datos[0]['estado'];




?>
	<div class="card  mx-auto mt-4 col-md-6">
		<div class="card-header">
			<h2 class="card-text">Ingresar ticket</h2>
		</div>
		<div class="card-body">
			
			<form id="form" method="POST"  action="<?php echo base_url().'/actualizar' ?>" >
			<input type="text" id="id" name="id" hidden="" 
             value="<?php echo  $id ?>">
			<label for="description">Descripción</label>
			<input type="text" name="description" class="form-control"   value="<?php echo $description ?>">
			
			<label for="estado ">Estado</label>
			<input type="number" name="estado" class="form-control"   value="<?php echo $estado ?>">
			<br>
			<input type="submit" id="update" value="Actualizar" class="btn btn-primary">
			</form>
			
		</div>
		
	</div>	


	<script>
		$(document).ready(function(){
			function notifyMe() {
 					 // Let's check if the browser supports notifications
				if (!("Notification" in window)) {
					alert("This browser does not support desktop notification");
				}

				// Let's check whether notification permissions have already been granted
				else if (Notification.permission === "granted") {
					// If it's okay let's create a notification
					
					var notification = new Notification("Hi there!");
					setTimeout(() => {
							notification.close()
						}, 2000);
				}

				// Otherwise, we need to ask the user for permission
				else if (Notification.permission !== "denied") {
					Notification.requestPermission().then(function (permission) {
					// If the user accepts, let's create a notification
					if (permission === "granted") {
						var notification = new Notification("Hi there!");
						setTimeout(() => {
							notification.close()
						}, 1000);
					}
					});
  				}
				
			}
			notifyMe();
			var ac= $("#form").attr('action');
			var id=$("#id").val();
			$("#update").click(function(){
				var url=ac;
				$.ajax({
					type:"POST",
					url:ac,
					data: $("#form").serialize(),
					
					
					
						
					
				}).done(function(data){
						var text = "Ticket con el id : "+id;
    					var notification= new Notification('Se ha actualizado un ticket',{body:text});
					});
			
				
			});
		});
	</script>
</body>

</html>
