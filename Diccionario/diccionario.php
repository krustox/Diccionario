<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');?>
	<body>
		<div id="container">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php'); ?>
		</div>
		<div id="container">

		<div id="contain">
			<div id="accordion">
				<h3 id="fabricante">Fabricante:</h3>
				<div id="div_fabricante">
				<?php
				 	$resp = getFabircante("");
          if($resp !== null){
          $count = 0;
					while ($count < count($resp) ) {
            $id=$resp[$count][0];
            $nombre= $resp[$count][1];
       		echo "<p onclick=\"tipo('$id','$nombre')\">".$nombre."</p>";
          $count = $count + 1;
      		}
        }else{
          echo "No existe contenido relacionado";
        }
				?>
				</div>
			<h3 id="tipo">Tipo de Monitoreo:</h3>
			<div id="div_tipo" ></div>
			<h3 id="producto">Producto:</h3>
			<div id="div_producto" ></div>
			<h3 id="componente">Grupo de Metricas:</h3>
			<div id="div_componente" ></div>
			<h3 id="metrica">Metrica:</h3>
			<div id="div_metrica" ></div>
			<h3 id="variables">Variables:</h3>
			<div id="div_variables" ></div>
			</div>
		</div>
		</div>
		<?php //include('../Layout/footer.php'); ?>
	</body>
</html>
