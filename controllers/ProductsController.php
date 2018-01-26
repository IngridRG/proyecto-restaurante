<?php
include_once("../models/Product.php");
include_once("../models/Cleaner.php");


if(isset($_POST["action"])){
	$nombre = Cleaner::cleanInput($_POST["nombre"]);
	$descripcion = Cleaner::cleanInput($_POST["descripcion"]);
	$precio = (int)Cleaner::cleanInput($_POST["precio"]);

	$product = new Product($nombre, $descripcion, $precio);

	if($product->save()) {
		echo "Datos guardados";
	}else{
		echo "Datos no guardados";
	}
	//echo "Estan llegando valores";
}else{
	$products = Product::get();
	$products = json_encode($products);
	echo $products;

	$categorias = Product::getCategorias();
	$categorias = json_encode($categorias);
	echo $categorias;
}
