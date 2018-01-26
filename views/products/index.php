<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css"  crossorigin="anonymous">

  </head>
  <body>
	  <main>
	  	<button type="button" onclick="getProducts()">Hacer petición</button>
	  	<table id="product-list" class="table">
	  		<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Precio</th>
			      <th scope="col">Descripción</th>
			    </tr>
			</thead>
	  	</table>

	  </main>
	  	<script type="text/javascript">

	  		function getCategories(){ //Terminar
	  			var xhr = new XMLHttpRequest();
	  			var url = 'http://localhost/mvc-php-master/controllers/ProductsController.php';
	  			xhr.open('GET', url, true);
				xhr.addEventListener('error', function(e) {
					console.log('Un error ocurrio al cargar categorias', e);
				});
	  		}

			function getProducts() {
				var xhr = new XMLHttpRequest();
				var url = 'http://localhost/mvc-php-master/controllers/ProductsController.php';
				xhr.open('GET', url, true);
				xhr.addEventListener('error', function(e) {
					console.log('Un error ocurrió', e);
				});
				xhr.addEventListener('loadend', function() {
					//console.log('xhr.readyState:', xhr.responseText);
					products = eval(xhr.responseText); //convertir en objeto de una cadena de texto
					products.forEach(function(product){
						//console.log(products);
						row = document.createElement("tr");	
						idColumn = document.createElement("td");
						nameColumn = document.createElement("td");
						priceColumn = document.createElement("td");
						descriptionColumn = document.createElement("td");

						idColumn.innerHTML = product.id;
						nameColumn.innerHTML = product.nombre;
						priceColumn.innerHTML = product.precio;
						descriptionColumn.innerHTML = product.descripcion;

						row.appendChild(idColumn);
						row.appendChild(nameColumn);
						row.appendChild(priceColumn);
						row.appendChild(descriptionColumn);

						document.querySelector("#product-list").appendChild(row);
					});
				});
				xhr.send();
			}

	  	</script>


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
