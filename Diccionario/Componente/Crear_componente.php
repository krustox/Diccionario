<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');?>
	<body>
		<div id="wrapper">
			<div id="container">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php');?>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/success.php');?>
			</div>
			<div id="container">
			<h2>Crear Grupo de Metricas</h2>
			<div class="formularios">
				<form action="newcomponente.php" method="post">
          <label for="fabricante">Fabricante</label>
          <select name="fabricante" id="fabricante">
						<option value=" ">  </option>
            <?php
				 	      $resp = getFabircante("");
					      if($resp !== null){
                  $count = 0;
        					while ($count < count($resp) ) {
                    $id=$resp[$count][0];
                    $nombre= $resp[$count][1];
       					 ?><option value="<?php echo $resp[$count][0]; ?>"><?php echo $resp[$count][1] ; ?></option><?php
                    $count = $count + 1;
      				    }
      			    }
				?>
      </select>
      <label>Tipo de Monitoreo</label>
      <select id="tipo" name="tipo">
        <option value=" "> </option>
      </select>
      <label>Producto</label>
      <select id="producto" name="producto">
        <option value=" "> </option>
      </select>
					<label for="display_componente">Nombre Grupo de Metricas</label>
					<input type="text" name="display_componente" id="display_componente" />
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
