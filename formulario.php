<?php
/*
		Made by Javier.
*/
 include_once "encabezado.php"
 ?>
<body class="">
<div class="col-xs-12">
  <hr>
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código o palabra clave:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Código o palabra clave">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

		<label for="provedor">Provedor:</label>
		<input class="form-control" name="provedor" required type="text" id="provedor" placeholder="Provedor">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
  <hr>
</div>
</body>
<?php include_once "pie.php" ?>
