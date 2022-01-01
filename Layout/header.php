<header>
	<h1>Diccionario de Variables</h1>
	<img src="/Diccionario/img/logo-banco-estado.jpg" alt="">
	<p><?php echo getName($_SESSION["nombre"]);?></p>
	<p><a href="../ajax/logout.php">Cerrar sesión</a></p>
</header>
<nav>
	<ul id="navigator">
		<li><a href="/Diccionario/Diccionario/tabla.php">Tabla de Variables</a></li>
		<li><a href="/Diccionario/Diccionario/diccionario.php">Diccionario</a></li>
		<?php if($_SESSION["nombre"] == "TEST" || $_SESSION["nombre"] == "banco\\"."montivoli"){ ?>
		<li><a href="/Diccionario/Diccionario/Fabricante/Fabricante.php">Fabricante</a></li>
		<li><a href="/Diccionario/Diccionario/Tipo/Tipo.php">Tipo de Monitoreo</a></li>
		<li><a href="/Diccionario/Diccionario/Producto/Producto.php">Producto</a></li>
		<li><a href="/Diccionario/Diccionario/Componente/Componente.php">Grupo de Metricas</a></li>
		<li><a href="/Diccionario/Diccionario/Metrica/Metrica.php">Metrica</a></li>
		<li><a href="/Diccionario/Diccionario/Variable/Variable.php">Variable</a></li>
		<li><a href="/Diccionario/Diccionario/Carga/Carga.php">Carga Masiva</a></li>
	<?php } ?>
	</ul>
</nav>
