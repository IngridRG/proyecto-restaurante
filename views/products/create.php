<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Crear producto</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<?php include("../partials/header.php") ?>
	  	<main>
			<form class="">
				<input type="text" id="name" placeholder="Nombre del producto">
				<input type="number" id="price" placeholder="Precio del producto">
				<textarea id="description" placeholder="Descripcion del producto"></textarea>
				<button type="button" name="button" onclick="create();">Registrar</button>
			</form>
		</main>

		<script type="text/javascript">
			function create() {
				var xhr = new XMLHttpRequest();
				var url = 'http://localhost/mvc-php-master/controllers/ProductsController.php';
				xhr.open('POST', url, true);

				var data = new FormData();

				var name = document.querySelector("#name").value;
				var price = document.querySelector("#price").value;
				var description = document.querySelector("#description").value;

				data.append('nombre', name);
				data.append('precio', price);
				data.append('descripcion', description);
				data.append('action', 'create');

				xhr.addEventListener('loadend', function() {
					console.log("Petición realizada");
					alert(xhr.responseText);
				});
				xhr.send(data);
			}

	  	</script>
	  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	  	<script src="../js/bootstrap.min.js"></script>
	</body>
</html>

<!-- 

<input type="">
var file = document.querySelector("#file").files[0];
data.append("file", file);


TAMAÑO DEL ARCHIVO
if($_FILES['file']['size'] < 1048576) 
		   NOMBRE 		 	  TAMAÑO
		  DEL ARCHIVO

OBTENER NOMBRE DE ARCHIVO
$ext = pathinf


VALIDAR EXTENSION
if($ext=='jpg' || $ext=='png')


 
-->