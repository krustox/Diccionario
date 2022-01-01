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
			<?php
				if(isset($_GET['ok'])){
			    	if($_GET['ok'] == 1) {
			        	echo "<script type='text/javascript'>alert('Se ha realizado la operacion con exito')</script>";
			      	}else{
								if($_GET['ok'] == 2) {
					        	echo "<script type='text/javascript'>alert('El archivo que intenta carga no tiene el formato correcto')</script>";
					      	}else{
			        	echo "<script type='text/javascript'>alert('Hubo un error al realizar la operación de carga masiva, esto puede deberse a que ya existían en la base de datos algunos de los registros')</script>";
			    	}
				}
			}
			?>
			<div id="container">
			<h2>Carga Masiva</h2>

			<div class="formularios">
				<form action="Cargar.php" method="post" enctype="multipart/form-data">
   				<input name="userfile" type="file">
   				<br>
   				<input type="submit" value="Enviar">
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
