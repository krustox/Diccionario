<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
//datos del arhivo
error_reporting(0);
ini_set('display_errors', 0);
$extra = 'Carga.php?ok=1';
$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
if((strpos($nombre_archivo,"txt")) || (strpos($nombre_archivo,"csv")) ){
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $nombre_archivo)){
   //	echo "El archivo ha sido cargado correctamente.";
    $fp = fopen($nombre_archivo, "r");
while(!feof($fp)) {
  $linea = fgets($fp);
  if($linea == ""){break;}
    $var = explode(';',$linea);

    try{
    //fabricante
    $fabricante = $var[0];
    $fabricantes=getFabircante("WHERE nombre = '$fabricante'");
    if(count($fabricantes) == 1){
      $id_fabricante = $fabricantes[0][0];
    }elseif (count($fabricantes) == 0) {
      $tmp_fabricante = insertFabricante($fabricante);
      $id_fabricante = $tmp_fabricante[0][0];
    }else{

    }

    //tipo_monitoreo
    $tipo = $var[1];
    $tipos = gettipo("WHERE nombre = '$tipo' AND fabricante = $id_fabricante");
    if(count($tipos) == 1 ){
      $id_tipo = $tipos[0][0];
    }elseif(count($tipos) == 0){
      $tmp_tipo = inserttipo($tipo,$id_fabricante);
      $id_tipo = $tmp_tipo[0][0];
    }else{

    }

    //producto
    $producto= $var[2];
    $productos = getproducto("WHERE nombre = '$producto' AND tipo_monitoreo = $id_tipo");
    if(count($productos) == 1 ){
      $id_producto = $productos[0][0];
    }elseif(count($productos) == 0){
      $tmp_producto = insertproducto($producto,$id_tipo);
      $id_producto = $tmp_producto[0][0];
    }else{

    }

    //componente
    $componente = $var[3];
    $componentes = getcomponente("WHERE nombre = '$componente' AND producto = $id_producto");
    if(count($componentes) == 1){
      $id_componente = $componentes[0][0];
    }elseif (count($componentes) == 0){
      $tmp_componente = insertcomponente($componente,$id_producto);
      $id_componente = $tmp_componente[0][0];
    }else{

    }

    //Metrica
    $metrica = $var[4];
    $metricas = getmetrica("WHERE nombre = '$metrica' AND componente = $id_componente");
    if(count($metricas) == 1){
      $id_metrica = $metricas[0][0];
    }elseif(count($metricas) == 0){
      $tmp_metrica = insertmetrica($metrica,$id_componente);
      $id_metrica = $tmp_metrica[0][0];
    }else{

    }

    //Variable
    $variable = $var[5];
    $variables = getvariable("WHERE nombre = '$variable' AND metrica = $id_metrica");
    if(count($variables) == 1){
      $tmp_variables = editvariable($variables[0][0],$variable,$id_metrica,$var[6],$var[7],$var[8]);
    }elseif (count($variables) == 0) {
      $tmp_variables = insertvariable($variable,$id_metrica,$var[6],$var[7],$var[8]);
    }else{

    }
}catch(Exception $e){
  escribir("Error_cargaMasiva", $linea ." No pudo ser ingresada");
}
//INSERT DE CADA TABLA


}
fclose($fp);
}else{
   	echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
}
}else{
    $extra = 'Carga.php?ok=2';
    escribir("Carga","Formato de archivo erroneo". $nombre_archivo);
}
header("Location: http://$host$uri/$extra");
exit();
?>
