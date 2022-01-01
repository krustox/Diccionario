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
        $data=getproducto("WHERE id=".$id);
        $tipo=gettipo("WHERE id=".$data[0][2]);
        $fabricante=getFabircante("WHERE id=".$tipo[0][2]);?>
			</div>
			<div id="container">
			<h2>Editar Producto</h2>
			<div class="formularios">
				<form action="editproducto.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
          <h4>Fabricante: <?php echo $fabricante[0][1];?></h4>
          <label>Tipo de Monitoreo</label>
          <select id="tipo" name="tipo">
          <option value=" "> </option>
          <?php
              $resp = gettipo("WHERE fabricante=".$tipo[0][2]);
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
					<label for="display_producto">Nombre Producto</label>
					<input type="text" name="display_producto" id="display_producto" value="<?php echo $data[0][1];?>" />
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
