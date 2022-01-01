<?php
	if(isset($_GET['ok'])){
    	if($_GET['ok'] == 1) { 
        	echo "<script type='text/javascript'>alert('Se ha realizado la insercion con exito')</script>";
      	}else{
        	echo "<script type='text/javascript'>alert('Hubo un error al insertar!')</script>";
    	}
	}
?>