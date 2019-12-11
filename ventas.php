<?php include_once "encabezado.php" ?>
<?php
/*
		Made by Javier.
*/
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<body class="">
	<div class="col-xs-12">
		<h1>Registro de ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>


					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>


					<td>
						<table class="table table-bordered alert alert-info">
							<thead>
								<tr class="alert alert-info">
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){
								$producto = explode("..", $productosConcatenados)
								?>
								<tr class="alert alert-info">
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>">borrar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<?php include_once "pie.php" ?>
