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
        $data=getcomponente("WHERE id=".$id);
        $producto=getproducto("WHERE id=".$data[0][2]);
        $tipo=gettipo("WHERE id=".$producto[0][2]);
        $fabricante=getFabircante("WHERE id=".$tipo[0][2]);?>
			</div>
			<div id="container">
			<h2>Editar Grupo de Metricas</h2>
			<div class="formularios">
				<form action="editcomponente.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
          <h4>Fabricante: <?php echo $fabricante[0][1];?></h4>
          <h4>Tipo de Monitoreo: <?php echo $tipo[0][1];?></h4>
      <label>Producto</label>
      <select id="producto" name="producto">
        <option value=" "> </option>
        <?php
            $resp = getproducto("WHERE tipo_monitoreo=".$producto[0][2]);
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
					<label for="display_componente">Nombre Grupo de Metricas</label>
					<input type="text" name="display_componente" id="display_componente" value="<?php echo $data[0][1];?>"/>
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
