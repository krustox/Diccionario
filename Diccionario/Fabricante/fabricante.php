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
			<h2>Fabricante</h2>
			<a href="Crear_Fabricante.php">Crear Fabricante</a>

				<table id="table">
					<thead>
					<tr>
						<th>Seleccion</th>
						<th>Nombre Fabricante</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
				<?php
					$resp = getFabircante("");
					if($resp !== null){
							$count = 0;
							while ($count < count($resp) ) {
									$id=$resp[$count][0];
									$nombre= $resp[$count][1];
									?>
									<tr><td width="10%"><?php echo "<input type='checkbox' name='fabricantes' value='$id'"; ?></td>
       						<td width="30%"><?php echo "$nombre "; ?></td>
       						<td width="30%"><?php echo "<a href='Edit_Fabricante.php?id=$id'>Editar</a><br /><a onclick=\"eliminar('$id','$id','fabricante')\">Eliminar</a>"; ?></td>
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
				<button onclick="EliminarVarios('fabricante')">Eliminar Multiple</button>
			</div>
			<?php //include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/footer.php');?>
			</div>
	</body>
</html>
