
<?php
mysql_connect("localhost","root","");
mysql_select_db("produccion");
session_start();
   $m=mysql_query("SELECT * FROM usuario WHERE usu_user='".$_SESSION['user']."'");
   $a=mysql_fetch_assoc($m);
   if (isset($_REQUEST['cerrar']) && !empty($_REQUEST['cerrar'])) {
      session_destroy();
      header("Location:index.php");
   }
    if(!$_SESSION){
      header("Location:login.php");
   }

?>


<?

  
?>
<!DOCTYPE html>
<html Lang="en">
<head>
<meta charset="UTF-8">
<title>Producciòn</title>
<link rel="stylesheet"  href="css/estilo.css">
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
<body oncontextmenu="return false" > 
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
<article>
<div class="main">
				<header class="clearfix">	
					<h1>PROTEINAS, ENERGÈTICOS Y OLEOS, S.A DE C.V<span>Area de Producciòn</span></h1>
				</header>  
				<nav class="codrops-demos">
						<a href="envasado.php">Envasado</a>
						<a href="descarga.php">Descarga</a>
						<a href="index.php">Cerrar Sesion</a>
					</nav>

<br>
<br>
<br>
<br>
<hr>
<article>
<center><font color="blue" face="Bernard MT Condensed">Produccion</font></center>
<br>
<br>
</head>
<?php
mysql_connect("localhost","root","");
mysql_select_db("produccion");
if(isset($_REQUEST['fecha'])){
	$n=$_REQUEST['fecha'];
	$f=$_REQUEST['lote'];
	$l=$_REQUEST['presentacion'];
	$g=$_REQUEST['toneladas'];
	$c=$_REQUEST['tipo'];
	$z=$_REQUEST['turno'];
	mysql_query("INSERT INTO produccion VALUES(NULL,'$n','$f','$l','$g','$c','$z')");
}

$p=mysql_query("SELECT * FROM produccion");
$a=mysql_fetch_assoc($p);
?>

<?php
//eliminar
if(isset($_REQUEST['e'])){
	mysql_query("DELETE  FROM produccion WHERE ID=".$_REQUEST['e']);
}
?>

<?php
//modificarS
if(isset($_REQUEST['m'])){
	$mod=mysql_fetch_assoc(mysql_query("SELECT * FROM produccion WHERE ID=".$_REQUEST['m']));
}
if(isset($_REQUEST['m'])){
	$conProd=mysql_query("SELECT * FROM produccion WHERE ID='$_REQUEST[m]'");
	$aconP=mysql_fetch_assoc($conProd);
	$n=$aconP['fecha'];
	$f=$aconP['lote'];
	$l=$aconP['presentacion'];
	$g=$aconP['toneladas'];
	$c=$aconP['tipo'];
	$z=$aconP['turno'];
	mysql_query("UPDATE produccion SET lote='$f', presentacion='$l',toneladas='$g', tipo='$c',turno='$z' WHERE ID='$_REQUEST[m]'");
}else{
	$_REQUEST['ID']="";
}
?>
<center>
<form action="inicio.php" method="post">
<input type="date" name="fecha" placeholder="fecha" required><br>
</select><br>
<input type="number" name="lote" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['lote']."' ";}?> placeholder="Lote" required><br>
<input type="text" name="presentacion" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['presentacion']."' ";}?> placeholder="Presentacion" required><br>
</select><br>
<input type="number" name="toneladas" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['toneladas']."' ";}?> placeholder="Toneladas" required><br>
<input type="text" name="tipo" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['tipo']."' ";}?>  placeholder="Tipo" required><br>
<input type="text" name="turno" <?php if(isset($_REQUEST['m'])){echo "value='".$mod['turno']."' ";}?>  placeholder="Turno" required><br>
<br>
<input type="submit"  value="Insertar" <?php if(isset($_REQUEST['m'])){echo "value='Guardar'"; }else{ echo"value='Insertar'";} ?> > 
</form>
<br>
<hr>
<font color="blue" face="Bernard MT Condensed">Filtrar</font>
<hr>
<form action="inicio.php" method="post">
<br>
<input type="submit" value="Filtrar por">
<select name="filtro">
	<option value="Lote">Lote</option>
	<option value="Presentacion">Presentaciòn</option>
	<option value="Toneladas">Toneladas</option>
	<option value="Tipo">Tipo</option>
	<option value="Turno">Turno</option>
	</select>
	<input type="hidden" name="f">
	
	</form></center>

	<?php
	if (isset($_REQUEST['f'])) {
		$f=$_REQUEST['filtro'];
		$q=mysql_query("SELECT DISTINCT $f FROM produccion");
		$b=mysql_fetch_assoc($q);
		echo "<form action='inicio.php' method='post'>
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
<td>ID</td>
<td>fecha</td>
<td>Lote</td>
<td>Presentaciòn</td>
<td>Toneladas</td>
<td>Tipo</td>
<td>Turno</td>
<td>Eliminar</td>
<td>Modificar</td>
</tr></center>
<?php

if (isset($_REQUEST['f2'])) {
	$f2=$_REQUEST['f2'];
	$f=$_REQUEST['filtro2'];
	$r=mysql_query("SELECT * FROM produccion WHERE $f2='$f'");
	$j=mysql_fetch_assoc($r);

	$i=0;
	do{
		echo "<tr><td>".$j['fecha']."</td>";
		echo "<td>".$j['lote']."</td>";
		echo "<td>".$j['presentacion']."</td>";
		echo "<td>".$j['toneladas']."</td>";
		echo "<td>".$j['tipo']."</td>";
		echo "<td>".$j['turno']."</td></tr>";
		$i++;
	}while ($j=mysql_fetch_assoc($r));

}else{
	$i=0;
do{
	    echo "<tr><td>".$a['ID']."</td>";
		echo "<td>".$a['fecha']."</td>";
		echo "<td>".$a['lote']."</td>";
		echo "<td>".$a['presentacion']."</td>";
		echo "<td>".$a['toneladas']."</td>";
		echo "<td>".$a['tipo']."</td>";
		echo "<td>".$a['turno']."</td>";
		echo "<td><a href='inicio.php?e=".$a['ID']."'>Eliminar</a></td>";
		echo "<td><a href='inicio.php?m=".$a['ID']."'>Modificar</a></td></tr>";
	$i++;

}while ($a=mysql_fetch_assoc($p));
}

?>
<tr><td colspan="7">Total de registros <?php echo "->".$i; ?></td></tr>
</table>
</article>
<footer>
<center>
<br>
<h1>Borrar todos Los datos de tabla</h1>
<form method="get" action="borrar.php">
<input type="submit" value="Eliminar Registros de la tabla">
</form>
<br>
<table border="2" width="300">
<tr>
<td align="center" colspan="2">
<strong>Exportar Reporte del Area de Producciòn</strong>
</td>
<tr>
<td width="439"><strong>Exportar Reporte en PDF</strong></td>
<td width="145" align="center"><a href="reporte_pdf.php"><img src="imagen/pdf.png" width="30" height="25"/></a></td>
</tr>
<tr>
<td><strong>Exportar Reporte en EXCEL</strong></td>
<td align="center"><a href="reporte_excel.php"><img src="imagen/excel.png" width="30" height="25"/></a></td>
</tr>
</center>
</footer>
</table>
</html>

