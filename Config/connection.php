<?php
/*
$db_name = 'SERVICIO';
$usr_name = 'db2inst1';
$password = 'tivolitivoli';
$hostname = '167.28.131.172';
$port = 50000;
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$db_name;HOSTNAME=$hostname;PORT=$port;PROTOCOL=TCPIP;UID=$usr_name;PWD=$password;";
*/

$use_db = 1;

$db_name = 'dicciona';
$usr_name = 'db2admin';
$password = 'da.900619.';
$hostname = 'localhost';
$port = 50000;
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$db_name;HOSTNAME=$hostname;PORT=$port;PROTOCOL=TCPIP;UID=$usr_name;PWD=$password;";


$hosts        = "host=localhost";
$ports        = "port=5432";
$dbnames      = "dbname=diccionario";
$credentials = "user=postgres password=900619";
/*
$hosts        = "host=172.16.90.75";
$ports        = "port=5432";
$dbnames      = "dbname=diccionario";
$credentials = "user=postgres password=passwd";
*/
$servername = "localhost";
$username = "root";
$pass = "Da.900619.";
$dbname = "diccionario";



Function mysqls($sql){
  global $servername, $username, $pass, $dbname;
  $conn = new mysqli($servername, $username, $pass, $dbname);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $i=0;
    $data = null;
    $field_cnt = $result->field_count;
    while($row = $result->fetch_array(MYSQLI_BOTH)) {
      for($j=0;$j< $field_cnt;$j++){
        $data[$i][$j] = $row[$j];
      }
      $i = $i +1;
    }
    return $data;
  }else {
    return $result;
  }
  $conn->close();
}

Function pg($sql){
  global $hosts,$dbnames,$credentials,$ports;
  $db = pg_connect( "$hosts $ports $dbnames $credentials"  );
   if ($db) {
    $resp = pg_query($db, $sql);
    $num = pg_num_fields($resp);
     if($resp){
       $i=0;
       $data = null;
        while ($row = pg_fetch_row($resp)) {
          for($j=0;$j< $num;$j++){
            $data[$i][$j] = $row[$j];
          }
          $i = $i +1;
        }
        return $data;
   }else{
     return null;
   }
   pg_close($db);
 }
}

Function pg1($sql){
  global $hosts,$credentials,$ports;
  $dbnames      = "dbname=arbol";
  $db = pg_connect( "$hosts $ports $dbnames $credentials"  );
   if ($db) {
    $resp = pg_query($db, $sql);
    $num = pg_num_fields($resp);
     if($resp){
       $i=0;
       $data = null;
        while ($row = pg_fetch_row($resp)) {
          for($j=0;$j< $num;$j++){
            $data[$i][$j] = $row[$j];
          }
          $i = $i +1;
        }
        return $data;
   }else{
     return null;
   }
   pg_close($db);
 }
}


Function db2($sql){
  global $conn_string;
  $conn_resource = db2_connect($conn_string, '', '');
  if ($conn_resource) {
    $resp = db2_prepare($conn_resource, $sql);
    if($resp){
		    $result = db2_exec($conn_resource, $sql );
				if ($result) {
          $num = db2_num_fields($result);
          $i=0;
          $data = null;
          while ($row = db2_fetch_array($result)) {
            for($j=0;$j< $num;$j++){
              $data[$i][$j] = $row[$j];
            }
            $i = $i +1;
          }
          return $data;
        }
    }
  }
}

Function getFabircante($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.fabricante ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function insertFabricante($nombre){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.fabricante (nombre) VALUES ('$nombre')";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteFabricante($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.fabricante WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function editFabricante($id,$nombre){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.fabricante SET nombre='$nombre' WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}


Function gettipo($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.tipo_monitoreo ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
        }
}

Function inserttipo($nombre,$fabricante){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.tipo_monitoreo (nombre,fabricante) VALUES ('$nombre',$fabricante)";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteTipo($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.tipo_monitoreo WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function edittipo($id,$nombre,$fabricante){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.tipo_monitoreo SET nombre='$nombre' ,fabricante=$fabricante WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function getproducto($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.producto ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
        }
}

Function insertproducto($nombre,$tipo){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.producto (nombre,tipo_monitoreo) VALUES ('$nombre',$tipo)";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteProducto($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.producto WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function editproducto($id,$nombre,$tipo){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.producto SET nombre='$nombre',tipo_monitoreo= $tipo WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function getcomponente($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.componente ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
        }
}

Function insertcomponente($nombre,$producto){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.componente (nombre,producto) VALUES ('$nombre',$producto)";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteComponente($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.componente WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function editcomponente($id,$nombre,$producto){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.componente SET nombre='$nombre',producto= $producto WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}


Function getmetrica($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.metrica ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
        }
}

Function insertmetrica($nombre,$componente){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.metrica (nombre,componente) VALUES ('$nombre',$componente)";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteMetrica($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.metrica WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function editmetrica($id,$nombre,$componente){
  $nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.metrica SET nombre='$nombre',componente=$componente WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function getvariable($where){
  $where = strtoupper($where);
  global $use_db;
    $sql = "SELECT * FROM diccionario.variable ". $where;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
        }
}

Function insertvariable($nombre,$metrica,$descripcion,$unidad,$frecuencia){
$nombre = strtoupper($nombre);
  global $use_db;
    $sql = "INSERT INTO diccionario.variable (nombre,metrica,descripcion,unidad_metrica,frecuencia)
    VALUES ('$nombre',$metrica,'$descripcion','$unidad','$frecuencia')";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function deleteVariable($id){
  global $use_db;
    $sql = "DELETE FROM diccionario.variable WHERE id =".$id;
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function editvariable($id,$nombre,$metrica,$descripcion,$unidad,$frecuencia){
$nombre = strtoupper($nombre);
  global $use_db;
    $sql = "UPDATE diccionario.variable SET nombre='$nombre',metrica=$metrica,descripcion='$descripcion',
    unidad_metrica='$unidad',frecuencia='$frecuencia'
    WHERE id=$id";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function getCorreo($variable,$servicio){
  global $use_db;
  $sql = "SELECT * FROM diccionario.correo WHERE variable=".$variable." AND servicio=".$servicio;
  switch ($use_db){
      case 0:
        return mysqls($sql);
        break;
      case 1:
        return pg($sql);
        break;
      case 2:
        return db2($sql);
        break;
  }
}

Function editvariable2($variable,$servicio,$val){
$nombre = strtoupper($nombre);
  global $use_db;
  if($val == "t"){
    $sql="INSERT INTO diccionario.correo (variable,servicio) VALUES ( $variable,$servicio)";
  }else{
    //delete
    $sql="DELETE FROM diccionario.correo WHERE variable =$variable AND servicio=$servicio " ;
  }
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
        $sql = $sql . " returning id;";
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}

Function delete($sql){
  global $use_db;
  switch ($use_db){
      case 0:
        return mysqls($sql);
        break;
      case 1:
      $sql = $sql . " returning id;";
        return pg($sql);
        break;
      case 2:
        return db2($sql);
        break;
      }
}

Function getArbol($tabla,$where){
  global $use_db;
  $sql = "SELECT * FROM arbol.$tabla $where";
  switch ($use_db){
      case 0:
        return mysqls($sql);
        break;
      case 1:
        return pg1($sql);
        break;
      case 2:
        return db2($sql);
        break;
      }
}

Function getArbol2($sql){
  global $use_db;
  switch ($use_db){
      case 0:
        return mysqls($sql);
        break;
      case 1:
        return pg1($sql);
        break;
      case 2:
        return db2($sql);
        break;
      }
}

Function getall($where){
  global $use_db;
    $sql = "SELECT fabricante.nombre as fabricante, tipo_monitoreo.nombre as \"tipo de monitoreo\", producto.nombre as \"producto\", componente.nombre as \"componente\", metrica.nombre as \"metrica\",variable.nombre as \"variable\", variable.id
FROM diccionario.variable
INNER JOIN diccionario.metrica ON metrica.id = variable.metrica
INNER JOIN diccionario.componente ON componente.id = metrica.componente
INNER JOIN diccionario.producto ON producto.id = componente.producto
INNER JOIN diccionario.tipo_monitoreo ON tipo_monitoreo.id = producto.tipo_monitoreo
INNER JOIN diccionario.fabricante ON fabricante.id = tipo_monitoreo.fabricante $where";
    switch ($use_db){
        case 0:
          return mysqls($sql);
          break;
        case 1:
          return pg($sql);
          break;
        case 2:
          return db2($sql);
          break;
  }
}
?>
