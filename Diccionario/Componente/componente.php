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
			<h2>Grupo de Metricas</h2>
			<a href="Crear_componente.php">Crear Grupo de Metricas</a>

				<table id="table">
					<thead>
					<tr>
						<th>Seleccion</th>
            <th>Grupo de Metricas</th>
            <th>Producto</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
				<?php
					$resp = getcomponente("");
					if($resp !== null){
							$count = 0;
							while ($count < count($resp) ) {
									$id=$resp[$count][0];
									$nombre= $resp[$count][1];
                  $id_ant = $resp[$count][2];
                  $producto = getproducto("where id=".$id_ant);
									?>
									<tr><td width="10%"><?php echo "<input type='checkbox' name='Componente' value='$id'"; ?></td>
       						<td width="30%"><?php echo "$nombre "; ?></td>
                  <td width="30%"><?php echo $producto[0][1] ?></td>
       						<td width="30%"><?php echo "<a href='Edit_componente.php?id=$id'>Editar</a><br /><a onclick=\"eliminar('$id_ant','$id','componente')\">Eliminar</a>"; ?></td>
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
				<button onclick="EliminarVarios('componente')">Eliminar Multiple</button>
			</div>
			<?php //include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/footer.php');?>
			</div>
	</body>
</html>
