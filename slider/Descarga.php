<?php
mysql_connect("localhost","root","");
mysql_select_db("produccion");
if(isset($_REQUEST['fecha'])){
	$f=$_REQUEST['fecha'];
	$r=$_REQUEST['materia'];
	$To=$_REQUEST['Toneladas'];
	mysql_query("INSERT INTO descarga VALUES(NULL,'$f','$r','$To')");
} 
?>
<?php
//eliminar
if(isset($_REQUEST['e'])){
	mysql_query("DELETE  FROM descarga WHERE ID=".$_REQUEST['e']);
}
//modificarS
if(isset($_REQUEST['m'])){
	$mod=mysql_fetch_assoc(mysql_query("SELECT * FROM descarga WHERE ID=".$_REQUEST['m']));
}
if(isset($_REQUEST['m'])){
	$conProd=mysql_query("SELECT * FROM descarga WHERE ID='$_REQUEST[m]'");
	$aconP=mysql_fetch_assoc($conProd);
	$r=$aconP['materia'];
	$To=$aconP['Toneladas'];
	mysql_query("UPDATE descarga SET materia='$r',Toneladas='$To'  WHERE ID='$_REQUEST[m]'");
}else{
	$_REQUEST['ID']="";
}
?>


<!DOCTYPE html>
<html Lang="en">
<title>Descarga</title>
<head>
<meta charset="UTF-8">
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
					<h1>PROTEINAS, ENERGÈTICOS Y OLEOS, S.A DE C.V<span>Area de Producciòn</span></h1>
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
<center><font color="blue" face="Bernard MT Condensed">Descarga</font></center>
<br>
<br>
</head>
<center>
<form action="descarga.php" method="post">
<input type="date" name="fecha" placeholder="fecha" required><br>
</select><br>
<input type="text" name="materia" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['materia']."' ";}?> placeholder="Materia" required><br>
</select><br>
<input type="number" name="Toneladas" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['Toneladas']."' ";}?> placeholder="Toneladas" required><br>
<br>
<input type="submit"  value="Insertar"  <?php if(isset($_REQUEST['m'])){echo "value='Guardar'"; }else{ echo"value='Insertar'";} ?> >
</form>
<br>
<hr>
<font color="blue" face="Bernard MT Condensed">Filtrar</font>
<hr>
<form action="descarga.php" method="post">
<input type="submit" value="Filtrar por">
<select name="filtro">
	<option value="Materia">Materia</option>
	<option value="Toneladas">Toneladas</option>
	</select>
	<input type="hidden" name="f">
	
	</form></center>

	<?php
	$p=mysql_query("SELECT * FROM descarga");
	if (isset($_REQUEST['f'])) {
		$f=$_REQUEST['filtro'];
		$q=mysql_query("SELECT DISTINCT $f FROM descarga");
		$b=mysql_fetch_assoc($q);
		echo "<form action='descarga.php' method='post'>
		<select name='filtro2'>";
		do{
			echo "<option value='".$b[$f]."'>".$b[$f]."</option>";
		}while ($b=mysql_fetch_assoc($q));
		echo "</select><input type='hidden' name='f2' value='$f'>
		<input type='submit' value='Filtrar por'></form>";
		 
	}
	?>

</select>
<center><table border="2">
<tr>
<td>Fecha</td>
<td>Materia</td>
<td>Toneladas</td>
<td>Eliminar</td>
<td>Modificar</td></center>
</tr>
<?php

if (isset($_REQUEST['f2'])) {
	$f2=$_REQUEST['f2'];
	$f=$_REQUEST['filtro2'];
	$r=mysql_query("SELECT * FROM descarga WHERE $f2='$f'");
	$j=mysql_fetch_assoc($r);
	$i=0;

	do{
		echo "<tr><td>".$j['fecha']."</td>";
		echo "<td>".$j['materia']."</td>";
		echo "<td>".$j['Toneladas']."</td></tr>";
		$i++;
	}while ($j=mysql_fetch_assoc($r));

}else{
	$i=0;
	$p=mysql_query("SELECT * FROM descarga");
	$a=mysql_fetch_assoc($p);
do{
	   echo "<tr><td>".$a['fecha']."</td>";
		echo "<td>".$a['materia']."</td>";
		echo "<td>".$a['Toneladas']."</td>";
		echo "<td><a href='descarga.php?e=".$a['ID']."'>Eliminar</a></td>";
		echo "<td><a href='descarga.php?m=".$a['ID']."'>Modificar</a></td></tr>";
	$i++;

}while ($a=mysql_fetch_assoc($p));
}

?>
<tr><td colspan="7">Total de registros <?php echo "->".$i; ?></td></tr>
</table>
<br>
<br>
<center>
<h1>Borrar todos Los datos de tabla</h1>
<form method="get" action="borrar3.php">
<input type="submit" value="Eliminar Registros de la tabla">
<br>
</center>
<br>
<br>
<table border="2" width="300">
<tr>
<center>
<td align="center" colspan="2">
<strong>Exportar Reporte del Area de Descarga</strong>
</td>
<tr>
<td width="439"><strong>Exportar Reporte en PDF</strong></td>
<td width="145" align="center"><a href="reporte_Descarga.php"><img src="imagen/pdf.png" width="30" height="25"/></a></td>
</tr>
<tr>
<td><strong>Exportar Reporte en EXCEL</strong></td>
<td align="center"><a href="reporte_excel_des.php"><img src="imagen/excel.png" width="30" height="25"/></a></td>
</center>
</table>
</form>
</body>
</html>

