<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["provedor"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$provedor = $_POST["provedor"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, provedor, existencia) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $provedor, $existencia]);

if($resultado === TRUE){
	header("Location: ./inventario.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";

/*
		Made by Javier.
*/
?>
<?php include_once "pie.php" ?>
