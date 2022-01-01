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
        $data=gettipo("WHERE id=".$id);?>
			</div>
			<div id="container">
			<h2>Editar Tipo de Monitoreo</h2>
			<div class="formularios">
				<form action="edittipo.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
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
                    if($id == $data[0][2]){
                ?><option value="<?php echo $resp[$count][0]; ?>" selected><?php echo $resp[$count][1] ; ?></option><?php
                    }else{
       					 ?><option value="<?php echo $resp[$count][0]; ?>"><?php echo $resp[$count][1] ; ?></option><?php
                    }
                    $count = $count + 1;
      				    }
      			    }
				?>
      </select>
					<label for="display_tipo">Nombre Tipo Monitoreo</label>
					<input type="text" name="display_tipo" id="display_tipo" value="<?php echo $data[0][1];?>" />
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
