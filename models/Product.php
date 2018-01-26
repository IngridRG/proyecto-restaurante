<?php
require_once 'Database.php';

class Product
{
	public $name;
	public $description;
	public $price;

	public function __construct($name, $description, $price)
	{
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	public function save(){
		$sql = "INSERT INTO 
				productos 
				(
					nombre,
					descripcion,
					precio, categoria_id
				) 
				VALUES(
						'".$this->name."', 
						'".$this->description."', 
						$this->price,
						1
				)";
		$db = new Database();
		if ($db->query($sql)) {
			$db->close();
			return true;
		}
		$db->close();
		return false;
	}

	public static function getCategorias() {
		$sql = "SELECT 
				*
				FROM
				categorias";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}

	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				productos";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}
}


/*

CREAR ELEMENTOS
 var div = document.createElement("div");
 div.innerHTML = "TEXTO de prueba";
 documen.querySelector("#mi-contenido");


*/