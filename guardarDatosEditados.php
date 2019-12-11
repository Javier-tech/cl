<?php
/*
		Made by Javier.
*/
#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) ||
	!isset($_POST["descripcion"]) ||
	!isset($_POST["provedor"]) ||
	!isset($_POST["precioVenta"]) ||
	!isset($_POST["existencia"]) ||
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$provedor = $_POST["provedor"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, provedor = ?, precioVenta = ?, existencia = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $provedor, $precioVenta, $existencia, $id]);

if($resultado === TRUE){
	header("Location: ./inventario.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
