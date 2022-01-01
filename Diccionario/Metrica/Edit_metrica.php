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
        $data=getmetrica("WHERE id=".$id);
        $componente=getcomponente("WHERE id=".$data[0][2]);
        $producto=getproducto("WHERE id=".$componente[0][2]);
        $tipo=gettipo("WHERE id=".$producto[0][2]);
        $fabricante=getFabircante("WHERE id=".$tipo[0][2]);?>
			</div>
			<div id="container">
			<h2>Editar Metrica</h2>
			<div class="formularios">
				<form action="editmetrica.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $data[0][0];?>" />
          <h4>Fabricante: <?php echo $fabricante[0][1];?></h4>
          <h4>Tipo de Monitoreo: <?php echo $tipo[0][1];?></h4>
          <h4>Producto: <?php echo $producto[0][1];?></h4>
      <label>Grupo de Metricas</label>
      <select id="componente" name="componente">
        <option value=" "> </option>
        <?php
            $resp = getcomponente("WHERE producto=".$componente[0][2]);
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
					<label for="display_metrica">Nombre Metrica</label>
					<input type="text" name="display_metrica" id="display_metrica" value="<?php echo $data[0][1];?>"/>
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php //include('../footer.php');?>
		</div>
	</body>
</html>
