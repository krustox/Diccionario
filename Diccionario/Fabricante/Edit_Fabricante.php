<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');
$id = $_GET['id'];
?>

	<body>
		<div id="wrapper">
			<div id="container">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php');?>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/success.php');
        $data=getFabircante("WHERE id=".$id);
        ?>
			</div>
			<div id="container">
			<h2>Crear Fabricante</h2>
			<div class="formularios">
				<form action="editfabricante.php" method="post">
					<label>Nombre Fabricante</label>
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
					<input type="text" name="display_fabricante" id="display_fabricante" value="<?php echo $data[0][1];?>" />
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
