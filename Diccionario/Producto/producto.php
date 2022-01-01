<!DOCTYPE html>
<html lang="en">
		<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');?>
		<body>
			<div id="wrapper">
				<div id="container">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php');?>
				</div>
			<div id="container">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/success.php');?>
			<h2>Producto</h2>
			<a href="Crear_producto.php">Crear Producto</a>

				<table id="table">
					<thead>
					<tr>
						<th>Seleccion</th>
            <th>Producto</th>
            <th>Tipo de Monitoreo</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
				<?php
					$resp = getproducto("");
					if($resp !== null){
							$count = 0;
							while ($count < count($resp) ) {
									$id=$resp[$count][0];
									$nombre= $resp[$count][1];
                  $id_ant = $resp[$count][2];
                  $tipo = gettipo("where id=".$id_ant);
									?>
									<tr><td width="10%"><?php echo "<input type='checkbox' name='producto' value='$id'"; ?></td>
       						<td width="30%"><?php echo "$nombre "; ?></td>
                  <td width="30%"><?php echo $tipo[0][1] ?></td>
       						<td width="30%"><?php echo "<a href='Edit_producto.php?id=$id'>Editar</a><br /><a onclick=\"eliminar('$id_ant','$id','producto')\">Eliminar</a>"; ?></td>
       						</tr>
									<?php
									$count = $count + 1;
							}
					}else{
							echo "No existe contenido relacionado";

					}
				?>
				</tbody>
				</table>
				<button onclick="EliminarVarios('producto')">Eliminar Multiple</button>
			</div>
			<?php //include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/footer.php');?>
			</div>
	</body>
</html>
