<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/head.php');
$servicio = 0;
if(isset($_GET["servicio"])){
$servicio = $_GET["servicio"];
}
?>
	<body>
		<div id="container">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Layout/header.php'); ?>
		</div>
		<div id="container">
		<div id="contain">
			<h1>Envio de Correos de Variables</h1>
			<label>Servicios</label>
			<select name="servicio" id="servicio">
				<option value=" ">  </option>
				<?php
						$resp = getArbol("servicio","");
						if($resp !== null){
							$count = 0;
							while ($count < count($resp) ) {
								$id=$resp[$count][0];
								$nombre= $resp[$count][1];
								if($servicio != $resp[$count][0]){
						 ?><option value="<?php echo $resp[$count][0]; ?>"><?php echo $resp[$count][2] ; ?></option><?php
					 }else{
						 ?><option value="<?php echo $resp[$count][0]; ?>" selected><?php echo $resp[$count][2] ; ?></option><?php
					 }
								$count = $count + 1;
							}
						}
		?>
			</select>

      <div id="tabla">
				<table id = "table">
				  <thead>
				  <tr>
				    <th>Fabricante</th>
				    <th>Tipo de Monitoreo</th>
				    <th>Producto</th>
				    <th>Grupo de Metricas</th>
				    <th>Metrica</th>
				    <th>Variable</th>
				    <th>Envio Correo</th>
				  </tr>
				  </thead>
				  <tfoot>
				  <tr>
				    <th>Fabricante</th>
				    <th>Tipo de Monitoreo</th>
				    <th>Producto</th>
				    <th>Grupo de Metricas</th>
				    <th>Metrica</th>
				    <th>Variable</th>
				    <th>Envio Correo</th>
				  </tr>
				  </tfoot>
				  <tbody name="ttable" id="ttable">
						<?php
						if(isset($_GET["servicio"])){
							if($servicio != ""){
							$data = getArbol2("SELECT subcomponente.display_subcomponente FROM arbol.subcomponente WHERE componente in (
SELECT componente.componente FROM arbol.componente WHERE site in (
SELECT site.site FROM arbol.site WHERE subservicio in (
SELECT subservicio.subservicio FROM arbol.subservicio WHERE tipo_servicio in (
SELECT tipo_servicio.tipo_servicio FROM arbol.tipo_servicio WHERE servicio = $servicio))))
UNION
SELECT transaccion.display_transaccion FROM arbol.transaccion WHERE producto in (
SELECT producto.producto FROM arbol.producto WHERE segmento in (
SELECT segmento.segmento FROM arbol.segmento WHERE agrupacion in (
SELECT agrupacion.agrupacion FROM arbol.agrupacion WHERE tipo_servicio in (
SELECT tipo_servicio.tipo_servicio FROM arbol.tipo_servicio WHERE servicio = $servicio))))
");
$count = 0;
$comp = "(";
while ($count < count($data) ) {
	$comp = $comp."'".$data[$count][0]."',";
	$count = $count + 1;
}
$comp = substr($comp,0,strlen($comp)-1).")";
						$resp = getall("AND componente.nombre in ".$comp);
						if($resp !== null){
						    $count = 0;
						    while ($count < count($resp) ) {
						        $fabricante = $resp[$count][0];
						        $tipo = $resp[$count][1];
						        $producto = $resp[$count][2];
						        $componente = $resp[$count][3];
						        $metrica = $resp[$count][4];
						        $variable = $resp[$count][5];
						        ?>
						        <tr>
						        <td width="30%"><?php echo $fabricante; ?></td>
						        <td width="30%"><?php echo $tipo ?></td>
						        <td width="30%"><?php echo $producto ?></td>
						        <td width="30%"><?php echo $componente ?></td>
						        <td width="30%"><?php echo $metrica ?></td>
						        <td width="30%"><?php echo $variable ?></td>
										<?php
										$correo = getCorreo($resp[$count][6],$servicio);
										if($correo != null){
										 ?>
						        <td width="30%"><input type='checkbox' name='<?php echo "correo,".$resp[$count][6].",".$servicio; ?>' id='<?php echo "correo,".$resp[$count][6].",".$servicio; ?>' checked></td>
										<?php
									}else{
										?>
									 <td width="30%"><input type='checkbox' name='<?php echo "correo,".$resp[$count][6].",".$servicio; ?>' id='<?php echo "correo,".$resp[$count][6].",".$servicio; ?>'></td>
									 <?php
									}
										?>
						        </tr>
						        <?php
						        $count = $count + 1;
						    }
						}else{
						    echo "No existe contenido relacionado";

						}
					}
				}
						 ?>

					</tbody>
					</table>

			</div>
      <form action="report.php" method="post">
				<input type="hidden" id="servicio" name="servicio" value="<?php echo $servicio;?>" />
				<input type="submit" value="Exportar XLS" class="button"  />
      </form>
		</div>
		</div>
		<?php //include('../Layout/footer.php'); ?>
	</body>
</html>
