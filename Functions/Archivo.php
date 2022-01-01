<?php
	function escribir($nivel,$texto){
		$file = fopen($_SERVER['DOCUMENT_ROOT']."/Diccionario/logs/".$nivel.".txt", "a");
		fwrite($file, date("l jS \of F Y h:i:s A"));
		fwrite($file, ": ".$texto . PHP_EOL);
		fclose($file);
	}

	function backup($nivel,$texto){
		$file = fopen($nivel.".data", "a");
		fwrite($file, $texto . PHP_EOL);
		fclose($file);
	}

?>
