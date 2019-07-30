<?php
mysql_connect("localhost","root","");
mysql_select_db("produccion");
if(isset($_REQUEST['fecha'])){
	$f=$_REQUEST['fecha'];
	$l=$_REQUEST['lote'];
	$a=$_REQUEST['Alimento'];
	$To=$_REQUEST['toneladas'];
	$n=$_REQUEST['tipo'];
	mysql_query("INSERT INTO envasado VALUES(NULL,'$f','$l','$a','$To','$n')");
	
}
?>
<?php
//modificarS
if(isset($_REQUEST['m'])){
	$mod=mysql_fetch_assoc(mysql_query("SELECT * FROM envasado WHERE ID=".$_REQUEST['m']));
}
if(isset($_REQUEST['m'])){
	$conProd=mysql_query("SELECT * FROM envasado WHERE ID='$_REQUEST[m]'");
	$aconP=mysql_fetch_assoc($conProd);
	$f=$aconP['fecha'];
	$l=$aconP['lote'];
	$a=$aconP['Alimento'];
	$To=$aconP['toneladas'];
	$n=$aconP['tipo'];
	mysql_query("UPDATE envasado SET lote='$l', Alimento='$a',toneladas='$To',tipo='$n'  WHERE ID='$_REQUEST[m]'");
}else{
	$_REQUEST['ID']="";
}
//eliminar
if(isset($_REQUEST['e'])){
	mysql_query("DELETE  FROM envasado WHERE ID=".$_REQUEST['e']);
}
?>

<!DOCTYPE html>
<html Lang="en">
<title>Envasado</title>
<head>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Elastislide - A Responsive Image Carousel" />
        <meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
<body oncontextmenu="return false"> 
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
<article>
<div class="main">
				<header class="clearfix">	
					<h1>PROTEINAS, ENERGÈTICOS Y OLEOS, S.A DE C.V <span>Area de Producciòn</span></h1>
				</header>  
				<nav class="codrops-demos">
						<a href="inicio.php">Menu Principal</a>
						<a href="index.php">Cerrar Sesion</a>
					</nav>

<br>
<br>
<br>
<br>
<hr>
<center><font color="blue" face="Bernard MT Condensed">Envasado</font></center>
<br>
<br>
</head>
<body>
<center>
<form action="envasado.php" method="post">
<input type="date" name="fecha" placeholder="fecha" required><br>
</select><br>
<input type="number"name="lote" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['lote']."' ";}?> placeholder="Lote" required><br>
<input type="alimento" name="Alimento" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['Alimento']."' ";}?> placeholder="Alimento" required><br>
</select><br>
<input type="number" name="toneladas" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['Toneladas']."' ";}?>  placeholder="Toneladas" required><br>
<input type="text" name="tipo" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['tipo']."' ";}?>  placeholder="Tipo" required><br>
<br>
<input type="submit"  value="Insertar"  <?php if(isset($_REQUEST['m'])){echo "value='Guardar'"; }else{ echo"value='Insertar'";} ?> >
</form></center>
<br>
<hr>
<center><font color="blue" face="Bernard MT Condensed">Filtrar</font></center>
<hr>
<br>
<center>
<form action="envasado.php" method="post">
<input type="submit" value="Filtrar por">
<select name="filtro">
	<option value="Lote">Lote</option>
	<option value="Alimento">Alimento</option>
	<option value="Toneladas">Toneladas</option>
	<option value="Toneladas">Tipo</option>
	</select></center>
	<input type="hidden" name="f">
	

	</form>

	<?php
	$p=mysql_query("SELECT * FROM envasado");
	if (isset($_REQUEST['f'])) {
		$f=$_REQUEST['filtro'];
		$q=mysql_query("SELECT DISTINCT $f FROM envasado");
		$b=mysql_fetch_assoc($q);
		echo "<form action='envasado.php' method='post'>
		<select name='filtro2'>";
		do{
			echo "<option value='".$b[$f]."'>".$b[$f]."</option>";
		}while ($b=mysql_fetch_assoc($q));
		echo "</select><input type='hidden' name='f2' value='$f'>
		<input type='submit' value='Filtrar por'></form>";
		 
	}
	?>

</select>
<center>
<table border="2">
<tr>
<td>Fecha</td>
<td>Lote</td>
<td>Alimento</td>
<td>Toneladas</td>
<td>Tipo</td>
<td>Eliminar</td>
<td>Modificar</td>
</tr></center>
<?php

if (isset($_REQUEST['f2'])) {
	$f2=$_REQUEST['f2'];
	$f=$_REQUEST['filtro2'];
	$r=mysql_query("SELECT * FROM envasado WHERE $f2='$f'");
	$j=mysql_fetch_assoc($r);
	$i=0;

	do{
		echo "<tr><td>".$j['fecha']."</td>";
		echo "<td>".$j['lote']."</td>";
		echo "<td>".$j['Alimento']."</td>";
		echo "<td>".$j['Toneladas']."</td>";
		echo "<td>".$j['tipo']."</td></tr>";
		$i++;
	}while ($j=mysql_fetch_assoc($r));

}else{
	$i=0;
	$p=mysql_query("SELECT * FROM envasado");
	$a=mysql_fetch_assoc($p);
	
do{
		echo "<tr><td>".$a['fecha']."</td>";
		echo "<td>".$a['lote']."</td>";
		echo "<td>".$a['Alimento']."</td>";
		echo "<td>".$a['Toneladas']."</td>";
		echo "<td>".$a['tipo']."</td>";
		echo "<td><a href='envasado.php?e=".$a['ID']."'>Eliminar</a></td>";
		echo "<td><a href='envasado.php?m=".$a['ID']."'>Modificar</a></td></tr>";
	$i++;

}while ($a=mysql_fetch_assoc($p));
}

?>
<tr><td colspan="7">Total de registros <?php echo "->".$i; ?></td></tr>
</table>
<br>
<br>
<h1>Borrar todos Los datos de tabla</h1>
<form method="get" action="borrar2.php">
<input type="submit" value="Eliminar Registros de la tabla">
</form>
<br>
<table border="2" width="300">
<tr>
<td align="center" colspan="2">
<strong>Exportar Reporte del Area de Envasado</strong>
</td>
<tr>
<td width="439"><strong>Exportar Reporte en Word</strong></td>
<td width="145" align="center"><a href="envasadoPDF.php"><img src="imagen/word.png" width="30" height="25"/></a></td>
</tr>
<tr>
<td><strong>Exportar Reporte en EXCEL</strong></td>
<td align="center"><a href="reporte_excel_enva.php"><img src="imagen/excel.png" width="30" height="25"/></a></td>
</form>
</body>
</html>

