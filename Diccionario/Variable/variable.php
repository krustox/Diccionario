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
			<h2>Variable</h2>
			<a href="Crear_variable.php">Crear Variable</a>

				<table id="table">
					<thead>
					<tr>
						<th>Seleccion</th>
            <th>Variable</th>
            <th>Metrica</th>
            <th>Descripcion</th>
            <th>Unidad Metrica</th>
            <th>Frecuencia</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
				<?php
					$resp = getVariable("");
					if($resp !== null){
							$count = 0;
							while ($count < count($resp) ) {
									$id=$resp[$count][0];
									$nombre= $resp[$count][1];
                  $id_ant = $resp[$count][2];
                  $metrica = getmetrica("where id=".$id_ant);
									?>
									<tr><td width="10%"><?php echo "<input type='checkbox' name='Variable' value='$id'"; ?></td>
       						<td width="30%"><?php echo "$nombre "; ?></td>
                  <td width="30%"><?php echo $metrica[0][1] ?></td>
                  <td width="30%"><?php echo $resp[$count][3] ?></td>
                  <td width="30%"><?php echo $resp[$count][4] ?></td>
                  <td width="30%"><?php echo $resp[$count][5] ?></td>
                  <td width="30%"><?php echo "<a href='Edit_variable.php?id=$id'>Editar</a><br /><a onclick=\"eliminar('$id_ant','$id','variable')\">Eliminar</a>"; ?></td>
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
				<button onclick="EliminarVarios('variable')">Eliminar Multiple</button>
			</div>
			<?php //include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/footer.php');?>
			</div>
	</body>
</html>
