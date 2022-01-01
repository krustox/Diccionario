<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');
$id = $_GET['id'];?>
	<body>
		<div id="wrapper">
			<div id="container">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php');?>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/success.php');
        $data=getvariable("WHERE id=".$id);
        $metrica=getmetrica("WHERE id=".$data[0][2]);
        $componente=getcomponente("WHERE id=".$metrica[0][2]);
        $producto=getproducto("WHERE id=".$componente[0][2]);
        $tipo=gettipo("WHERE id=".$producto[0][2]);
        $fabricante=getFabircante("WHERE id=".$tipo[0][2]);?>
			</div>
			<div id="container">
			<h2>Editar Variable</h2>
			<div class="formularios">
				<form action="editvariable.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
          <h4>Fabricante: <?php echo $fabricante[0][1];?></h4>
          <h4>Tipo de Monitoreo: <?php echo $tipo[0][1];?></h4>
          <h4>Producto: <?php echo $producto[0][1];?></h4>
          <h4>Grupo de Metricas: <?php echo $componente[0][1];?></h4>
      <label>Metrica</label>
      <select id="metrica" name="metrica">
        <option value=" "> </option>
        <?php
            $resp = getmetrica("WHERE componente=".$metrica[0][2]);
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
					<label for="display_variable">Nombre Variable</label>
					<input type="text" name="display_variable" id="display_variable" value="<?php echo $data[0][1];?>"/>
          <label for="display_descripcion">Descripcion</label>
					<input type="text" name="display_descripcion" id="display_descripcion" value="<?php echo $data[0][3];?>"/>
          <label for="display_unidad">Unidad Metrica</label>
					<input type="text" name="display_unidad" id="display_unidad" value="<?php echo $data[0][4];?>"/>
          <label for="display_frecuencia">Frecuencia</label>
					<input type="text" name="display_frecuencia" id="display_frecuencia" value="<?php echo $data[0][7];?>"/>
          <input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
